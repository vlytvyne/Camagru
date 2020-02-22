const FORM_NAME = "signUp";

function validateForm() {
    const email = document.forms[FORM_NAME]["email"].value;
    const username = document.forms[FORM_NAME]["username"].value;
    const password = document.forms[FORM_NAME]["password"].value;

    return isEmailValid(email) &&
    isUsernameValid(username) &&
    isPasswordValid(password)
}