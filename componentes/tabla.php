<?php
session_start();
require_once '../conexion.php';
$conexion=conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Tabla dinamica alumnos</h2>
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
      <caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
      <thead>
        <tr>
  				<td>Nombre</td>
  				<td>Apellido</td>
  				<td>Email</td>
  				<td>Edad</td>
  				<td>Editar</td>
  				<td>Eliminar</td>
  			</tr>
      </thead>
      <tbody>

      <?php
      if(isset($_SESSION['consulta'])){
         if($_SESSION['consulta'] > 0){
           $idp=$_SESSION['consulta'];
           $sql="SELECT id,nombre,apellido,email,edad
           from alumnos where id='$idp'";
         }else{
           $sql="SELECT id,nombre,apellido,email,edad
           from alumnos";
         }
       }else{
      //   $sql="SELECT id,nombre,apellido,email,edad
      //     from alumnos";
           $sql = $conexion->prepare("SELECT id,nombre,apellido,email,edad FROM alumnos");
           $sql->execute();

       }
			 //$result=mysqli_query($conexion,$sql);
			 while ($ver=$sql->fetch()) {
       $datos=$ver[0]."||".
              $ver[1]."||".
              $ver[2]."||".
              $ver[3]."||".
              $ver[4];
			 ?>
			<tr>
				<td><?php echo $ver[1]; ?></td>
				<td><?php echo $ver[2]; ?></td>
				<td><?php echo $ver[3]; ?></td>
				<td><?php echo $ver[4]; ?></td>
				<td>
          <button type="button" name="button" class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal"
          onclick="agregaform('<?php echo $datos; ?>')" data-target="#modalEdicion">

          </button>
        </td>
				<td>
          <button type="button" name="button" class="btn btn-danger glyphicon glyphicon-remove"
          onclick="preguntaSiNo('<?php echo $ver[0]; ?>')"></button>
        </td>
			</tr>
			<?php
       }
			 ?>
       </tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaDinamicaLoad').DataTable({
      dom: 'Bfrtip',
      buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      language: espanol

    });
  });
</script>
