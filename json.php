<?php
 $arr = array('nombre' => 'yoel', 'apellido' => 'reyes', 'edad' => 31);

 $jsonerr = json_encode($arr);
echo "$jsonerr"."<br />";
echo $jsonerr['nombre']."<br />";
var_dump($jsonerr);
$jsondec = json_decode($jsonerr);
var_dump($jsondec);
echo $jsondec->nombre."<br />";
echo $jsondec->apellido."<br />";

 ?>
<script type="text/javascript">

</script>
