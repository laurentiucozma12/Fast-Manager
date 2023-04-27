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
            echo "Invalid username!";
            header("location:../index.php?error=invalidinput");
            exit();
        }
        
        if ($this->invalidEmail() == false) {
            echo "Invalid email!";
            header("location:../index.php?error=invalidinput");
            exit();
        }
        
        if ($this->passwordMatch() == false) {
            echo "Passwords does not match!";
            header("location:../index.php?error=passwordmatch");
            exit();
        }

        if ($this->usernameTaken() == false) {
            echo "Username or email is taken";
            header("location:../index.php?error=usernameoremailtaken");
            exit();
        }

        $this->setUser($this->username, $this->email, $this->password);

    }

    private function emptyInput() {
        $result;
        if (empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat) || isset($_POST[$this->username]) || isset($_POST[$this->email]) || isset($_POST[$this->password]) || isset($_POST[$this->passwordRepeat])) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    private function invalidUsername() {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
    
    private function invalidEmail() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
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

    private function usernameTaken() {
        $result;
        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }
}