<?php
// JAKE TAY
// include the connection file
include('connection.php');

// Get the user ID from the URL
$userID = $_GET['id'];

// Check if the user ID is empty
if (empty($userID)) {
    // Redirect the user to the admin users page (javascript alert)
    echo "<script>alert('User ID is missing');
    window.location.href = '../client/admin-users.php';</script>";
}

// Alert the user with confirmation
echo "<script>
    var confirmDelete = confirm('Are you sure you want to delete this user?');
    if (!confirmDelete) {
        window.location.href = '../client/admin/admin-users.php';
    }
</script>";

// SQL query to delete the user from the database
$sql = "DELETE FROM users WHERE userID = $userID";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Redirect the user to the admin users page (javascript alert)
    echo "<script>alert('User deleted');
    window.location.href = '../client/admin/admin-users.php';</script>";
} else {
    // Output an error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
