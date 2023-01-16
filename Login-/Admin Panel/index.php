<?php
require 'validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="main.js" defer></script>
</head>

<body>
    <div class="formWrapper">
        <div class="fw-left">
            <h1 class="fw-heading">Admin Panel</h1>
            <h3 class="fw-subhead">Login to your account.</h3>
            <form action="index.php" method="post" class="login-form">
                <div class="email-container input-container">
                    <label for="email" class="label-email">
                        <!-- <img src="envelope.svg" alt=""> -->
                        <i class="fa-solid fa-envelope"></i>
                    </label>
                    <input type="email" id="email" placeholder="Email" name="email">
                </div>
                <div class="password-container input-container">
                    <label for="password" class="label-pass">
                        <i class="fa-sharp fa-solid fa-lock"></i>
                    </label>
                    <input type="password" id="password" placeholder="Password" name="password">
                </div>
                <div class="show-password">
                    <label for="show-pass" class="eye-icon"><i class="fa-solid fa-eye"></i><i
                            class="fa-sharp fa-solid fa-eye-slash"></i></label>
                    <input type="checkbox" id="show-pass">
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember" class="remember">Remember Me</label>
                </div>
                <input type="submit" value="Log In" class="login">
            </form>
            <button onClick="location.href='signup.php'">Signup</button>
        </div>
        <div class="fw-right"></div>
    </div>
</body>

</html>