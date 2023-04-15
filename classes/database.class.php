<?php

class Database
{
    public $pdo;
    public $DB_HOST = "localhost";
    public $DB_USER = "root";
    public $DB_PASS = "";
    public $DB_NAME = "fast_manager";

    public function __construct()
    {
        global $pdo;

        try {
            $pdo = new PDO("mysql:host=".$this->DB_HOST.";dbname=".$this->DB_NAME, $this->DB_USER, $this->DB_PASS);
           $this->pdo->setAttribute(PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Error connecting to the database: " . $e->getMessage());
        }

        $this->pdo = $pdo;
    }
}