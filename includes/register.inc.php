<?php

if(isset($_POST['submit'])) {

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["passwordrepeat"];

    include '../includes/autoloader.inc.php';
    $registerContr = new RegisterContr($username, $email, $password, $passwordRepeat);
    $registerContr->registerUser();

    header("location: ../index.php?error=none");
}

?>
