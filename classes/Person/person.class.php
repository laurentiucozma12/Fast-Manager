<?php

namespace Person;

class Person {
    // Properties
    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    // Methods
    public function setPerson($name) {
        $this->name = $name;
    }

    public function getPerson() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}