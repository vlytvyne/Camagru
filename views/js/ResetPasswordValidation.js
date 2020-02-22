const FORM_NAME = "resetPassword";

function validateForm() {
    const email = document.forms[FORM_NAME]["email"].value;

    return isEmailValid(email)
}