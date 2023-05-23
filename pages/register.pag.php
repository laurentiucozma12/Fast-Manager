<?php
    include '../assets/config/config.php';
    include '../assets/html/head.php';
?>

<div>
    <h1>Register page</h1>
    <p>
        Welcome to Register
    </p>
</div>

<div class="form-wrap">
    <div class="forms-container">
        <form action="../includes/register.inc.php" class="register" method="POST">
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
    </div>
</div>