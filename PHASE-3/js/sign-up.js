document.getElementById("signup-form").addEventListener("submit", async function(event) {
    event.preventDefault() // prevent form from submitting

    let headersList = {
        "Content-Type": "application/json"
    }
    
    let bodyContent = JSON.stringify({
        "first_name": $("#name").val(),
        "last_name": $("#surname").val(),
        "email": $("#email").val(),
        "password": $("#password").val(),
    });
    
    let response = await fetch("http://localhost/PHASE\ 3/validate_signup.php", { 
        method: "POST",
        body: bodyContent,
        headers: headersList
    });
    
    let data = JSON.parse(await response.text());

    error = $("#error-span")
    switch (data.response) {
        case "empty_field":
            error.html("No fields should be empty")
            break;
        case "short_password":
            error.html("The password you entered is too short")
            break;
        case "invalid_password":
            error.html("The password must contain upper and lowercase letters, a number and a special character")
            break;
        case "invalid_email":
            error.html("The email you entered is invalid")
            break;
        case "already_registered":
            error.html("You are already registered, click login below")
            break;
        case "failed":
            error.html("There was an error on the server, try again later")
            break;
        case "succesful":
            window.location.href = "index.php"
            break;
        default:
            error.html("The universe doesn't want you to sign up")
            break;
    }
});

function validateName() {
    var name = document.getElementById("name").value;
    // all lowercase a-Z and uppercase A-Z and 3-30 characters
    var regxName = /^[a-zA-Z]{3,20}$/;
    var errorMsg = document.getElementById("name-error");

    if(name.match(regxName)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';
    }
}

function validateSurname() {
    var surname = document.getElementById("surname").value;
    var regxSurname = /^[a-zA-Z]{3,20}$/;
    var errorMsg = document.getElementById("surname-error");

    if(surname.match(regxSurname)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
    }
}

function validateEmail() {
    var email = document.getElementById("email").value;
    // [(username) @ (domain) . (extension)] (.extension)
    // jamie@javascript.com
    // philip5@php.co.uk
    // backward slash special character escape
    //var regxEmail = /^([a-zA-Z0-9\._]+@[a-zA-Z0-9-]+(\.[a-z]{2,4}))$/;
    var regxEmail = /^([a-zA-Z0-9\._]+@[a-zA-Z0-9-]+(\.[a-z]{2,4}))$/;
    var errorMsg = document.getElementById("email-error");

    if(email.match(regxEmail)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else {
        errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
    }
}

function validatePassword() {
    var password = document.getElementById("password").value;
    // var regxPassword = /^(?=.[a-z])(?=.[A-Z])(?=.[0-9])(?=.[!@#\$%\^&_?\*])[A-Za-z0-9\d!@#\$%\^&_?\*]{8,}$/;
    // var regxPassword = /^([\w][!@#\$%\^&\*_?]{8,})$/;
    var regxPassword = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
    var errorMsg = document.getElementById("password-error");

    if (password.match(regxPassword)) {
        errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
    } else {
        errorMsg.innerHTML = `<i class="fa fa-times-circle"></i>`;
    }
}

function confirmPassword() {
    var password = document.getElementById("password").value;
    var confirmPass = document.getElementById("confirm-password").value;
    var errorMsg = document.getElementById("confirm-password-error");

    if (confirmPass != password) {
        errorMsg.innerHTML = "Passwords do not match";
        errorMsg.style.fontSize = "11px";
    }

    else {
        var regxPassword = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/
        if (confirmPass.match(regxPassword)) {
            errorMsg.innerHTML = '<i class="fas fa-check-circle"></i>';
            errorMsg.style.fontSize = "17px";
        } else {
            errorMsg.innerHTML = '<i class="fa fa-times-circle"></i>';;
            errorMsg.style.fontSize = "17px";
        }
    }
}

function displayPasswordTips() {
    var errorDiv = document.getElementById("error-span");
    errorDiv.innerHTML = "Password must contain at least: <br> - 8 characters <br> - 1 number <br> - 1 special character <br> - 1 uppercase letter <br> - 1 lowercase letter";
}

// Regex cheat sheet
/*
. :  any single character
* : preceding element zero or more times
^ :  starting position in any line
$ : ending position in any line
\d : digit
\D : non-digit character
\S : non-digit character
\s : whitespace character
\w : alphanumeric character (a-z, A-Z, 0-9)
\W : non-alphanumeric character
[] : single character contained within brackets 
() : sub-expressions
{m,n} : preceding element at least m, but no more than n times 
{2,} : 2 characters or longer
{1,8} : 1-8 character
{,3} : max 3 characters

*/