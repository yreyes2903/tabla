<?php
require_once '../loader.php';

$id=$_POST['id'];
$consultag = new ConsultaGenerica('alumnos');
$ejecutar=$consultag->eliminar($conexion,$id);
echo "$ejecutar";
 ?>
