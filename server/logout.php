<?php 
// JUSTIN
session_start();

session_unset();

session_destroy();

echo "<script>window.location.href = '../client/index.php';</script>";
?>