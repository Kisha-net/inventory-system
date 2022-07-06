<?php
include 'classes/Authenticate.php';
session_start();
if (isset($_SESSION['user_id'])) {
    session_destroy();
    header("location:app/login.php");
}
   

?>