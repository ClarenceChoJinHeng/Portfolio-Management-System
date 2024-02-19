<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio Page - Portfolio Management System</title>

    <link rel="stylesheet" href="css/portfolio.css">
</head>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (HEADER) -->
<?php
include("header.php");
?>

<body>
    <main>
        <section class="portfolio container">
            <div class="portfolio__container">
                <h1>Search and View all the Portfolio's</h1>

                <!-- FORM TO SUBMIT THE KEYWORDS TO BACKEND TO PROCESS -->
                <form class="form__keywords" action="" method="POST">
                    <div class="search__keywords">
                        <input type="text" name="keywords" placeholder="Search Portfolio">
                        <button type="submit" name="search">Search</button>
                    </div>
                </form>

                <div class='portfolio__wrapper'>

                    <!-- DISPLAY THE PORTFOLIO'S -->
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Include the database connection
                        include("../server/connection.php");

                        // Sanitize the input
                        $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);

                        // SQL Query to search the portfolios
                        $sql = "SELECT portfolio.*, users.username 
                                FROM portfolio 
                                INNER JOIN users ON portfolio.userID = users.userID 
                                WHERE title LIKE '%$keywords%'";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Check if there are any results
                        if (mysqli_num_rows($result) > 0) {
                            // Loop through the results
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Output the portfolio information
                                echo "
                                    <div class='portfolio__item'>
                                        <img src='../images/" . $row['imagePath'] . "' alt='Portfolio Image'>
                                        <h2>" . $row['title'] . "</h2>
                                        
                                        <div class='portfolio__buttons'>
                                            <p>Created by: " . $row['username'] . "</p>
                                            <button class='view-portfolio'>View</button>
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            // If there are no results
                            echo "No portfolios found";
                        }
                    } else {
                        // Include the database connection
                        include("../server/connection.php");
                        // ECHO ALL THE PORTFOLIO'S WITH LIMIT 10
                        $sql = "SELECT portfolio.*, users.username
                                FROM portfolio 
                                INNER JOIN users ON portfolio.userID = users.userID 
                                LIMIT 10";

                        // EXECUTE THE QUERY
                        $result = mysqli_query($conn, $sql);

                        // CHECK IF THERE IS PORTFOLIO
                        if (mysqli_num_rows($result) > 0) {
                            // LOOP THROUGH THE PORTFOLIO
                            while ($row = mysqli_fetch_assoc($result)) {
                                // DISPLAY THE PORTFOLIO
                                echo "<div class='portfolio__item'>
                                        <img src='../images/" . $row['imagePath'] . "' alt='Portfolio Image'>
                                        <h2>" . $row['title'] . "</h2>

                                        <div class='portfolio__buttons'>
                                            <p>Created by: " . $row['username'] . "</p>
                                            <button class='view-portfolio'>View</button>
                                        </div>
                                    </div>";
                            }
                        } else {
                            // IF THERE IS NO PORTFOLIO
                            echo "No portfolios found";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

<!-- THIS IS HOW YOU CAN INCLUDE FILES SO YOU CAN REUSE THEM (FOOTER) -->
<?php
include("footer.php");
?>

</html>