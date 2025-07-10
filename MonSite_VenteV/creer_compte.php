<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$servername = "localhost";
$username = "mlux";
$password = "mblux1234";
$erreur = null;

$methode = $_SERVER["REQUEST_METHOD"];

if($methode == "POST"){
    try {

        $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $requet = "INSERT INTO user(login, password)VALUE(:login, :password);";
        $instruction = $connection->prepare($requet);
    
        $login = $_POST["login"];
        $password = $_POST["password"];
        $hashPassword = hash("sha1", $password);
        
        $instruction->bindValue(":login", $login);
        $instruction->bindValue(":password", $hashPassword);

        $resultatCode = $instruction->execute();
        if($resultatCode){
            header("Location: login.php");
        }    
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            display: grid;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url(creer.jpg) no-repeat;
            background-size: cover;
            background-position: center;
        }
        .connexion {
            display: grid;
            border: 2px  ;
            background: transparent;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: black;
            border-radius: 10px;
            padding: 30px 40px;
        }
        .connexion h1 {
            text-align: center;
        }
        .connexion .connexion-input {
            width: 100%;
            height: 50px;
            margin: 20px 0;
        }
        .connexion-input input {
            width: 100%;
            height: 100%;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgb(134, 134, 134);
            border-radius: 40px;
            font-size: 16px;
            color: black;
            padding: 20px 45px 20px 20px;
        }
        .btn input {
            width: 100%;
            height: 100%;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
            cursor: pointer;
            font-size: 16px;
            color: #333;
            font-weight: 600;
            margin: 20px 0;
            padding: 20px 45px 20px 20px;
            font-size: 18px;
            font-weight: bold;
        }
        .connecter a {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 14.5px;
            color: #fff;
        }
        .connecter a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="connexion">
        <h1>Creer un compte</h1>
        <h5><?=$erreur?></h5>
        <form action="" method="post">
            <div class="connexion-input">
                <label for="login">Login</label> <br>
                <input type="text" name="login"> <br>
            </div>
            <div class="connexion-input">
                <label for="login">Mot de passe</label> <br>
                <input type="" name="password"> <br>
            </div>
            <div class="btn">
                <input type="submit" value="Creer"> <br>
            </div>
        </form>
        <div class="connecter">
            <a href="login.php">Connectez-vous</a>
        </div>
    </div>
</body>
</html>