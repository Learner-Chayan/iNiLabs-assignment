<?php

class Animal {
   public string $name;

   public function __construct(string $name){
        $this->name = $name;
   }

   public function makeSound(){
     return " ";
   }
}


class Dog extends Animal{
    public function makeSound(){
        return "woof, woof , ruff , ruff";
    }
}

class Cow extends Animal{
    public function makeSound(){
        return "Humba , Humba";
    }
}


// class objects
$dog = new Dog('Dog');
$cow = new Cow('Cow');


// make sounds
echo $dog->name." says ".$dog->makeSound();
echo "</br>";
echo $cow->name." says ".$cow->makeSound();