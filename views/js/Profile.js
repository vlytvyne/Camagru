// const FORM_NAME = "profile";
//
// let cbxKeepOldPass;
// let cbxReceiveEmail;
// let inputEmail;
// let inputUsername;
// let inputNewPass;
// let btnSaveChanges;
//
// let currentUserEmail;
// let currentUserUsername;
// let currentUserReceiveEmailState;
//
// let emailTaken = false;
// let usernameTaken = false;
//
//
// document.addEventListener('DOMContentLoaded', () => {
// 	cbxKeepOldPass = document.getElementById('cbx_keep_old_pass');
// 	cbxReceiveEmail = document.getElementById('cbx_receive_emails');
// 	inputEmail = document.forms[FORM_NAME]['email'];
// 	inputUsername = document.forms[FORM_NAME]['username'];
// 	inputNewPass = document.forms[FORM_NAME]['password'];
// 	btnSaveChanges = document.getElementById('btn_save_changes');
//
// 	currentUserEmail = inputEmail.value;
// 	currentUserUsername = inputUsername.value;
// 	currentUserReceiveEmailState = cbxReceiveEmail.checked;
//
// 	cbxKeepOldPass.addEventListener('change', onKeepOldPassChange)
// 	btnSaveChanges.addEventListener('click', onBtnSaveChangesClick)
// }, false);
//
// function onKeepOldPassChange() {
// 	inputNewPass.disabled = cbxKeepOldPass.checked
// }
//
// function onBtnSaveChangesClick() {
// 	let email = inputEmail.value;
// 	let username = inputUsername.value;
// 	let password = inputNewPass.value;
// 	let keepOldPass = cbxKeepOldPass.checked;
// 	let wantReceiveEmails = cbxReceiveEmail.checked;
// 	if (!isEmailValid(email) || !isUsernameValid(username)) {
// 		return;
// 	}
// 	if (email !== currentUserEmail && isEmailValid(email) && !emailTaken) {
// 		changeEmail(email)
// 	}
// 	if (username !== currentUserUsername && isUsernameValid(username) && !usernameTaken) {
// 		changeUsername(username)
// 	}
// 	if (!keepOldPass) {
// 		if (isPasswordValid(password)) {
// 			changePassword(password)
// 		} else {
// 			return;
// 		}
// 	}
// 	if (wantReceiveEmails !== currentUserReceiveEmailState) {
// 		changeReceiveEmails(wantReceiveEmails)
// 	}
// 	window.location.replace('/gallery');
// }
//
// function changeEmail(email) {
// 	ajax('/profile/changeEmail', `email=${email}`, () => {})
// }
//
// function changeUsername(username) {
// 	ajax('/profile/changeUsername', `username=${username}`, () => {})
// }
//
// function changePassword(password) {
// 	ajax('/profile/changePassword', `password=${password}`, () => {})
// }
//
// function changeReceiveEmails(wantReceive) {
// 	ajax('/profile/changeReceiveEmails', `wantReceive=${wantReceive}`, () => {})
// }
//
// function checkIfEmailTaken() {
// 	let email = inputEmail.value;
// 	if (email === currentUserEmail) {
// 		return
// 	}
// 	ajax("/signUp/emailCheck", `email=${email}`, function (response) {
// 		if (response.isTaken) {
// 			alert("This email is already registered.")
// 		}
// 		emailTaken = response.isTaken
// 	})
// }
//
// function checkIfUsernameTaken() {
// 	let username = inputUsername.value;
// 	if (username === currentUserUsername) {
// 		return
// 	}
// 	ajax("/signUp/usernameCheck", `username=${username}`, function (response) {
// 		if (response.isTaken) {
// 			alert("This username is already taken.")
// 		}
// 		usernameTaken = response.isTaken
// 	})
// }

let btnEnableEmails;
let btnDisableEmails;

document.addEventListener('DOMContentLoaded', () => {
	btnEnableEmails = document.getElementById('btn_enable_emails');
	btnDisableEmails = document.getElementById('btn_disable_emails');

	btnEnableEmails.addEventListener('click', onEnableEmailsClick);
	btnDisableEmails.addEventListener('click', onDisableEmailsClick);
}, false);

function onEnableEmailsClick() {
	btnEnableEmails.hidden = true;
	btnDisableEmails.hidden = false;
	changeReceiveEmails(true)
}

function onDisableEmailsClick() {
	btnEnableEmails.hidden = false;
	btnDisableEmails.hidden = true;
	changeReceiveEmails(false)
}

function changeReceiveEmails(wantReceive) {
	ajax('/profile/changeReceiveEmails', `wantReceive=${wantReceive}`, () => {})
}
