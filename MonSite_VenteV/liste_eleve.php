<?php

session_start();
$user = $_SESSION["user"];

if($user == null){
    header("Location: login.php");
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$servername = "localhost";
$username = "mlux";
$password = "mblux1234";
$connection = null;
$listeEleve = [];
try {

    $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requet = "SELECT id, nom, prenom FROM eleve";
    $instruction = $connection->prepare($requet);
    $resultatCode = $instruction->execute();
    if($resultatCode){
      $listeEleve = $instruction->fetchAll(PDO::FETCH_OBJ);
    }

    $methode = $_SERVER["REQUEST_METHOD"];
    if($methode == "POST"){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];

        $requet = "INSERT INTO eleve(nom, prenom)VALUE(:nom, :prenom);";

        $instruction = $connection->prepare($requet);
        $instruction->bindValue(":nom", $nom);
        $instruction->bindValue(":prenom", $prenom);
        $result = $instruction->execute();
    }

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des eleves</title>
</head>
<body>
    <h1>Liste des eleves</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            foreach($listeEleve as $eleve){
            ?>
            <tr>
                <td><?=$eleve->id?></td>
                <td><?=$eleve->nom?></td>
                <td><?=$eleve->prenom?></td>
                <td><a href="/suprimer_eleve.php?id=<?=$eleve->id?>">Supprimer</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h1>Ajouter un élève</h1>

    <form action="" method="post">
        <label for="nom">Nom</label> <br>
        <input type="text" name="nom"> <br>
        <label for="prenom">Prénom</label> <br>
        <input type="text" name="prenom"> <br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>