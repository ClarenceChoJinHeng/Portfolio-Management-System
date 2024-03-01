<!DOCTYPE html>
<html lang="en">
// JUSTIN
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PORTFOLIO - Portfolio Management System</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<?php

include('guard_admin.php');
include('header_admin.php');

?>

<body>
    <main>
        <section class="admin-portfolio container">
            <h1>Portfolio Dashboard</h1>

            <div class="members__recently-viewed">
                <p>All the portfolios</p>

                <!-- FORM TO SEARCH THE PORTFOLIO (PHP SELF) -->
                <form action="" method="POST" class="portfolio__search-form">
                    <input type="text" name="search" placeholder="Search Portfolio">
                    <button type="submit" name="submit-search">Search</button>
                </form>


                <button id="create-new-btn">Create New</button>
            </div>

            <!-- CREATE NEW PORTFOLIO TRIGGER -->
            <div class="create__new-portfolio-container">
                <div class="create__new-portfolio-content">
                    <form action="../../server/createPortfolio.php" method="POST" enctype="multipart/form-data">
                        <h2>Create New Portfolio</h2>

                        <div class="form__inputs">
                            <!-- FORM INPUTS -->
                            <div class="form__input">
                                <label for="image">Portfolio Image</label>
                                <input type="file" name="image" id="image" accept="image/*">
                            </div>
                            <div class="form__input">
                                <label for="title">Portfolio Title</label>
                                <input type="text" name="title" placeholder="Portfolio Title">
                            </div>
                            <div class="form__input">
                                <label for="description">Portfolio Description</label>
                                <textarea rows="3" cols="5" name="description" placeholder="Portfolio Description"></textarea>
                            </div>
                            <div class="form__input">
                                <label for="skills">Portfolio Skills</label>
                                <input type="text" name="skills" placeholder="Portfolio Skills">
                            </div>

                            <!-- CHECKBOX WITH LABEL EDUCATION -->
                            <div class="form__input">
                                <label>Education</label>

                                <div class="checkboxes">
                                    <!-- CHECKBOX -->
                                    <div class="checkbox">
                                        <input type="checkbox" name="education[]" value="diploma">
                                        <label for="education">Diploma</label>
                                    </div>

                                    <div class="checkbox">
                                        <input type="checkbox" name="education[]" value="degree">
                                        <label for="education">Degree</label>
                                    </div>

                                    <div class="checkbox">
                                        <input type="checkbox" name="education[]" value="master">
                                        <label for="education">Master</label>
                                    </div>

                                    <div class="checkbox">
                                        <input type="checkbox" name="education[]" value="phd">
                                        <label for="education">PHD</label>
                                    </div>
                                </div>
                            </div>
                            <!-- SUBMIT BUTTON -->
                            <button class="create-portfolio" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="retrieved__portfolio">
                <?php
                include("../../server/retrievePortfolio.php");
                ?>
            </div>
        </section>
    </main>
</body>

<!-- JAVASCRIPT FOR MEMBERS.PHP -->
<script src="../js/members.js"></script>

</html>