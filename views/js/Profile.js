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
	setReceiveEmails(true)
}

function onDisableEmailsClick() {
	btnEnableEmails.hidden = false;
	btnDisableEmails.hidden = true;
	setReceiveEmails(false)
}

function setReceiveEmails(wantReceive) {
	ajax('/profile/setReceiveEmails', `wantReceive=${wantReceive}`, () => {})
}
