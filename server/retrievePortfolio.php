<!-- RETRIEVE PORTFOLIO FROM THE DATABASE BASED ON THE SESSION ID -->
<?php

// Include the database connection file
include("connection.php");

// GET THE SESSION ID FROM THE SESSION
$userID = $_SESSION['id'];

// SQL QUERY TO RETRIEVE PORTFOLIO FROM THE DATABASE BASED ON THE SESSION ID
$execute_query = "SELECT * FROM portfolio WHERE userID = '$userID'";

// EXECUTE THE QUERY
$result = mysqli_query($conn, $execute_query);

// CHECK IF THERE IS PORTFOLIO
if (mysqli_num_rows($result) > 0) {
    // LOOP THROUGH THE PORTFOLIO
    while ($row = mysqli_fetch_array($result)) {
        // DISPLAY THE PORTFOLIO
        echo "<div class='portfolio__item'>
                <img src='../images/" . $row['imagePath'] . "' alt='Portfolio Image'>
                <h3>" . $row['title'] . "</h3>
                
                <div class='portfolio__buttons'>
                    <button class='view-portfolio'>View</button>
                    <button class='edit-portfolio'>Edit</button>
                    <button class='delete-portfolio'>Delete</button>
                </div>

                <div class='portfolio__details-overlay'>
                    <div class='portfolio__details'>
                        <h2>More Information</h2>

                        <div>
                            <label>Description</label>
                            <p>" . $row['description'] . "</p>
                        </div>

                        <div>
                            <label>Skills</label>
                            <p>" . $row['skills'] . "</p>
                        </div>

                        <div>
                            <label>Education</label>
                            <p>" . $row['education'] . "</p>
                        </div>
                    </div>
                </div>
            </div>";

        // <p>" . $row['description'] . "</p>
        // <p>" . $row['skills'] . "</p>
        // <p>" . $row['education'] . "</p>
    }
} else {
    // NO PORTFOLIO
    echo "<p class='no__portfolio'>There are currently no portfolio created</p>";
}

?>