<?php
require "../config/function.php";

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {
    if (isset($_POST["nom"]) && isset($_POST["id"])) {
        $nom = $_POST["nom"];
        $id = $_POST["id"];
        update("especes", $id, ["nom" => $nom]);
    }
}
header("location: /especes/index.php");
