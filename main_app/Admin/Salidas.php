<?php include "Header.php"?>

<div class="container">

	<div class="panel-group crear">

		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Salida de Artículos</p></div>
			<div class="panel-body">
			<button id="btn-crear" class="btn btn-info">Ver Movimientos</button>

			<!-- <button class="btn btn-primary btn-block" id="Cliente">Cliente</button> -->
			<!-- <button class="btn btn-primary btn-block" id="Sucursal">Sucursal</button> -->


				<form class="form-group">

					<div class="input-group">
						<span class="input-group-addon" >ID</span>
						<input class="form-control" type="text" disabled>
					</div>

					<!-- Datos del Articulo a Seleccionar -->
	
					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Artículo</p></div>

					<div class="input-group">
						<span class="input-group-addon">Clave</span>
						<input type="text" class="form-control" name="clave_articulo_salida" id="clave_articulo_salida">
					</div>

					<div class="input-group"><input type="text" name="datos_articulo" id="datos_articulo" class="form-control" disabled></div><!--Datos del Articulo Seleccionado -->

					<div class="input-group">
						<span class="input-group-addon">Cantidad</span>
						<input class="form-control" type="number" name="cantidad_articulo_salida" id="cantidad_articulo_salida" pattern="{0-9}" onpaste="return false" min="1">
					</div>




						<div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Sucursal</p></div>

						<div class="input-group">

							<span class="input-group-addon"><i>Sucursal: </i></span>
							<select id="id_sucursal" name="id_sucursal" class="form-control">
								<option value="">Selecciona una opcion...</option>
								<?php
								require '../Conexion.php';
								$sql = "SELECT* FROM sucursales";

								$consulta = mysqli_query($mysqli, $sql);
								while ($resultado = mysqli_fetch_array($consulta)) {
									echo '<option value=' . $resultado['id_sucursal'] . '>' . $resultado['nombre_sucursal'] . '</option>';
								}
								?>
							</select>
						</div>

						<a href="Proveedores.php" class="input-group btn btn-info btn-block">Agregar Nuevo</a>
<!-- 
					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Usuario</p></div>

					<div class="input-group">
						<span class="input-group-addon">Usuario</span>
						<input type="text" class="form-control hidden" value="<?=$usuario=$_SESSION['usuario']['id_usuario'];?>" disabled>
						<input type="text" class="form-control" value="<?=$usuario=$_SESSION['usuario']['nombre_usuario'];?>" disabled>
					</div> -->

					<br><button id="salidas" class="input-group btn btn-success btn-block"></button>

				</form>	

			</div>
		</div> 
	</div>
		<div class="panel-group listar">
		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Entradas</p></div>

			<div class="panel-body">
				<button id="btn-listar" class="btn btn-info">Agregar Entrada</button>
				<div id="tabla_entradas" class="table-responsive"></div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {

		Recargar();

			$('#btn-listar').click( function() {
				$('#salidas').text("Nuevo");
				$('#datos_articulo').val('dsfd');
				$('#salidas').slideDown();

				Recargar();
			});

		function Recargar(){
			var salidas = "Select";
			var tabla = "salidas";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {salidas:salidas, tabla:tabla},
				success: function (data) {
					$("#id_salida").val('');
					$('#clave_articulo_salida').val('');
					$('#cantidad_articulo_salida').val('');
					$('#id_sucursal').val('');
					$('#salidas').text("Nuevo");
					$('#tabla_entradas').html(data);
				}
			});
		}

		$('#salidas').click(function(e){
			e.preventDefault();

			var clave_a = $('#clave_articulo_salida').val();
			var cantidad_a = $('#cantidad_articulo_salida').val();
			var id_suc = $('#id_sucursal').val();
			var salidas = $('#salidas').text();

			if (clave_a !='' && cantidad_a !='' && id_suc !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {clave_a:clave_a, cantidad_a:cantidad_a, id_suc:id_suc, salidas:salidas},
					success: function (data) {
						alertify.warning(data);
						Recargar();
					}
				});
			}
			else {
				alertify.error("Campos Vacios!");
			}
		});
		$(document).on('click', '.Eliminar', function(){
			var id = $(this).attr("id");
			var salidas = "Eliminar";

			alertify.confirm('¿Eliminar el Registro?',
				function(){

				$.ajax({
					url: 'Crud.php',
					type: 'post',
					data: {id:id, salidas:salidas},
					success: function (data) {
						alertify.warning(data);
						Recargar();
					}
				});

				},
				function(){
					alertify.error("NO Eliminado!");

				});
		});

	});

</script>

</body>
</html>