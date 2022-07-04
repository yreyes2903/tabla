<?php
	require_once "../loader.php";
	$valor=$consulta->listar($conexion);

 ?>
<br><br>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php

				foreach ($valor as $key => $ver):
				$cadena=$ver['nombre']."-".$ver['apellido'];
			 ?>
				<option value="<?php echo htmlspecialchars($ver['id'], ENT_QUOTES, UTF8); ?>">

					<?php echo htmlspecialchars($cadena, ENT_QUOTES, UTF8); ?>
				</option>

			<?php endforeach; ?>

		</select>
	</div>
</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('componentes/tabla.php');
					}
				});
			});
		});
	</script>
