<?php

class RegisterContr extends Register {

    private $username;
    private $email;
    private $password;
    private $passwordRepeat;

    public function __construct($username, $email, $password, $passwordRepeat) {

        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
    
    }

    public function registerUser() {
        if ($this->emptyInput() == false) {
            echo "Empty input!";
            header("location:../index.php?error=emptyinput");
            exit();
        }
        
        if ($this->invalidUsername() == false) {
            echo "Username should be at least 3 characters in length and no longer than 20 characters!";
            header("location:../index.php?error=invalidusername");
            exit();
        }
        
        if ($this->invalidEmail() == false) {
            echo "Invalid email!";
            header("location:../index.php?error=invalidemail");
            exit();
        }
        
        if ($this->invalidPassword() == false) {
            echo 'Password should be at least 8 characters in length, no longer than 20 characters and should include at least one upper case letter, one number, and one special character.';
            header("location:../index.php?error=invalidPassword");
            exit();
        }
        
        if ($this->passwordMatch() == false) {
            echo "Passwords does not match!";
            header("location:../index.php?error=passwordmatch");
            exit();
        }

        if ($this->emailTaken() == false) {
            echo "Email is taken";
            header("location:../index.php?error=emailtaken");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password);

    }

    private function emptyInput() {
        $result;
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = true;
        } else {
            $result = false;
        }
    
        return $result;
    }

    private function invalidUsername() {
        $result;
        if (!preg_match("/^[\\sa-zA-Z0-9]*$/", $this->username) || strlen($this->username) < 3 || strlen($this->username) > 20) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
    
    private function invalidEmail() {
        $result;        
        $email = trim($_POST['email']);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidPassword() {
        $result;        
        $password = trim($this->password);
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8 || strlen($password) > 20) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function passwordMatch() {
        $result;
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    
    }

    private function emailTaken() {
        $result;
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}