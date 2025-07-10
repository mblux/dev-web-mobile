<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un eleve</title>
</head>
<body>
    <h1>Ajouter un élève</h1>

    <form action="/ajout_eleve.php" method="post">
        <label for="nom">Nom</label> <br>
        <input type="text" name="nom"> <br>
        <label for="nom">Prénom</label> <br>
        <input type="text" name="prenom"> <br>

        <input type="submit" value="Ajouter">
    </form>

</body>
</html>