<?php 


class Employee {
    private string $name;
    private int $id;
    private int $salary;

    public function __construct(){
        $this->name = "";
        $this->id = 0;
        $this->salary = 0;
    }


    // setters
    public function setName(string $name = ""){
        $this->name = $name;
    }

    public function setId(int $id = 0){
        $this->id = $id;
    }

    public function setSalary(int $salary=0){
        $this->salary = $salary;
    }


    // getters
    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    public function getSalary(){
        return $this->salary;
    }
}



// class object 
$emp = new Employee();

//set info 
$emp->setName("Chayan Roy");
$emp->setId(1819320);
$emp->setSalary(15000);

// get info
echo "Employee name : ".$emp->getName()." , ID: ".$emp->getId()." , Salary : ".$emp->getSalary();


// invalid way
// $emp->name = "Chayan Roy"; // Error