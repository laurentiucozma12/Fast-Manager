<?php 
include '../includes/config.inc.php';
include ROOT_PATH.'/includes/autoloader.inc.php';
// include ROOT_PATH.'/client/assets/html/head.php';
// include ROOT_PATH.'/client/assets/html/navbar.php';
?>
<div>
    <h3>Hello</h3>
    <br>
</div>



<?php
    $person1 = new Person\Person("Lau", 23);
    echo $person1->getPerson() . " is " . $person1->getAge() . "<br>";
    // Lau is 23

    $house1 = new House("Johndoeroad", 12);
    echo $house1->getAdress() . " " . $house1->getNumber();
    // Johndoeroad 12
?>



<div>
    <br>
    <h3>Bye</h3>
</div>

<?php 
// include ROOT_PATH.'/client/assets/html/footer.php'; 
?>