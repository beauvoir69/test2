<?php class Personne{
    public $name;
    public $adresse;
    public $zipcode;
    public $phone;
    public $email;

public function getName(){
    return $this->name;

}
public function  setName($name){
     $this->name = $name;

}
}