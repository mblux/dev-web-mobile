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
$listeInscription_eleve = [];
try {

    $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $requet = "SELECT id, nom, prenom, date_naissance, classe, date_inscription, pieces_fournies  FROM inscription_eleve";
    $instruction = $connection->prepare($requet);
    $resultatCode = $instruction->execute();
    if($resultatCode){
      $listeInscription_eleve = $instruction->fetchAll(PDO::FETCH_OBJ);
    }

    $methode = $_SERVER["REQUEST_METHOD"];
    if($methode == "POST"){
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_naissance = $_POST["date_naissance"];
        $classe = $_POST["classe"];
        $date_inscription = $_POST["date_inscription"];
        $pieces_fournies = $_POST["pieces_fournies"];

        $requet = "INSERT INTO inscription_eleve(nom, prenom, date_naissance, classe, date_inscription, pieces_fournies)
        VALUE(:nom, :prenom, :date_naissance, :classe, :date_inscription, :pieces_fournies);";

        $instruction = $connection->prepare($requet);
        $instruction->bindValue(":nom", $nom);
        $instruction->bindValue(":prenom", $prenom);
        $instruction->bindValue(":date_naissance", $date_naissance);
        $instruction->bindValue(":classe", $classe);
        $instruction->bindValue(":date_inscription", $date_inscription);
        $instruction->bindValue(":pieces_fournies", $pieces_fournies);
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
    <title>Liste des inscription des eleves</title>
</head>
<body>
    <h1>Liste des inscription des eleves</h1>
    <table>
        <thead>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date de naissance</th>
            <th>Classe</th>
            <th>Date d'inscription</th>
            <th>Pièces fournies</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            foreach($listeInscription_eleve as $instruction_eleve){
            ?>
            <tr>
                <td><?=$instruction_eleve->id?></td>
                <td><?=$instruction_eleve->nom?></td>
                <td><?=$instruction_eleve->prenom?></td>
                <td><?=$instruction_eleve->date_naissance?></td>
                <td><?=$instruction_eleve->classe?></td>
                <td><?=$instruction_eleve->date_inscription?></td>
                <td><?=$instruction_eleve->pieces_fournies?></td>
                <td><a href="/suprimer_inscription.php?id=<?=$instruction_eleve->id?>">Supprimer</a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h1>Ajouter une inscription</h1>

    <form action="" method="post">
        <label for="nom">Nom</label> <br>
        <input type="text" name="nom"> <br>
        <label for="prenom">Prénom</label> <br>
        <input type="text" name="prenom"> <br>
        <label for="date_naissance">Date de naissance</label> <br>
        <input type="date" name="date_naissance"> <br>
        <label for="classe">Classe</label> <br>
        <input type="text" name="classe"> <br>
        <label for="date_inscription">Date d'inscription</label> <br>
        <input type="date" name="date_inscription"> <br>
        <label for="pieces_fournies">Pièces fournies</label> <br>
        <input type="text" name="pieces_fournies"> <br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>