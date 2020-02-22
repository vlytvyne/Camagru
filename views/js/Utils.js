const emailPattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;

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
    if (emailPattern.test(email)) {
        alert("Email is invalid");
        return false
    }
    return true
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