<?php

session_start();
$user = $_SESSION["user"];
if($user == null){ // Si l'utilisateur ne s'est pas encore connecté
    // header("Location: login.php"); // Rediriger l'utilisateur dans la page de connection
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Menu Moderne</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav class="entete">
            <div class="logo">
                <i class="fas fa-rocket"></i>MonSite
            </div>

            <input type="checkbox" id="toggle-menu">
            <label for="toggle-menu" class="menu-icon"><i class="fa fa-bars"></i></label>

            <ul class="nav-links">
                <li><a href="#"><i class="fas fa-home"></i> Accueil</a></li>

                <li class="dropdown">
                    <a href="#"><i class="fas fa-briefcase"></i> Catalogue <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fas fa-laptop-code"></i> Véhicule Neuf</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt"></i> Véhicule Occasion</a></li>
                        <li><a href="#"><i class="fas fa-chart-line"></i> Électrique</a></li>
                        <li><a href="#"><i class="fas fa-chart-line"></i> Utilitaire</a></li>
                    </ul>
                </li>

                <li><a href="#"><i class="fas fa-user"></i> Fiche Véhicule</a></li>

                <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>

                <li class="dropdown">
                    <a href="#" class="essai"><i class="fas fa-paper-plane"></i> Se Connecter</a>
                    <ul class="dropdown-menu">
                        <li><a href="login_Admin.html"><i class="fas fa-laptop-code"></i> Administrateur</a></li>
                        <li><a href="login.php"><i class="fas fa-mobile-alt"></i> Client</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Exemple de Menu Moderne</h1>
    </main>

</body>

</html>