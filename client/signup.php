<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page - Portfolio Management System</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
?>

<body>
    <main>
        <section class="container">
            <div class="signup__container">
                <h1>Signup</h1>
                <form action="../server/processSignup.php" method="POST">
                    <!-- USERNAME, AGE, EMAIL, PASSWORD -->
                    <div class="form__inputs">
                        <div class="form__input">
                            <label for="username">Username</label>
                            <!-- RETAIN THE VALUE -->
                            <input type="text" id="username" name="username" placeholder="Enter your username" value="<?php if (isset($_SESSION['username'])) {
                                                                                                                            echo $_SESSION['username'];
                                                                                                                        }
                                                                                                                        ?>">
                        </div>
                        <div class="form__input">
                            <label for="age">Age</label>
                            <input type="number" id="age" name="age" placeholder="Enter your age" value="<?php if (isset($_SESSION['age'])) {
                                                                                                                echo $_SESSION['age'];
                                                                                                            }
                                                                                                            ?>">
                        </div>
                        <div class="form__input">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php if (isset($_SESSION['email'])) {
                                                                                                                    echo $_SESSION['email'];
                                                                                                                }
                                                                                                                ?>">
                        </div>
                        <div class="form__input">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <!-- SUBMIT BUTTON -->
                        <button class="submit__button" name="signup" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>

</html>