<?php

class Login extends Dbh {

    protected function getUser($email, $password) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = :email');
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

        if ($stmt) {
            $user = $stmt->fetch();
            $checkPassword = password_verify($password, $user['password']);
            if ($checkPassword == false) {
                $stmt = null;
                header("location: ../index.php?error=wrongpassword");
                exit();
            } else if ($checkPassword == true) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $stmt = null; 
            }
        }

        $stmt = null;
    }
}