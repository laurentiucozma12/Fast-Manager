<?php
if (!defined('HOMEPAGE')) {
    header('Location: ../index.php');
    exit;
}

include './assets/config/config.php';
include ROOT_PATH.'/assets/html/head.php';
?>


<div>
    <h1>Home page</h1>
    <p>
        Welcome to homepage
    </p>
</div>

<?php 
include './assets/html/footer.php';
?>
