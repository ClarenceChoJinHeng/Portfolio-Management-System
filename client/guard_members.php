<?php

if ($_SESSION['role'] != 'user') {
    die("<script>alert('Unauthorized access');
     window.location.href = 'login.php';</script>");
}

?>