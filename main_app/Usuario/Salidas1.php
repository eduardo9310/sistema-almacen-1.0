<?php include "Header.php"?>

<div class="container">

	<div class="panel-group crear">

		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Salida de Artículos</p></div>
			<div class="panel-body">
			<button id="btn-crear" class="btn btn-info">Ver Movimientos</button>

			<button class="btn btn-primary btn-block" id="Cliente">Cliente</button>
			<button class="btn btn-primary btn-block" id="Sucursal">Sucursal</button>


				<form class="form-group Sucursal">

					<div class="input-group hidden">
						<span class="input-group-addon">ID</span>
						<input class="form-control" type="text">
					</div>

					<!-- Datos del Articulo a Seleccionar -->
	
					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Artículo</p></div>

					<div class="input-group">
						<span class="input-group-addon">Clave</span>
						<input type="text" class="form-control">
					</div>

					<div class="input-group"><input type="text" class="form-control" disabled></div><!--Datos del Articulo Seleccionado -->

					<div class="input-group">
						<span class="input-group-addon">Cantidad</span>
						<input class="form-control" type="number" pattern="{0-9}" onpaste="return false" min="1">
					</div>




						<div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Sucursal</p></div>

						<div class="input-group">

							<span class="input-group-addon"><i>Sucursal: </i></span>
							<select id="" class="form-control">
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

					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Usuario</p></div>

					<div class="input-group">
						<span class="input-group-addon">Usuario</span>
						<input type="text" class="form-control hidden" value="<?=$usuario=$_SESSION['usuario']['id_usuario'];?>" disabled>
						<input type="text" class="form-control" value="<?=$usuario=$_SESSION['usuario']['nombre_usuario'];?>" disabled>
					</div>

					<br><button class="input-group btn btn-success btn-block">Enviar Datos</button>

				</form>	
	
				<form class="form-group Cliente ">

					<div class="input-group hidden">
						<span class="input-group-addon">ID</span>
						<input class="form-control" type="text">
					</div>

					<!-- Datos del Articulo a Seleccionar -->
	
					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Artículo</p></div>

					<div class="input-group">
						<span class="input-group-addon">Clave</span>
						<input type="text" class="form-control">
					</div>

					<div class="input-group"><input type="text" class="form-control" disabled></div><!--Datos del Articulo Seleccionado -->

					<div class="input-group">
						<span class="input-group-addon">Cantidad</span>
						<input class="form-control" type="number" pattern="{0-9}" onpaste="return false" min="1">
					</div>


					<div id="Cliente_2">

						<div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Cliente</p></div>

						<div class="input-group">

							<span class="input-group-addon"><i>Categoria: </i></span>
							<select id="" class="form-control">
								<option value="">Selecciona una opcion...</option>
								<?php
								require '../Conexion.php';
								$sql = "SELECT empresa_proveedor FROM proveedores";

								$consulta = mysqli_query($mysqli, $sql);
								while ($resultado = mysqli_fetch_array($consulta)) {
									echo '<option value=' . $resultado['id_proveedor'] . '>' . $resultado['empresa_proveedor'] . '</option>';
								}
								?>
							</select>
						</div>

						<a href="Proveedores.php" class="input-group btn btn-info btn-block">Agregar Nuevo</a>
					</div>

					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Usuario</p></div>

					<div class="input-group">
						<span class="input-group-addon">Usuario</span>
						<input type="text" class="form-control hidden" value="<?=$usuario=$_SESSION['usuario']['id_usuario'];?>" disabled>
						<input type="text" class="form-control" value="<?=$usuario=$_SESSION['usuario']['nombre_usuario'];?>" disabled>
					</div>
					<button class="input-group btn btn-success btn-block">Enviar Datos</button>
				</form>	

			</div>
		</div> 
	</div>
</div>

<script>
	$(document).ready( function() {
		$('.Sucursal').slideUp();
		$('.Cliente').slideUp();


		$('#Sucursal').click( function() {
			$('.Cliente').slideUp();
			$('.Sucursal').slideDown();
			$('input').val('');
		});

		$('#Cliente').click( function(){
			$('.Sucursal').slideUp();
			$('.Cliente').slideDown();
			$('input').val('');

		});

	});
</script>