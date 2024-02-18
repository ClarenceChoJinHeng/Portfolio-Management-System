<!-- RETRIEVE LATEST PORTFOLIOS -->
<?php

// Include the database connection
include("connection.php");

// SQL Query to retrieve the latest portfolios limit 5 and the username of the creator
$sql = "SELECT portfolio.imagePath, portfolio.title, portfolio.description, users.username FROM portfolio INNER JOIN users ON portfolio.userID = users.userID ORDER BY portfolio.portfolioID DESC LIMIT 10";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Loop through the results
    while ($row = mysqli_fetch_assoc($result)) {
        // Output the portfolio information
        echo '<div class="swiper-slide portfolio__card">
                <img src="../images/' . $row['imagePath'] . '" alt="Portfolio Image">
                <h3>' . $row['title'] . '</h3>

                <div class="portfolio__description">
                    <p>' . $row['description'] . '</p>
                    <span>Created By: ' . $row['username'] . ' </span>
                </div>
            </div>';
    }
} else {
    // If there are no results
    echo "No portfolios found";
}
