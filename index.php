<?php
session_start();
unset($_SESSION['consulta']);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Tabla dinamica</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
  <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap.min.css">


	<script src="librerias/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
  <script src="librerias/datatable/jquery.dataTables.min.js"></script>
  <script src="librerias/datatable/dataTables.bootstrap.min.js"></script>
  <script src="librerias/lenguage/lenguage.js"></script>
  <script src="librerias/datatable/buttons/dataTables.buttons.min.js"></script>
  <script src="librerias/datatable/buttons/jszip.min.js"></script>
  <script src="librerias/datatable/buttons/pdfmake.min.js"></script>
  <script src="librerias/datatable/buttons/vfs_fonts.js"></script>
  <script src="librerias/datatable/buttons/buttons.html5.min.js"></script>

  </head>
  <body>
<div class="container">
  <div class="" id="buscador"></div>
  <div class="" id="tabla"></div>
</div>
<!-- Modal para registros nuevos -->

<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agrega nuevo alumno</h4>
      </div>
      <div class="modal-body">
        	<label>Nombre</label>
        	<input type="text" name="" id="nombre" class="form-control input-sm">
        	<label>Apellido</label>
        	<input type="text" name="" id="apellido" class="form-control input-sm">
        	<label>Email</label>
        	<input type="text" name="" id="email" class="form-control input-sm">
        	<label>Edad</label>
        	<input type="text" name="" id="edad" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para edicion de datos -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar alumno</h4>
      </div>
      <div class="modal-body">
          <input type="text" hidden="" id="idpersona" name="">
        	<label>Nombre</label>
        	<input type="text" name="" id="nombreu" class="form-control input-sm">
        	<label>Apellido</label>
        	<input type="text" name="" id="apellidou" class="form-control input-sm">
        	<label>Email</label>
        	<input type="text" name="" id="emailu" class="form-control input-sm">
        	<label>Edad</label>
        	<input type="text" name="" id="edadu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal"
         id="actualizadatos">
        Actualizar
        </button>

      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#tabla').load('componentes/tabla.php');
    //$('#buscador').load('componentes/buscador.php');

  });
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#guardarnuevo').click(function(){
    nombre=$('#nombre').val();
    apellido=$('#apellido').val();
    email=$('#email').val();
    edad=$('#edad').val();
    agregardatos(nombre,apellido,email,edad);
  });
  $('#actualizadatos').click(function(){
    actualizaDatos();
  });
});
</script>
  </body>
</html>
