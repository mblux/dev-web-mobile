<?php
require "../config/function.php";

$id = null;
if (isset($_POST["id"])) {
    $id = $_POST["id"];
} else if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
if ($id) {
    delete("betails", $id);
}
header("location: /betails/index.php");
