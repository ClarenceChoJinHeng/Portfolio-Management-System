<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ======= LINK CSS ======= -->
    <link rel="stylesheet" href="../css/header.css">

    <!-- ======= LINK BOX ICON ======= -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<!-- HEADER -->
<header class="header container">
    <nav class="nav container">
        <div class="nav__title">
            <a href="index.php" class="nav__logo">Portfolio</a>
            <i class='bx bxs-report'></i>
        </div>

        <?php

        if (isset($_SESSION['role'])) {
            if (
                $_SESSION['role'] == 'admin'
            ) {
                echo "
        <div class='nav__desktop-links'>
          <a href='admin.php' class='nav__link'>Home</a>
          <a href='admin-users.php' class='nav__link'>Users</a>
          <a href='admin-portfolio.php' class='nav__link'>Portfolio</a>
        </div>

          <div class='nav__username'>
            <div>
              <p>" . $_SESSION['username'] . "</p>
              <i class='bx bx-chevron-down'></i>

              <div class='nav__dropdown'>
                <a href='#' class='nav__dropdown-links toggle__menu'>Menu</a>
                <a href='admin.php' class='nav__dropdown-links'>Dashboard</a>
                <a href='../../server/logout.php' class='nav__dropdown-links'>Logout</a>
              </div>
            </div>
          </div>
        ";
            }
        }
        ?>

    </nav>

    <?php

    if (isset($_SESSION['role'])) {
        if (
            $_SESSION['role'] == 'admin'
        ) {
            echo "
      <div class='nav__mobile-links'>
        <a href='admin.php' class='nav__link'>Home</a>
        <a href='admin-users.php' class='nav__link'>Users</a>
        <a href='admin-portfolio.php' class='nav__link'>Portfolios</a>
      </div>
      ";
        }
    }
    ?>
</header>

<!-- JAVASCRIPT -->
<script src="../js/header.js"></script>

</html>