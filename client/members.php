<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Page - Portfolio Management System</title>
    <link rel="stylesheet" href="css/members.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
include("guard_members.php");
?>

<body>
    <main>
        <section class="members__container container">
            <h1>All Portfolios</h1>
            <div class="members__recently-viewed">
                <p>Recently Created</p>
                <button id="create-new-btn">Create New</button>
            </div>

            <!-- CREATE NEW PORTFOLIO TRIGGER -->
            <div class="create__new-portfolio-container">
                <div class="create__new-portfolio-content">
                    <form action="../server/createPortfolio.php" method="POST" enctype="multipart/form-data">
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

            <!-- PHP WILL BE RETRIEVED PORTFOLIO -->
            <div class="retrieved__portfolio">
                <?php
                include("../server/retrievePortfolio.php");
                ?>
            </div>
        </section>
    </main>

    <!-- JAVASCRIPT FOR MEMBERS.PHP -->
    <script src="js/members.js"></script>
</body>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (FOOTER) -->
<?php
include("footer.php");
?>

</html>