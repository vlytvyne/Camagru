const FORM_NAME = "logIn";

function validateForm() {
    const username = document.forms[FORM_NAME]["username"].value;
    const password = document.forms[FORM_NAME]["password"].value;

    return isUsernameValid(username) &&
        isPasswordValid(password)
}