<!-- Managed By Jake -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page - Portfolio Management System</title>

    <!-- SWIPER CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="css/about.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
?>

<body>
    <section class="about container">
        <div class="about__container">
            <h1>About Us</h1>
            <p>Portfolio purpose is to provide a simple and quick design for professional to get a job. Portfolio is not just a place to find a job but it is also a place to show your skill set and your profession to others.</p>
        </div>
    </section>

    <section class="about__portfolio container">
        <div class="about__portfolio-image">
            <img src="../svg/portfolio.jpg" alt="Portfolio Image">
        </div>
        <div class="about__portfolio-description">
            <h2>Simple Design of Portfolio</h2>
            <p>Create your own portfolio by filling in your background, skills, talent, hobbies and the job your profession. Simple and straight forward portfolio design bring a straight forward job opportunity</p>
            <a href="#mission">View More</a>
        </div>
    </section>

    <section class="mission container" id="mission">
        <div class="our__mission">
            <h2>Our Mission</h2>

            <div class="swiper our__mission-information">
                <div class="swiper-wrapper">
                    <div class="swiper-slide mission__info">
                        <h3>Enhance User Experience</h3>
                        <p>We aim to improve user experience with a simple and minimalist design that will make it easier for the user to upload their own portfolio.</p>
                    </div>
                    <div class="swiper-slide mission__info">
                        <h3>Encouraging Interaction</h3>
                        <p>We aim to engage our audience with an interactive chatbot experience that encourages participation and feedback.</p>
                    </div>
                    <div class="swiper-slide mission__info">
                        <h3>Job Encouragement</h3>
                        <p>We aim to motivate users to the use this portfolio website due to its simplicity and hoping for a better improvement from user feedback in the future.</p>
                    </div>
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev">
                    <i class="bx bx-chevron-left"></i>
                </div>
                <div class="swiper-button-next">
                    <i class="bx bx-chevron-right"></i>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (FOOTER) -->
<?php
include("footer.php");
?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="js/index.js"></script>

</html>