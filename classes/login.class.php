<?php

class Login extends Dbh {
    private $email;
    private $password;

    public function login($email, $password) {
        $this->email = $email;
        $this->password = $password;
        $conn = $this->connect();
        
        if (isset($email) && isset($password) && !empty($email) && !empty($password)) {    
            $email = trim($email);
            $password = trim($password);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailExists = $conn->prepare('SELECT email FROM users WHERE email = :email');
                $emailExists->bindParam(':email', $email);
                $emailExists->execute();
                $resultsEmail = $emailExists->fetchAll(PDO::FETCH_ASSOC);

                if ($emailExists->rowCount() > 0) {
                    $passwordExists = $conn->prepare('SELECT password FROM users WHERE email = :email');
                    $passwordExists->bindParam(':email', $email);
                    $passwordExists->execute();
                    $resultsPassword = $passwordExists->fetchColumn();

                    if (password_verify($password, $resultsPassword)) {
                        $userID = $conn->prepare('SELECT id FROM users WHERE email = :email AND password = :password');
                        $userID->bindParam(':email', $email);
                        $userID->bindParam(':password', $resultsPassword);
                        $userID->execute();
                        $resultUserID = $userID->fetchColumn();
                        $_SESSION["userID"] = $resultUserID;
                        
                        header('Location: ../includes/homepage.inc.php');
                    } else {
                        echo 'Password is wrong';
                    }
                } else {
                    echo 'This account does not exists.';
                }
            }
        } else if(!isset($_POST['email']) || empty($_POST['email'])) {
            echo 'Email is required';
        } else if(!isset($_POST['password']) || empty($_POST['password'])) {
            echo 'Password is required';
        }   
    }
}