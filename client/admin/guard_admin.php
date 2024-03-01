<?php
// Justin
session_start();

if ($_SESSION['role'] != 'admin') {
    die("<script>alert('Unauthorized access');
     window.location.href = '../index.php';</script>");
}

?>