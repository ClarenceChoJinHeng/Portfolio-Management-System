<!-- MANAGED BY CLARENCE -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ======= LINK CSS ======= -->
  <link rel="stylesheet" href="css/header.css">

  <!-- ======= LINK BOX ICON ======= -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <title>Header Page - Portfolio Management System</title>
</head>

<!-- HEADER -->
<header class="header container">
  <nav class="nav container">
    <div class="nav__title">
      <a href="index.php" class="nav__logo">Portfolio</a>
      <i class='bx bxs-report'></i>
    </div>

    <?php

    session_start();

    if (isset($_SESSION['role'])) {
      if (
        $_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'
      ) {
        echo "
        <div class='nav__desktop-links'>
          <a href='index.php' class='nav__link'>Home</a>
          <a href='about.php' class='nav__link'>About</a>
          <a href='faq.php' class='nav__link'>FAQs</a>
          <a href='portfolio.php' class='nav__link'>Portfolio</a>
        </div>

          <div class='nav__username'>
            <div>
              <p>" . $_SESSION['username'] . "</p>
              <i class='bx bx-chevron-down'></i>

              <div class='nav__dropdown'>
                <a href='#' class='nav__dropdown-links toggle__menu'>Menu</a>
                <a href='members.php' class='nav__dropdown-links'>Dashboard</a>
                <a href='../server/logout.php' class='nav__dropdown-links'>Logout</a>
              </div>
            </div>
          </div>
        ";
      }
    } else {
      echo "
      <div class='nav__desktop-links'>
        <a href='index.php' class='nav__link'>Home</a>
        <a href='about.php' class='nav__link'>About</a>
        <a href='faq.php' class='nav__link'>FAQs</a>
      </div>

      <div class='nav__menu'>
        <i class='bx bx-user-circle'></i>
        <i class='bx bx-menu'></i>
      </div>

      <button class='nav__button'>Login</button>
    ";
    }
    ?>

  </nav>

  <?php

  if (isset($_SESSION['role'])) {
    if (
      $_SESSION['role'] == 'user' || $_SESSION['role'] == 'admin'
    ) {
      echo "
      <div class='nav__mobile-links'>
        <a href='index.php' class='nav__link'>Home</a>
        <a href='about.php' class='nav__link'>About</a>
        <a href='faq.php' class='nav__link'>FAQs</a>
        <a href='portfolio.php' class='nav__link'>Portfolio</a>
      </div>
      ";
    }
  } else {
    echo "
    <div class='nav__mobile-links'>
      <a href='index.php' class='nav__link'>Home</a>
      <a href='about.php' class='nav__link'>About</a>
      <a href='faq.php' class='nav__link'>FAQs</a>
    </div>
    ";
  }
  ?>
</header>

<!-- JAVASCRIPT -->
<script src="js/header.js"></script>

</html>