<?php
// variables post
$user_id       = $_POST['user_id'];
$user_name     = $_POST['user_name'];
$user_email    = $_POST['user_email'];
$user_password = $_POST['user_password'];

if (isset($user_id) && !empty($user_id) && isset($user_name) && !empty($user_name) && (isset($user_email) && !empty($user_email)) && (isset($user_password) && !empty($user_password))) {
   // abrimos la conexion
   include_once "connection.php";

   // hacemos la consulta
   $sql  = "UPDATE $db_table SET user_name = '$user_name', user_email = '$user_email', user_password = '$user_password' WHERE user_id = '$user_id'";
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
