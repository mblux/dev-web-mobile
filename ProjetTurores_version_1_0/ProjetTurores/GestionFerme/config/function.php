<?php

require_once "db.php";

function getCount(string $tableName, string $where = null)
{
    global $pdo;
    $query = "SELECT COUNT(*) AS total FROM $tableName";
    if ($where != null) {
        $query .= " " . $where;
    }
    $statement = $pdo->prepare($query);
    $statement->execute();
    $resul = $statement->fetch(PDO::FETCH_OBJ);
    return $resul->total;
}
function select(string $query, array $params = [])
{
    global $pdo;
    $statement = $pdo->prepare($query);
    $statement->execute($params);
    return $statement->fetchAll(PDO::FETCH_OBJ);
}

function insert(string $tableName, array $columns)
{
    global $pdo;
    $data = new stdClass();
    $params = [];
    $query = "INSERT INTO $tableName(";
    $values = "VALUES(";
    foreach ($columns as $key => $value) {
        $query .= $key . ",";
        $values .= "?,";
        array_push($params, $value);
        $data->$key = $value;
    }
    $query[-1] = ")";
    $values[-1] = ")";
    $query .= $values;
    $statement = $pdo->prepare($query);
    $statement->execute($params);
    $data->id = $pdo->lastInsertId();
    return $data;
}

function update(string $tableName, int $id, array $columns)
{
    global $pdo;
    $data = new stdClass();
    $params = [];
    $query = "UPDATE $tableName SET ";
    foreach ($columns as $key => $value) {
        $query .= $key . "=?,";
        array_push($params, $value);
        $data->$key = $value;
    }
    $query[-1] = " ";
    $query .= "WHERE id=$id";
    $statement = $pdo->prepare($query);
    $statement->execute($params);
    $data->id = $pdo->lastInsertId();
    return $data;
}

function delete(string $tableName, int $id)
{
    global $pdo;

    $query = "DELETE FROM $tableName WHERE id=:id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(":id", $id);
    return $statement->execute();
}