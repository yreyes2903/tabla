<?php
require_once '../conexion.php';
$conexion=conexion();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$edad=$_POST['edad'];

$sql="UPDATE alumnos SET nombre='$nombre',apellido='$apellido',email='$email',edad='$edad'
            WHERE id='$id'";
echo $result=mysqli_query($conexion,$sql);

 ?>
