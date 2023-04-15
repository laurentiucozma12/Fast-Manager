<?php

class House {
    // Properties
    private $street;
    private $number;

    public function __construct($street, $number) {
        $this->street = $street;
        $this->number = $number;
    }

    // Methods
    public function setAdress($street) {
        $this->street = $street;
    }

    public function getAdress() {
        return $this->street;
    }

    public function getNumber() {
        return $this->number;
    }
}