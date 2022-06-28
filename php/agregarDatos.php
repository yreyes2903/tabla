<?php
require_once '../conexion.php';
$conexion=conexion();

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$edad=$_POST['edad'];

$sql="INSERT into alumnos (nombre,apellido,email,edad)
            values ('$nombre','$apellido','$email','$edad')";
echo $result=mysqli_query($conexion,$sql);

 ?>
