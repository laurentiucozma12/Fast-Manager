<?php

session_start();

if(isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    include '../includes/autoloader.inc.php';
    $loginContr = new LoginContr($email, $password);
    $loginContr->loginUser();

    header("location: ../index.php?UserLoggedIn");
}