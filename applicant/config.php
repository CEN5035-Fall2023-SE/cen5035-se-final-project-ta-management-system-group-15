<?php 
include('../db.php');
if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_email"])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Retrieve and store session data
$user_id = $_SESSION["user_id"];
$user_email = $_SESSION["user_email"];
$full_name = $_SESSION['full_name'];
$number = $_SESSION['number'];
$status = $_SESSION['status'];
$score = $_SESSION['score'];
$city = $_SESSION['city'];
$country = $_SESSION['country'];
$state = $_SESSION['state'];
$exp = $_SESSION['exp'];
$hall = $_SESSION['hall'];
$courses = $_SESSION['courses'];
?>