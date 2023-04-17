<?php 
declare(strict_types = 1);
include './includes/autoloader.inc.php';
?>

<form action="../includes/calc.inc.php" method="post">
    <h3>My own calculator</h3>
    <input type="number" step="any" name="num1" placeholder="First number">
    <select name="oper">
        <option value="add">Addition</option>
        <option value="sub">Substraction</option>
        <option value="div">Division</option>
        <option value="mul">Multiplication</option>
    </select>
    <input type="number" step="any" name="num2" placeholder="Second number">
    <button type="submit" name="submit">Calculate</button>
</form>