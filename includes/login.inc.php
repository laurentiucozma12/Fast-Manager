<?php

if(isset($_POST['submit'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";
    $login = new LoginContr($email, $password);

    $login->loginUser();

    header("location: ../index.php?UserLoggedIn");
}