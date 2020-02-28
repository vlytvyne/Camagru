let container;
let btnLoadMore;

const IOP = 6;
let page = 1;

document.addEventListener('DOMContentLoaded', () => {
	container = document.getElementById('photos_container');
	btnLoadMore = document.getElementById('btn_load_more');

	btnLoadMore.addEventListener('click', fetchPhotos);
	fetchPhotos();
}, false);

function addPhoto(filename) {
	let div = document.createElement('div');
	div.classList.add("col-lg-3");
	div.classList.add("col-md-5");
	div.classList.add("card");
	div.classList.add("my_col");
	let img = document.createElement('img');
	img.src = `/photos/${filename}`;
	div.appendChild(img);
	container.appendChild(div);
}

function fetchPhotos() {
	ajax('/gallery/fetchPhotos', `page=${page}&iop=${IOP}`, (response) => {
		let photos = response.photos;
		if (photos.length < IOP) {
			disableBtn(btnLoadMore);
		} else {
			page++;
		}
		for (const photoId in response.photos) {
			addPhoto(photos[photoId].filename);
		}
	})
}