const FORM_NAME = "resetPasswordNewPassword";

function validateForm() {
    const password = document.forms[FORM_NAME]["password"].value;

    return isPasswordValid(password)
}