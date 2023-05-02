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
        }

        $stmt = null;
    }
}