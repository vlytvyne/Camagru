let btnLike;
let btnRemoveLike;
let btnPublishComment;
let inputComment;
let textLikesAmount;

document.addEventListener('DOMContentLoaded', () => {
	btnLike = document.getElementById('btn_like');
	btnRemoveLike = document.getElementById('btn_remove_like');
	btnPublishComment = document.getElementById('publish_btn');
	inputComment = document.getElementById('input_comment');
	textLikesAmount = document.getElementById('likes_amount');

	btnLike.addEventListener('click', onLikeClick)
	btnRemoveLike.addEventListener('click', onRemoveLikeClick)
	btnPublishComment.addEventListener('click', onPublishCommentClick)
}, false);

function onLikeClick() {
	btnLike.hidden = true;
	btnRemoveLike.hidden = false;
	let newLikesAmount = parseInt(textLikesAmount.innerHTML) + 1
	textLikesAmount.innerHTML = newLikesAmount;
	likePhoto()
}

function likePhoto() {
	ajax('/photoDetails/likePhoto', "", () => {})
}

function onRemoveLikeClick() {
	btnLike.hidden = false;
	btnRemoveLike.hidden = true;
	let newLikesAmount = parseInt(textLikesAmount.innerHTML) - 1
	textLikesAmount.innerHTML = newLikesAmount;
	removeLikeFromPhoto()
}

function removeLikeFromPhoto() {
	ajax('/photoDetails/removeLikeFromPhoto', "", () => {})
}

function onPublishCommentClick() {
	let comment = inputComment.value;
	if (isEmpty(comment)) {
		alert("Comment can\'t be empty");
		return
	}
	ajax('/photoDetails/commentPhoto', `comment=${comment}`, () => {
		window.location.reload()
	})
}