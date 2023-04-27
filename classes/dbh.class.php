<?php

class Dbh {

    protected function connect() {
        try {
            $host = "localhost";
            $dbName = "fast_manager";
            $username = "root";
            $password = "";

            $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "</br>";
            die();
        }
    }
}