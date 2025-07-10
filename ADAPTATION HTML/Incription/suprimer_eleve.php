<?php


$servername = "localhost";
$username = "mlux";
$password = "mblux1234";
$connection = null;
$listeEleve = [];
try {

    $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET["id"];
    $requet = "DELETE FROM eleve WHERE id=:id";
    $instruction = $connection->prepare($requet);
    $instruction->bindValue(":id", $id);
    $resultatCode = $instruction->execute();
    header("Location: liste_eleve.php");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}