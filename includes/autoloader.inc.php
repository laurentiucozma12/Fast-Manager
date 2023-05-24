<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $file = __DIR__ . '/../classes/' . $className . '.class.php';

    if (file_exists($file)) {
        require_once $file;
    }
}