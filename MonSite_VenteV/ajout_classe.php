<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "mlux";
$password = "mblux1234";
$connection = null;
try {
    $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom = $_POST["nom"];

    $requet = "INSERT INTO classe(nom)VALUE(:nom);";

    $instruction = $connection->prepare($requet);
    $instruction->bindValue(":nom", $nom);
    $result = $instruction->execute();

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

require "form_ajout_classe.php";