<?php
require_once '../conexion.php';
$conexion=conexion();

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$edad=$_POST['edad'];

//$sql="UPDATE alumnos SET nombre='$nombre',apellido='$apellido',email='$email',edad='$edad'
  //          WHERE id='$id'";
$sql = $conexion->prepare("UPDATE alumnos SET nombre = :nombre, apellido= :apellido, email= :email, edad= :edad
  WHERE id = :id");
$sql->execute(array(
                ':id'   => $id,
                ':nombre' => $nombre,
                ':apellido' => $apellido,
                ':email' => $email,
                ':edad' => $edad
              ));
//echo $result=mysqli_query($conexion,$sql);
echo $sql->rowCount();
 ?>
