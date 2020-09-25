<?php
// variables post
$user_name     = $_POST['user_name'];
$user_email    = $_POST['user_email'];
$user_password = $_POST['user_password'];

if (isset($user_name) && !empty($user_name) && (isset($user_email) && !empty($user_email)) && (isset($user_password) && !empty($user_password))) {
   // abrimos la conexion
   include_once "connection.php";

   // hacemos la consulta
   $sql  = "INSERT INTO $db_table (user_id, user_name, user_email, user_password) VALUES (NULL, '$user_name', '$user_email', '$user_password')";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   $result = $stmt->rowCount();

   // cerramos la conexion
   include_once "close.php";

   // mandamos la respuesta
   echo $result;
} else {
   echo 0;
}
