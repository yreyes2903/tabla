<?php
require_once '../conexion.php';
$conexion=conexion();

$id=$_POST['id'];

//$sql="DELETE from alumnos WHERE id='$id'";
//echo $result=mysqli_query($conexion,$sql);

$sql= $conexion->prepare("DELETE FROM alumnos WHERE id=?");
$sql->execute([$id]);
echo $sql->rowCount();
 ?>
