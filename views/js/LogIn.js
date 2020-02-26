const FORM_NAME = "logIn";

function onLogInClick() {
    const username = document.forms[FORM_NAME]["username"].value;
    const password = document.forms[FORM_NAME]["password"].value;

    const formIsValid = isUsernameValid(username) && isPasswordValid(password)

    if (!formIsValid) {
        return;
    }

    ajax("/logIn/logUserIn", `username=${username}&password=${password}`, function (response) {
        if (response.isSuccess) {
            window.location.replace("http://localhost/signUp")
        } else {
            alert("Can\'t log in. Username or password is wrong or account is not activated.")
        }
    })
}