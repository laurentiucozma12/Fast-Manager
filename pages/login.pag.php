<?php
    include '../assets/config/config.php';
    include ROOT_PATH.'/assets/html/head.php';
?>

<div>
    <h1>Login page</h1>
    <p>
        Welcome to Login
    </p>
</div>

<div class="form-wrap">        
        <form action="../includes/login.inc.php" class="login" method="POST">
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