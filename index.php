<?php
    include 'includes/autoloader.inc.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatibile" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav-bar">
        <?php
        if(isset($_SESSION['id'])) {
        ?>
            <h3><?php echo "Hello " . $_SESSION['username'] . "!"?></h3>
            <button><a href="includes/logout.inc.php">LOGOUT</a></button>            
        <?php 
        } else {
        ?>
            <!-- <li><a href="">REGISTER</a></li>
            <li><a href="">LOGIN</a></li> -->
        <?php 
        }
        ?>
    </div>
    <div class="form-wrap">
        <div class="forms-container">
            <form action="includes/register.inc.php" class="register" method="POST">
                <div class="box">
                    <div class="data-container">
                        <label for="username">Username:</label>
                        <input type="text" name="username">
                    </div>
                    <div class="data-container">
                        <label for="email">Email:</label>
                        <input type="text" name="email">
                    </div>
                    <div class="data-container">
                        <label for="password">Password:</label>
                        <input type="password" name="password"> 
                    </div>
                    <div class="data-container">
                        <label for="passwordrepeat">Repeat Password:</label>
                        <input type="password" name="passwordrepeat"> 
                    </div>
                    <div class="data-container btn">
                        <button type="submit" name="submit">Register</button>
                    </div>
                </div>
            </form>
            <form action="includes/login.inc.php" class="login" method="POST">
                <div class="box">
                    <div class="data-container">
                        <label for="email">Email:</label>
                        <input type="text" name="email">
                    </div>
                    <div class="data-container">
                        <label for="password">Password:</label>
                        <input type="password" name="password">
                    </div>
                    <div class="data-container btn">
                        <button type="submit" name="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>