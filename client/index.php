<!-- MANAGED BY JAKE -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Portfolio Management System</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
?>

<body>
    <main>
        <section class="hero__container container">
            <!-- HERO IMAGE -->
            <div class="hero__image">
                <img src="../svg/hero.svg" alt="Hero Image">
            </div>
            <!-- HERO DESCRIPTION -->
            <div class="hero__description">
                <h1>Welcome to the Portfolio Management System</h1>
                <p>Here you can manage your portfolio, view your stocks, and see how your investments are doing.</p>
                <button class="redirect__signup-btn">Get Started</button>
            </div>
        </section>
    </main>
</body>

<?php
include("footer.php");
?>

<script src="js/index.js"></script>

</html>