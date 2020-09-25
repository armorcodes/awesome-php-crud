<?php
// variables post
$user_id = $_POST['user_id'];

if (isset($user_id) && !empty($user_id)) {
   // abrimos la conexion
   include_once "connection.php";

   // hacemos la consulta
   $sql  = "DELETE FROM $db_table WHERE user_id = '$user_id'";
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
