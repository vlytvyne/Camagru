function isEmpty(str) {
    return str === ""
}

function isEmailValid(email) {
    if (isEmpty(email)) {
        alert("Email can\'t be empty");
        return false
    }
    if (email.length < 6) {
        alert("Email is too short. At least 6 characters");
        return false
    }
    if (!email.includes("@")) {
        alert("Email is invalid");
        return false
    }

    return true;
}

function isUsernameValid(username) {

    if (isEmpty(username)) {
        alert("Username can\'t be empty");
        return false
    }
    if (username.length < 6) {
        alert("Username is too short. At least 6 characters");
        return false
    }

    return true
}

function isPasswordValid(password) {
    if (isEmpty(password)) {
        alert("Password can\'t be empty");
        return false
    }
    if (password.length < 6) {
        alert("Password is too short. At least 6 characters");
        return false
    }
    return true
}

function ajax(url, onLoaded) {
    let request = new XMLHttpRequest();
    request.open('get', url)
    request.responseType = 'json'
    request.onloadend = function() { onLoaded(request) }
    request.send()
}