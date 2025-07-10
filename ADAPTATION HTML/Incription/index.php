<?php

session_start();
$user = $_SESSION["user"];
if($user == null){ // Si l'utilisateur ne s'est pas encore connecté
    header("Location: login.php"); // Rediriger l'utilisateur dans la page de connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        .container{
            height: 85vh;
            
            display: grid;
            justify-content: center;
            align-items: center;
            
        }

        body {
            background: url(123.jpg);
            background-size: cover;
            background-position: center;
        }
        .container a{
            text-decoration: none;
            padding: 2px;
            border: 10px solid blue;
            border-radius: 10px;
            font-weight: bold;
            color: beige;
            background-color: blue;
            cursor: pointer;
            transition: 0.5s;
            text-align: center;
        }
        a:hover {
            color: black;
            transform: rotate(5deg);
        }
    </style>
</head>
<body>
    
    <div class="container">
        <a href="liste_eleve.php">Liste des élèves</a>
        <a href="liste_classe.php">Liste des classe</a>
        <a href="inscription_eleve.php">Inscription</a>
    </div>

</body>
</html>