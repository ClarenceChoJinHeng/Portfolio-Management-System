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
<body>
  <header>   
    <nav class="nav__container">
    <!-- ========== BURGER CONTAINER  ========== -->

   <div class="burger__logo__container">
      <div class="burger__container" >
        <i class='bx bx-menu' ></i>
      </div>

      <!-- ========= TITLE CONTAINER ========== -->
        <h1><a href="index.php" class="logo__link">Invexo</a></h1>
     
   </div>
    <!-- ========== NAV MENU =========== -->

    
      <ul class="nav__menu">
        <li><a href=index.php" class="nav__link" >Home</a></li>
        <li><a href="portfolio.php" class="nav__link" >Portfolio</a></li>
        <li><a href="about.php" class="nav__link" >About</a></li>
        <li><a href="faq.php" class="nav__link" >FAQs</a></li>

        <!-- ========== CLOSE MENU ========== -->

        <div class="close__container" >
        <i class='bx bx-x' ></i>
        </div>

      </ul>
    

    <!-- ========= SEARCH CONTAINER ========= -->
    
    <div class="search__account__container">

    <div class="search__container" id="search__container">
    <i class='bx bx-search-alt-2' ></i>
    </div>

    <!-- ======== USER CONTAINER ========= -->

    <div class="user__container">
      <p class="login__button" id="login__button">LOGIN</p>
      <div class="account__container">
      <i class='bx bx-user' ></i>
    </div>
  </div>
</div>
</nav>
</header>

<!-- ========= JavaScript Link ========== -->
<script src="js/header.js"></script>

</body>
</html>
