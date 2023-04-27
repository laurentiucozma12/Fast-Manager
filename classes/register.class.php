<?php

class Register extends Dbh {

    protected function setUser($username, $email, $password) {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password);');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $options = array('cost'=>4);
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $stmt->bindParam(':password', $hashedPassword);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = :username OR email = :email;');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    
        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
    
        return $resultCheck;
    }
    

}