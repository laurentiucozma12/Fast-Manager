<?php

class Register extends Dbh {

    protected function setUser($username, $email, $password) {        
        $options = array('cost'=>4);
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password);');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
    
        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
    
        $stmt = null;
    }

    protected function checkUser($email) {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = :email;');
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