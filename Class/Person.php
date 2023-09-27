<?php
class Person{
    private $name;
    private $adresse;
    public $zipCode;
    public $phone; 
    public $email;
    public function getName(){
        return $this ->name;

    }
    // public function setName($name){
    //      return $this -> name = $name;
    // // la methode private seulment fontioner dans class , methode public fonctioner dehore de la class 
    // }
    
    public function __construct($name = null){
          $this ->name = $name; 

    }
}
?>