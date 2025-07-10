<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);


$username = "fermier";
$password = "superPassword";
$pdo = new PDO("mysql:host=localhost;dbname=fermes", $username, $password);