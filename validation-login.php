<?php

session_start();

global $username;
global $password;

$db = mysqli_connect('localhost','root','','carpool');

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['login_error'] = "";

$user_check_query = "SELECT * from user WHERE username = '$username' and password = '$password'";

$results = mysqli_query($db, $user_check_query);
$num = mysqli_num_rows($results);

if($num == 1) {
    $_SESSION['login_error'] = "";
    $_SESSION['username'] = $username;
    header('location: index.php');
} else {
    $_SESSION['login_error'] = "Username doesn't exist!";
    header('location: login.php');
}
?>