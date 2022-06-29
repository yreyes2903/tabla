<?php
function conexion(){
$host='localhost';
$usuariodb='desarrollo';
$passwdb='mtfg1902';
$nombredb='persona';

$dsn = "mysql:host=$host;port=3306;dbname=$nombredb";
$options = array(PDO::ATTR_EMULATE_PREPARES => false);

$conexion = new PDO($dsn, $usuariodb, $passwdb, $options);

//Prueba de conexion
/*$statement = $pdo->prepare("SELECT * FROM alumnos");
$statement->execute();
// print results
while ($result = $statement->fetch()) {
    echo $result['nombre'].'<br>';
}*/



//$conexion = new mysqli($host, $usuariodb, $passwdb, $nombredb);
return $conexion;



}
//funciona pero da problema cuando se corrige el error de inyeccion sql
//$conexion=mysqli_connect($host,$usuariodb,$passwdb,$nombredb) or die("Unable to Connect to '$host'");
//mysqli_select_db($conexion, $nombredb) or die("Could not open the db '$nombredb'");

#de aqui en adelante muestra las tablas que tiene la base de datos
/*$test_query = "SHOW TABLES FROM $nombredb";
$result = mysqli_query($link, $test_query);

$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}

if (!$tblCnt) {
  echo "There are no tables<br />\n";
}
if ($tblCnt==1) {
  echo "There is $tblCnt tables <br />";
}
else {
  echo "There are $tblCnt tables<br />\n";
}*/

 ?>
