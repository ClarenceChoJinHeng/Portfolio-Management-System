<!-- Managed By Jake -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN PAGE - Main Page</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>

<?php

include('guard_admin.php');
include('header_admin.php');

?>

<body>
    <!-- DASHBOARD PAGE -->
    <main>
        <section class="admin-dashboard container">
            <h1>Rules and Guidelines</h1>

            <div class="admin__rules-container">
                <div class="admin__todo">
                    <h2>Rules to follow</h2>
                    <ul class="admin__ul-list">
                        <li><i class='bx bxs-checkbox-checked'></i>Admins will be granted access based on their roles and responsibilities.</li>
                        <li><i class='bx bxs-checkbox-checked'></i>Regularly update and patch the system to address security vulnerabilities. </li>
                        <li><i class='bx bxs-checkbox-checked'></i>Admins are expected to respect user privacy.</li>
                        <li><i class='bx bxs-checkbox-checked'></i>Regularly test and update the incident response plan to ensure effectiveness. </li>
                        <li><i class='bx bxs-checkbox-checked'></i>Admins must regularly review audit logs for any unusual or suspicious activities. </li>
                    </ul>
                </div>
                <div class="admin__cant-do">
                    <h2>Illegal to do</h2>
                    <ul class="admin__ul-list">
                        <li><i class='bx bxs-checkbox-minus'></i>Admins must not access user accounts or any data.</li>
                        <li><i class='bx bxs-checkbox-minus'></i>Admins must not use their privileges to access or modify data for personal gain. </li>
                        <li><i class='bx bxs-checkbox-minus'></i>Admins must not make unauthorized changes to the system configuration or settings. </li>
                        <li><i class='bx bxs-checkbox-minus'></i>Admins must not share their login credentials.</li>
                        <li><i class='bx bxs-checkbox-minus'></i>Admins should not make unauthorized changes to the system configuration.</li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
</body>

</html>