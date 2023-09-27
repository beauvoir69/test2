<?php
$host = "localhost";
$db = "31b";
$user = "root";
$password = "";
$dsn = "mysql:host=$host;dbname= $db;charset=UTF8";
global $oPDO;
try{
    $oPDO = new PDO($dsn, $user, $password);
    if($oPDO){
        echo "Conneted to the $db database successfully";
    }

}catch(PDOException $e){
    echo $e->getMessage();
}

require_once "class/Livre.php";


$olivre = new livre;
$livre = $olivre->getLivre
var_dump($olivre);
echo "<br>";
echo "<br>";


// $livres = $olivre->getLivres("2");
// echo "<br>";
// echo "<br>";

// print_r ($livres);
// var_dump($livres);
// echo "<br>";
// var_dump($livres[1]);

// echo "<br>";
// echo "<br>";
// $livre = $oli

$olivre = new Livre;




?>