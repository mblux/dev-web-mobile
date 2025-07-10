<?php


$servername = "localhost";
$username = "mlux";
$password = "mblux1234";
$connection = null;
try {
  $connection = new PDO("mysql:host=$servername;dbname=inscription", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

