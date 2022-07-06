<?php
session_start();
require_once '../loader.php';
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
        $consultag = new ConsultaGenerica('alumnos');
        $valor=$consultag->listar($conexion);
        foreach ($valor as $key => $ver){
          $data=array('id'=>$ver['id'],'nombre'=>$ver['nombre'],'apellido'=>$ver['apellido'],'email'=>$ver['email'],'edad'=>$ver['edad']);
          $datos=json_encode($data);
         ?>
        <tr>
				<td><?php echo htmlspecialchars($ver['nombre'], ENT_QUOTES, UTF8); ?></td>
				<td><?php echo htmlspecialchars($ver['apellido'], ENT_QUOTES, UTF8); ?></td>
				<td><?php echo htmlspecialchars($ver['email'], ENT_QUOTES, UTF8); ?></td>
				<td><?php echo htmlspecialchars($ver['edad'], ENT_QUOTES, UTF8); ?></td>

				<td>
          <button  type="button" name="button" class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal"
          onclick='agregaform(<?php echo $datos ?>)' data-target="#modalEdicion">
          </button>

        </td>
				<td>
          <button type="button" name="button" class="btn btn-danger glyphicon glyphicon-remove"
          onclick="preguntaSiNo('<?php echo $ver['id']; ?>')"></button>
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
