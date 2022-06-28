<?php
/*function conexion()
{
  $host='localhost';
  $usuariodb='root';
  $passwdb='';
  $nombredb='person';

  if(!($conexion=mysql_connect($host,$usuariodb,$passwdb,$nombredb)))

  {
  echo "Error conectando a la base de datos.";
  exit();
  }
  if (!mysql_select_db($nombredb,$conexion))
{
echo "Error seleccionando la base de datos, verifique que el nombre de usuario utilizado este asociado a la base de datos.";
exit();
}
  return $conexion;
}

$conexion = conexion();
echo "conexion establecida";
echo "$conexion";
*/
/*function Conectarse()
{
$host='localhost';
$usuariodb='desarrollo';
$passwdb='mtfg1902';
$nombredb='persona';

if (!($link=mysqli_connect($host,$usuariodb,$passwdb,$nombredb)))
{
echo "Error conectando a la base de datos.";
exit();
}
if (!mysql_select_db($nombredb,$link))
{
echo "Error seleccionando la base de datos, verifique que el nombre de usuario utilizado este asociado a la base de datos.";
exit();
}
return $link;
}

if($link=Conectarse()){
echo "Conexión con la base de datos conseguida.";
}
mysql_close($link); //cierra la conexion
*/
function conexion(){
$host='localhost';
$usuariodb='desarrollo';
$passwdb='mtfg1902';
$nombredb='persona';

$conexion=mysqli_connect($host,$usuariodb,$passwdb,$nombredb) or die("Unable to Connect to '$host'");
mysqli_select_db($conexion, $nombredb) or die("Could not open the db '$nombredb'");

return $conexion;
}
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
