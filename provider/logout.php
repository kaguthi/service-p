<?php
session_start();

if(isset($_SESSION['username'])){
    unset($_SESSION['username']);
    unset($_SESSION['uid']);
    $_SESSION['message'] = "You're logged out!!!";
}
header("Location: login.php");
?>