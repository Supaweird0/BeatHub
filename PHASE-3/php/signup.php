<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="../js/sign-up.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Sign Up</title>
</head>

<body>
    <?php include_once 'header.php' ?>
    <div class="center">

        <h1>Create An Account</h1>
        <form id="signup-form" method="post" action="validate_signup.php">
            <div class="form-group">
                <span></span>
                <input class="form-control required" type="text" id="name" name="first_name" onkeyup="validateName()"
                    required>
                <span></span>
                <label class="required" for="name">Name <span class="error" id="name-error"></span></label>
            </div>
            <div class="form-group">
                <span></span>
                <input class="form-control" type="text" id="surname" name="last_name" onkeyup="validateSurname()"
                    required>
                <span></span>
                <label class="required" for="surname">Surname <span class="error" id="surname-error"></span></label>
            </div>
            <div class="form-group">
                <span></span>
                <input class="form-control" type="email" id="email" name="email" onkeyup="validateEmail()" required>
                <span></span>
                <label class="required" for="email">Email Address <span class="error" id="email-error"></span></label>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" id="password" name="password" onkeyup="validatePassword()"
                    required>
                <span></span>
                <label class="required" for="password">Password<span class="error" id="password-error"></span></label>
                <div class="tooltip-container">
                    <i class="fa fa-question-circle"></i>
                    <span class="tooltip-text">The password must contain upper and lowercase letters, a number
                        and a special character</span>
                </div>
            </div>
            <div class="form-group">
                <span></span>
                <input class="form-control" type="password" id="confirm-password" name="confirm-password"
                    onkeyup="confirmPassword()" required>
                <span></span>
                <label class="required" for="confirm-password">Confirm Password <span class="error"
                        id="confirm-password-error"></span></label>
            </div>
            <span class="error" id="error-span"></span>
            <button type="submit" id="signup-btn">Sign Up</button>
            <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>

</html>