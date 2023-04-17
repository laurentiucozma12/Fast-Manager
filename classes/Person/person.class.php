<?php

namespace Person;

class Person {
    // Properties
    public $name;
    public $eyeColor;
    public $age;

    // Methods
    public function setName(string $newName) {
        $this->name = $newName;
    }

    public function getName() {
        return $this->name;
    }
}