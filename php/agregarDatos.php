<?php
require_once '../conexion.php';
$conexion=conexion();

$nombre=filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$apellido=filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$edad=filter_var($_POST['edad'], FILTER_SANITIZE_NUMBER_INT);

//Funciona con mysqli
/*$sql=$conexion->prepare("INSERT into alumnos (nombre,apellido,email,edad)
                            values (?,?,?,?)");
$sql->bind_param("sssi", $nombre, $apellido, $email, $edad);
$sql->execute();*/

$sql=$conexion->prepare("INSERT into alumnos (nombre,apellido,email,edad)
                            values (?,?,?,?)");
$sql->bindParam(1, $nombre, PDO::PARAM_STR);
$sql->bindParam(2, $apellido, PDO::PARAM_STR);
$sql->bindParam(3, $email, PDO::PARAM_STR);
$sql->bindParam(4, $edad, PDO::PARAM_INT);
$sql->execute();


/*$sql = "INSERT into alumnos (nombre,apellido,email,edad)
                            values (?,?,?,?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssi", $nombre, $apellido, $email, $edad);
$stmt->execute();
$result = $stmt->get_result();*/



 ?>
