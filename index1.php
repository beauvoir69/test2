<?php
include_once "class/Person.php";
include_once "class/Student.php";
$peter = new Person("Peter");

//$peter ->setName("Peter c'est une personne");
echo $peter -> getName();
// changes cursor -> index.php ->+
// git commit -m "creation class personne et affichage sur index"
// git add .
// git pull
// git push
// comment acceder au 
echo "<br>";
$ines = new Student("Je suis Ines");
echo $ines ->getName();
echo "<br>";
$ines -> setStudentId(1);
echo $ines -> getStudentId();

echo "<br>";
echo "<br>";

require_once "Shape.php";

$circle = new Circle(2);
echo "Redius: ".$circle -> calcArea();
echo "<br>";
$rectangle = new Rectangle(10,15);
echo "Rectangle: ".$rectangle -> calcArea();

echo "<br>";
echo "<br>";


?>