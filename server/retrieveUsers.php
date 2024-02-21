<?php

// Include the database connection file
include('connection.php');

// SQL query to retrieve all users from the database
$sql = "SELECT * FROM users";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Check if there are any users in the database
    if (mysqli_num_rows($result) > 0) {
        // Output the users in a table
        echo "<form method='POST' action='../../server/createAndEditUser.php'>";
        echo "<table class='admin__users-table'>";
        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>Username</th>";
        echo "<th>Age</th>";
        echo "<th>Email</th>";
        echo "<th>Password</th>";
        echo "<th>Role</th>";
        echo "<th>Actions</th>";
        echo "</tr>";

        // Create a form to add a new user
        echo "<tr>";
        echo "<td>Auto Increment</td>";
        echo "<td><input type='text' name='username' value='" . (isset($user['username']) ? $user['username'] : (isset($_SESSION['form_data']['username']) ? $_SESSION['form_data']['username'] : '')) . "' /></td>";
        echo "<td><input type='number' name='age' value='" . (isset($user['age']) ? $user['age'] : (isset($_SESSION['form_data']['age']) ? $_SESSION['form_data']['age'] : '')) . "' /></td>";
        echo "<td><input type='email' name='email' value='" . (isset($user['email']) ? $user['email'] : (isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '')) . "' /></td>";
        echo "<td><input type='password' name='password' /></td>"; // Password fields should not retain values for security reasons
        echo "<td><input type='text' name='role' value='" . (isset($user['role']) ? $user['role'] : (isset($_SESSION['form_data']['role']) ? $_SESSION['form_data']['role'] : '')) . "' /></td>";

        // Unset the session variables
        unset($_SESSION['form_data']);

        echo "<td><input type='submit' value='" . (isset($user) ? 'Edit User' : 'Create User') . "' /></td>";
        echo "<input type='hidden' name='userID' value='" . (isset($user['userID']) ? $user['userID'] : '') . "' />";
        echo "</tr>";
        echo "</form>";

        // Loop through each user and output their details
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['userID'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td class='action__td'><a class='table__buttons' href='admin-users.php?action=edit&id=" . $row['userID'] . "'>Edit</a>  <a class='table__buttons' href='deleteUser.php?id=" . $row['userID'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // If there are no users in the database, output a message
        echo "No users found";
    }
} else {
    // If the query was not successful, output an error message
    echo "Error: " . mysqli_error($conn);
}
