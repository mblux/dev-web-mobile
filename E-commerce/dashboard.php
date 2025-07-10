<?php
session_start();

// Vérification de session
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

// Connexion à la base pour récupérer les infos (optionnel si déjà stocké en session)
require_once 'config.php';
$stmt = $pdo->prepare("SELECT nom, email FROM utilisateurs WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    // utilisateur introuvable
    session_destroy();
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - DooM+ Auto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            max-width: 800px;
            margin: 60px auto;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            text-align: center;
        }
        h1 {
            color: #333;
        }
        .info {
            margin: 20px 0;
            font-size: 1.2em;
        }
        a.button {
            display: inline-block;
            margin: 10px;
            padding: 12px 20px;
            text-decoration: none;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            transition: 0.3s;
        }
        a.button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .dashboard {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h1>Bienvenue, <?= htmlspecialchars($user['nom']) ?> 👋</h1>
    <p class="info">Email : <?= htmlspecialchars($user['email']) ?></p>

    <a href="index.php" class="button">Accueil</a>
    <a href="logout.php" class="button">Se déconnecter</a>
</div>

</body>
</html>
