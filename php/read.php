<?php
// abrimos la conexion
include_once "connection.php";

// hacemos la consulta
$sql  = "SELECT * FROM $db_table";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

// cerramos la conexion
include_once "close.php";

// mandamos la respuesta en formato json
echo json_encode($result);
