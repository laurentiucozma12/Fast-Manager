<?php

class Database
{
    private $pdo;
    const DB_HOST = "localhost";
    const DB_NAME = "mg_test";
    const DB_USER = "root";
    const DB_PASS = "";

    public function __construct()
    {
        global $pdo;

        try {
            $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Error connecting to the database: " . $e->getMessage());
        }

        $this->pdo = $pdo;
    }
}