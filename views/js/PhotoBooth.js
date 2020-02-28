let video;
let canvas;
let webcamBtn;
let publishBtn;
let fileInput;
let stickers;

let canvasContext;
let canvasDrawingProcessId;
let pickedSticker;
let webcamModeIsOn = false;

const STICKER_HIGHLIGHT_COLOR = 'yellow';

document.addEventListener('DOMContentLoaded', () => {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    canvasContext = canvas.getContext('2d');
    webcamBtn = document.getElementById('webcam_btn');
    publishBtn = document.getElementById('publish_btn');
    fileInput = document.getElementById('file_input');
    stickers = document.getElementsByTagName('img');

    
    video.addEventListener('canplay', translateWebcamToCanvas);
    webcamBtn.addEventListener('click', onWebcamBtnClick);
    publishBtn.addEventListener('click', onPublishClick);
    fileInput.onchange = handleFileInput;
    fileInput.onerror = () => { console.error("File input error")};
    canvas.addEventListener('mousedown', onCanvasClick);
    setupOnStickerClickListener();
    
    startWebcamTranslation();
}, false);

function startWebcamTranslation() {
    navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(stream => {
            video.srcObject = stream;
            video.play()
        })
}

function translateWebcamToCanvas() {
    setWebcamMode(true);
    clearCanvas();
    const height = video.videoHeight;
    const width = video.videoWidth;
    canvas.height = height;
    canvas.width = width;

    canvasDrawingProcessId = setInterval(() => {
        canvasContext.drawImage(video, 0, 0, width, height);
    }, 16)
}

function onWebcamBtnClick() {
    disablePublishBtn();
    if (webcamModeIsOn) {
        stopWebcamTranslation();
        setWebcamMode(false);
    } else {
        translateWebcamToCanvas()
    }
}

function onPublishClick() {
    const photo = canvas.toDataURL();
    ajax('/photoBooth/publishPhoto', `photoBase64=${photo}`, (response) => {
        alert(response.isSuccess)
    })
}

function handleFileInput() {
    setWebcamMode(false);
    stopWebcamTranslation();
    clearCanvas();
    disablePublishBtn();
    let img = new Image();
    img.onload = drawFileInputOnCanvas;
    img.onerror = () => { console.error("File input error")};
    img.src = URL.createObjectURL(this.files[0]);
}

function drawFileInputOnCanvas() {
    canvas = document.getElementById('canvas');
    const height = this.height;
    const width = this.width;
    canvas.height = height;
    canvas.width = width;
    canvasContext.drawImage(this, 0, 0, width, height);
}

function onCanvasClick(event) {
    const canvasBoundsOnScreen = canvas.getBoundingClientRect();
    const xMultiplicator = canvas.width / canvasBoundsOnScreen.width;
    const yMultiplicator = canvas.height / canvasBoundsOnScreen.height;
    const canvasX = (event.clientX - canvasBoundsOnScreen.x) *xMultiplicator;
    const canvasY = (event.clientY - canvasBoundsOnScreen.y) * yMultiplicator;
    drawPickedSticker(canvasX, canvasY);
}
function setupOnStickerClickListener() {
    for (const sticker of stickers) {
        sticker.addEventListener('click', () => {
            if (pickedSticker != null) {
                pickedSticker.style.filter = 'drop-shadow(2px 4px 6px black)';
                removeHighlightSticker(pickedSticker);
            }
            pickedSticker = sticker;
            highlightSticker(sticker)
        })
    }
}

function highlightSticker(sticker) {
    sticker.style.filter = `drop-shadow(2px 4px 6px ${STICKER_HIGHLIGHT_COLOR})`
}

function removeHighlightSticker(sticker) {
    pickedSticker.style.filter = 'drop-shadow(2px 4px 6px black)'
}

function setWebcamMode(isOn) {
    webcamBtn.innerHTML = isOn ? "Make photo" : "Use webcam";
    webcamModeIsOn = isOn;
}

function stopWebcamTranslation() {
    window.clearInterval(canvasDrawingProcessId);
}

function clearCanvas() {
    canvasContext.clearRect(0, 0, canvas.width, canvas.height);
}

function drawPickedSticker(x, y) {
    if (pickedSticker != null && !webcamModeIsOn) {
        enablePublishBtn();
        const stickerWidth = canvas.width / 4;
        const stickerHeight = canvas.height / 4;
        let cursorCenteredX = x - (stickerWidth / 2);
        let cursorCenteredY = y - (stickerHeight / 2);
        canvasContext.drawImage(pickedSticker, cursorCenteredX, cursorCenteredY, stickerWidth, stickerHeight);
    }
}

function disablePublishBtn() {
    if (!publishBtn.classList.contains('disabled')) {
        publishBtn.classList.add('disabled');
        publishBtn.classList.remove('enabled');
        publishBtn.disabled = true;
    }
}

function enablePublishBtn() {
    if (!publishBtn.classList.contains('enabled')) {
        publishBtn.classList.add('enabled');
        publishBtn.classList.remove('disabled');
        publishBtn.disabled = false;
    }
}