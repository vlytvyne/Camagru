let video;
let canvas;
let webcamBtn;
let fileInput;
let cat;

let canvasContext;
let canvasDrawingProcessId;
let canMakePhoto = false;

document.addEventListener('DOMContentLoaded', () => {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    canvasContext = canvas.getContext('2d');
    webcamBtn = document.getElementById('webcam_btn');
    fileInput = document.getElementById('file_input');
    
    video.addEventListener('canplay', translateWebcamToCanvas);
    webcamBtn.addEventListener('click', onWebcamBtnClick);
    fileInput.onchange = handleFileInput;
    fileInput.onerror = () => { console.error("File input error")};
    
    startWebcamTranslation();

    let images = document.getElementsByTagName('img')
    for (const image of images) {
        console.log(image);
        image.addEventListener('click', () => {
            image.style.filter = 'drop-shadow(2px 4px 6px yellow)'
        })
    }
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
    if (canMakePhoto) {
        stopWebcamTranslation();
        setWebcamMode(false);
    } else {
        translateWebcamToCanvas()
    }

}

function handleFileInput() {
    setWebcamMode(false);
    stopWebcamTranslation();
    clearCanvas();
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

function setWebcamMode(isOn) {
    webcamBtn.innerHTML = isOn ? "Make photo" : "Use webcam";
    canMakePhoto = isOn;
}

function stopWebcamTranslation() {
    window.clearInterval(canvasDrawingProcessId);
}

function clearCanvas() {
    canvasContext.clearRect(0, 0, canvas.width, canvas.height);
}

function savePhoto() {
    const photo = canvas.toDataURL();
    ajax('/photoBooth/savePhoto', `photoBase64=${photo}`, (response) => {
        alert(response.isSuccess)
    })
}