<?php
require_once '../loader.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$edad=$_POST['edad'];

$persona= new Persona($nombre,$apellido,$email,$edad,$id);
$ejecutar=$consulta->actualizar($conexion,$persona);
echo "$ejecutar";
 ?>
