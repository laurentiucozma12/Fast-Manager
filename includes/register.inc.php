<?php

if(isset($_POST['submit'])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordrepeat"];

    include "../classes/dbh.class.php";
    include "../classes/register.class.php";
    include "../classes/register-contr.class.php";    
    // include '../includes/autoloader.inc.php';
    $register = new RegisterContr($username, $email, $password, $passwordRepeat);

    $register->registerUser();

    header("location: ../index.php?error=none");
}