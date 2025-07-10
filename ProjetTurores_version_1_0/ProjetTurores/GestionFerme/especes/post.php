<?php
require "../config/function.php";

$method = $_SERVER["REQUEST_METHOD"];
if ($method == "POST") {
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
        insert("especes", ["nom" => $nom]);
    }
}
header("location: /especes/index.php");
