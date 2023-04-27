<?php

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "fast_manager";

    protected function connect() {
        $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}