<?php
// JAKE
include("../../server/connection.php");

if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE userID = $id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    unset($_SESSION['form_data']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN USERS - Portfolio Management System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<?php

include('guard_admin.php');
include('header_admin.php');

?>

<body>
    <main>
        <section class="admin__users container">
            <div class="admin__users-container">
                <h2>Users Dashboard</h2>

                <?php
                include("../../server/retrieveUsers.php");
                ?>
            </div>
        </section>
    </main>
</body>

</html>