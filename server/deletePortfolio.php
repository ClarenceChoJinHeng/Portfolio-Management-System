<?php

include("connection.php");

if (!empty($_POST)) {
    // GET THE PORTFOLIO ID FROM THE GET REQUEST
    $portfolioID = $_POST['id'];

    // UNLINK THE IMAGE FROM THE SERVER
    $fetch_image_query = "SELECT imagePath FROM portfolio WHERE portfolioID = '$portfolioID'";
    $result = mysqli_query($conn, $fetch_image_query);
    $row = mysqli_fetch_array($result);
    $old_image_path = '../images/' . $row['imagePath'];

    // DELETE THE OLD IMAGE
    if (file_exists($old_image_path)) {
        unlink($old_image_path);
    }

    // DELETE PORTFOLIO FROM THE DATABASE BASED ON THE PORTFOLIO ID
    $execute_query = "DELETE FROM portfolio WHERE portfolioID = '$portfolioID'";

    // EXECUTE THE QUERY
    $result = mysqli_query($conn, $execute_query);

    // CHECK IF THE PORTFOLIO WAS DELETED
    if ($result) {
        echo "<script>alert('Portfolio Deleted Successfully!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Error Deleting Portfolio!'); window.history.back();</script>";
    }

    mysqli_close($conn);
}
