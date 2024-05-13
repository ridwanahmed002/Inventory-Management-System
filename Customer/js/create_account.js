function validateCreateAccountForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    let phone = document.getElementById("phone").value;
    let gender = document.getElementById("gender").value;
    let age = document.getElementById("age").value;
    let location = document.getElementById("location").value;
    let isValid = true;

    document.getElementById("usernameError").innerHTML = "";
    document.getElementById("passwordError").innerHTML = "";
    document.getElementById("emailError").innerHTML = "";
    document.getElementById("phoneError").innerHTML = "";
    document.getElementById("genderError").innerHTML = "";
    document.getElementById("ageError").innerHTML = "";
    document.getElementById("locationError").innerHTML = "";

    if (username === "") {
        document.getElementById("usernameError").innerHTML = "Username is required";
        isValid = false;
    } else if (isUsernameTaken(username)) {
        document.getElementById("usernameError").innerHTML = "Username is already taken";
        isValid = false;
    }

    if (password === "") {
        document.getElementById("passwordError").innerHTML = "Password is required";
        isValid = false;
    }

    if (email === "") {
        document.getElementById("emailError").innerHTML = "Email is required";
        isValid = false;
    } else if (!validateEmail(email)) {
        document.getElementById("emailError").innerHTML = "Invalid email format";
        isValid = false;
    }

    if (phone === "") {
        document.getElementById("phoneError").innerHTML = "Phone number is required";
        isValid = false;
    }

    if (gender === "") {
        document.getElementById("genderError").innerHTML = "Gender is required";
        isValid = false;
    }

    if (age === "") {
        document.getElementById("ageError").innerHTML = "Age is required";
        isValid = false;
    } else if (isNaN(age) || age < 1 || age > 120) {
        document.getElementById("ageError").innerHTML = "Invalid age";
        isValid = false;
    }

    if (location === "") {
        document.getElementById("locationError").innerHTML = "Location is required";
        isValid = false;
    }

    if (!isValid) {
        alert("Please fix the errors in the form.");
    }

    return isValid;
}

function isUsernameTaken(username) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "../control/check_username.php", false);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("username=" + username);

    return xhr.responseText === "true";
}

function validateEmail(email) {
    let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}
