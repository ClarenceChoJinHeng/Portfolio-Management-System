<!-- MANAGED BY JAKE -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - Portfolio Management System</title>

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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

        <!-- SWIPER -->
        <section class="latest__portfolio container">
            <div class="section__title-description">
                <h2>Latest Portfolios</h2>
                <p>Here are the latest portfolios that have been created by our users.</p>
            </div>
            <div class="swiper latest__portfolio-container">
                <div class="swiper-wrapper">
                    <?php
                    // Include the retrieval of the latest portfolios
                    include("../server/latestPortfolios.php");
                    ?>
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev">
                    <i class="bx bx-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </section>

        <!-- CTA PART -->
        <section class="cta__container container">
            <div class="cta__images">
                <img src="../svg/getStarted.svg" alt="get started">
            </div>
            <div class="cta__description">
                <h2>Design Your Own Personal Portfolio</h2>
                <p>Design your own portfolio with the most simple and minimalistic design and get hired by the desired company you hope to find by showing off your skillset and background.</p>
                <button class="redirect__signup-btn">Create Now</button>
            </div>
        </section>
    </main>
</body>

<?php
include("footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="js/index.js"></script>

</html>