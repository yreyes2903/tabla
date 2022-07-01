<?php
require_once '../loader.php';

$id=$_POST['id'];
$ejecutar=$consulta->eliminar($conexion,$id);
echo "$ejecutar";
 ?>
