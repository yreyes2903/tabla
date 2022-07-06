<?php
require_once '../loader.php';

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$edad=$_POST['edad'];
//$persona= new Persona($nombre,$apellido,$email,$edad,$id);
//$ejecutar=$persona->actualizar($conexion);
$consultag = new ConsultaGenerica('alumnos');
$obj=array('nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'edad' => $edad);
$ejecutar=$consultag->actualizar($conexion,$obj,$id);
echo "$ejecutar";
 ?>
