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
						<input type="text" class="form-control" name="id_articulo" id="id_articulo">
					</div>

					<div class="input-group"><input type="text" class="form-control" disabled></div><!--Datos del Articulo Seleccionado -->

					<div class="input-group">
						<span class="input-group-addon">Cantidad</span>
						<input class="form-control" type="number" name="cantidad_articulo" id="cantidad_articulo" pattern="{0-9}" onpaste="return false" min="1">
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
					$('#id_articulo').val('');
					$('#cantidad_articulo').val('');
					$('#id_sucursal').val('');
					$('#salidas').text("Nuevo");
					$('#tabla_entradas').html(data);
				}
			});
		}

		$('#salidas').click(function(e){
			e.preventDefault();

			var id_a = $('#id_articulo').val();
			var cantidad_a = $('#cantidad_articulo').val();
			var id_s = $('#id_sucursal').val();
			var salidas = $('#salidas').text();

			if (id_a !='' && cantidad_a !='' && id_s !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {id_a:id_a, cantidad_a:cantidad_a, id_s:id_s, salidas:salidas},
					success: function (data) {
						alertify.success(data);
						Recargar();
					}
				});
			}
			else {
				alertify.error("Campos Vacios!");
			}
		});


	});

</script>
</body>
</html>