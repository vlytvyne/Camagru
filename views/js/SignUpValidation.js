const FORM_NAME = "signUp";

let emailTaken = false;
let usernameTaken = false;

function validateForm() {
    const email = document.forms[FORM_NAME]["email"].value;
    const username = document.forms[FORM_NAME]["username"].value;
    const password = document.forms[FORM_NAME]["password"].value;

    if (emailTaken) {
        alert("This email is already registered.");
        return false
    }

    if (usernameTaken) {
        alert("This username is already taken.");
        return false
    }

    return isEmailValid(email) &&
    isUsernameValid(username) &&
    isPasswordValid(password)
}

function checkIfEmailTaken() {
    let email = document.forms[FORM_NAME]["email"].value;
    ajax("/signUp/emailCheck", `email=${email}`, function (response) {
        if (response.isTaken) {
            alert("This email is already registered.")
        }
        emailTaken = response.isTaken
    })
}

function checkIfUsernameTaken() {
    let username = document.forms[FORM_NAME]["username"].value;
    ajax("/signUp/usernameCheck", `username=${username}`, function (response) {
        if (response.isTaken) {
            alert("This username is already taken.")
        }
        usernameTaken = response.isTaken
    })
}

