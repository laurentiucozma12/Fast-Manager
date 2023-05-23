<?php
    include '../assets/config/config.php';
    include '../assets/html/head.php';
    session_start();
?>

<div>
    <h1>User page</h1>
    <p>
        Welcome to User
    </p>
</div>

<div class="nav-bar">
    <?php
    if(isset($_SESSION['id'])) {
    ?>
        <h3><?php echo "Hello " . $_SESSION['username'] . "!"?></h3>
        <button><a href="includes/logout.inc.php">LOGOUT</a></button>            
    <?php 
    } else {
    ?>
    <ul class="d-flex pt-2">
        <li><a class="me-4" href="<?php echo WEB_PATH; ?>/pages/register.pag.php">REGISTER</a></li>
        <li><a class="" href="<?php echo WEB_PATH; ?>/pages/login.pag.php">LOGIN</a></li>
    </ul>
</div>
<?php 
}