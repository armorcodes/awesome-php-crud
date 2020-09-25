<?php
// variables de conexion
$db_host     = 'localhost';
$db_name     = 'crud';
$db_table    = 'users';
$db_user     = 'root';
$db_password = '';

// conexion a la base de datos
try {
   $conn = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo "¡Error!: " . $e->getMessage() . "<br/>";
}
