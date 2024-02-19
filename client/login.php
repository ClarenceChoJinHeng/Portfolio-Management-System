<!DOCTYPE html>
<!-- MANAGED BY JAKE -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Portfolio Management System</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
?>

<body>
    <main>
        <section class="container">
            <div class="signup__container">
                <h1>Login</h1>
                <form action="../server/processLogin.php" method="POST">
                    <!-- USERNAME, AGE, EMAIL, PASSWORD -->
                    <div class="form__inputs">
                        <div class="form__input">
                            <label for="email">Email or Username</label>
                            <input type="text" id="email" name="email" placeholder="Enter your email">
                        </div>
                        <div class="form__input">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <!-- SUBMIT BUTTON -->
                        <button class="submit__button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>