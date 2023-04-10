<?php

require_once 'database.php';
require_once 'register.php';
require_once 'login.php';

$action = isset($_GET['action']) ? $_GET['action'] : null;

if ($action) {
    $pdo = new Database();
}

switch ($action) {
    case 'newUser':
        $user = new User();
        $users = $user->newUser($pdo);
        echo jsno_encode($users);
        break;

    default:
        echo 'Invalid action';
        break;
}