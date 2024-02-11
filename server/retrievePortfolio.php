<!-- RETRIEVE PORTFOLIO FROM THE DATABASE BASED ON THE SESSION ID -->
<?php

// Include the database connection file
include("connection.php");

// GET THE SESSION ID FROM THE SESSION
$userID = $_SESSION['id'];

// SQL QUERY TO RETRIEVE PORTFOLIO FROM THE DATABASE BASED ON THE SESSION ID AND THE PORTFOLIO ID
$execute_query = "SELECT * FROM portfolio WHERE userID = '$userID'";

// EXECUTE THE QUERY
$result = mysqli_query($conn, $execute_query);

// CHECK IF THERE IS PORTFOLIO
if (mysqli_num_rows($result) > 0) {
    // LOOP THROUGH THE PORTFOLIO
    while ($row = mysqli_fetch_array($result)) {
        $educationValues = explode(', ', $row['education']); // Assuming the values are stored as a comma-separated string in the database
        // DISPLAY THE PORTFOLIO
        echo "
        <div class='portfolio__item'>
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
        

            <!-- EDIT PORTFOLIO -->
            <div class='edit__portfolio-container'>
                <div class='edit__portfolio-content'>
                    <form action='../server/editPortfolio.php' method='POST' enctype='multipart/form-data'>
                        <h2>Edit Portfolio</h2>

                        <div class='form__inputs'>
                        <!-- FORM INPUTS -->
                        <div class='form__input'>
                            <label for='image'>Portfolio Image</label>
                            <input type='file' name='image' id='image' accept='image/*'>
                        </div>
                        <div class='form__input'>
                            <label for='title'>Portfolio Title</label>
                            <input type='text' name='title' placeholder='Portfolio Title' value='" . $row['title'] . "'>
                        </div>
                        <div class='form__input'>
                            <label for='description'>Portfolio Description</label>
                            <textarea rows='3' cols='5' name='description' placeholder='Portfolio Description'>" . $row['description'] . "</textarea>
                        </div>
                        <div class='form__input'>
                            <label for='skills'>Portfolio Skills</label>
                            <input type='text' name='skills' placeholder='Portfolio Skills' value='" . $row['skills'] . "'>
                        </div>

                        <!-- CHECKBOX WITH LABEL EDUCATION -->
                        <div class='form__input'>
                            <label>Education</label>

                            <div class='checkboxes'>
                                <!-- CHECKBOX -->
                                <div class='checkbox'>
                                    <input type='checkbox' name='education[]' value='diploma' " . (in_array('diploma', $educationValues) ? 'checked' : '') . ">
                                    <label for='education'>Diploma</label>
                                </div>

                                <div class='checkbox'>
                                    <input type='checkbox' name='education[]' value='degree' " . (in_array('degree', $educationValues) ? 'checked' : '') . ">
                                    <label for='education'>Degree</label>
                                </div>

                                <div class='checkbox'>
                                    <input type='checkbox' name='education[]' value='master' " . (in_array('master', $educationValues) ? 'checked' : '') . ">
                                    <label for='education'>Master</label>
                                </div>

                                <div class='checkbox'>
                                    <input type='checkbox' name='education[]' value='phd' " . (in_array('phd', $educationValues) ? 'checked' : '') . ">
                                    <label for='education'>PHD</label>
                                </div>
                            </div>
                        </div>
                        <!-- SUBMIT BUTTON -->
                        <button class='edit-portfolio-btn create-portfolio' type='submit'>Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
            ";
    }
} else {
    // NO PORTFOLIO
    echo "<p class='no__portfolio'>There are currently no portfolio created</p>";
}

?>