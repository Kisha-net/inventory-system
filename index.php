
<?php
include 'app/includes/head.php';
session_destroy();
echo $_SESSION['username'];
header("location:app/login.php");
?>