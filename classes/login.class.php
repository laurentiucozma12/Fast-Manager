<?php

class Login extends Dbh {

    protected function getUser($email, $password) {
        $stmt = $conn->prepare('SELECT password FROM users WHERE email = :email');
        $stmt->bindParam(':email', $email);     
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll();
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);
    
        if ($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } else if ($checkPassword == true) {        
            $stmt = $conn->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
            $stmt->bindParam(':email', $email);     
            $stmt->bindParam(':password', $password);  
            
            if (!$stmt->execute()) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll();
            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['email'] = $user[0]['email'];

            $stmt = null;
        }

        $stmt = null;
    }
}