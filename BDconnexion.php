<?php

$servername='localhost';
$username='root';
$password='root';
$databasename='projet_bd';

try{
    $conn=new PDO("mysql:host=$servername;dbname:$databasename",$username,$password);
}
catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}


?>