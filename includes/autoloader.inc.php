<?php
spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
    $path = ROOT_PATH."/classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    include_once $fullPath;
}