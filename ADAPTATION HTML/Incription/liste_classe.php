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
$listeClasse = [];
try {

    $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requet = "SELECT id, nom FROM classe";
    $instruction = $connection->prepare($requet);
    $resultatCode = $instruction->execute();
    if($resultatCode){
      $listeClasse = $instruction->fetchAll(PDO::FETCH_OBJ);
    }

    $methode = $_SERVER["REQUEST_METHOD"];
    if($methode == "POST"){
        $nom = $_POST["nom"];

        $requet = "INSERT INTO classe(nom)VALUE(:nom);";

        $instruction = $connection->prepare($requet);
        $instruction->bindValue(":nom", $nom);
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
    <title>Liste des classes</title>
</head>
<body>
    <h1>Liste des classes</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            foreach($listeClasse as $classe){
            ?>
            <tr>
                <td><?=$classe->id?></td>
                <td><?=$classe->nom?></td>
                <td><a href="/suprimer_classe.php?id=<?=$classe->id?>">Supprimer</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h1>Ajouter une classe</h1>

    <form action="" method="post">
        <label for="nom">Nom</label> <br>
        <input type="text" name="nom"> <br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>