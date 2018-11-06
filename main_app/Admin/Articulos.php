<?php include "Header.php"; ?>

<div class="container">
	<div class="panel-group crear">
		<div class="panel panel-primary">

			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Articulos</p></div>

			<div class="panel-body">
				<button id="btn-crear" class="input-group btn btn-info">Listar Articulos</button>
				<form action="Articulos.php" class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i>ID</i></span>
						<input type="number" name="id_articulo" id="id_articulo" class="form-control" disabled min="1">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Clave: </i></span>
						<input type="text" id="clave_articulo" name="clave_articulo" class="form-control" placeholder="Clave" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Descripción: </i></span>
						<input type="text" id="descripcion_articulo" name="descripcion_articulo" class="form-control" placeholder="Descripción" required>
					</div>

					<div class="input-group">

						<span class="input-group-addon"><i>Categoria: </i></span>
						<select name="categoria_articulo" id="categoria_articulo" class="form-control">
							<option value="">Selecciona una opcion...</option>
							<?php
							require '../Conexion.php';
							$sql = "SELECT nombre_categoria, id_categoria FROM categorias";

							$consulta = mysqli_query($mysqli, $sql);
							while ($resultado = mysqli_fetch_array($consulta)) {
								echo '<option value=' . $resultado['id_categoria'] . '>' . $resultado['nombre_categoria'] . '</option>';
							}
							?>
						</select>
						<span class="input-group-addon"><i><a href="Categorias.php" class="text-info badge-danger">Nuevo</a></i></span>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Inventario</i></span>
						<input type="number" id="invmin_articulo" name="invmin_articulo" class="form-control" placeholder="Inventario MINIMO" required pattern="[0-9]" min="1">
						<input type="number" id="invmax_articulo" name="invmax_articulo" class="form-control" placeholder="Inventario MAXIMO" required pattern="[0-9]" min="1">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Precio Compra: </i></span>
						<input type="text" id="compra_articulo" name="compra_articulo" class="form-control" placeholder="Ejem: 150.50" required>
						<span class="input-group-addon"><i>Pesos</i></span>
					</div>


					<div class="input-group">
						<span class="input-group-addon"><i>Margen de Utilidad: </i></span>
						<input type="number" id="utilidad_articulo" name="utilidad_articulo" class="form-control" min="1" max="100">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Precio Venta:</i></span>
						<input type="text" id="venta_articulo" name="venta_articulo" class="form-control" placeholder="Precio Compra + Margen Utilidad" disabled>
					</div>


					<div class="input-group">
						<span class="input-group-addon"><i>Cantidad:</i></span>
						<input type="number" id="cantidad_articulo" name="cantidad_articulo" class="form-control" min="1">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Proveedor: </i></span>
						<select name="proveedor_articulo" id="proveedor_articulo" class="form-control">
							<option value="Default">Seleccione una opción...</option>
							<?php
							require '../Conexion.php';
							$sql = "SELECT id_proveedor, empresa_proveedor FROM proveedores";

							$consulta = mysqli_query($mysqli, $sql);
							while ($resultado = mysqli_fetch_array($consulta)) {
								echo '<option value=' . $resultado['id_proveedor'] . '>' . $resultado['empresa_proveedor'] . '</option>';
							}
							?>
						</select>
						<span class="input-group-addon"><i><a href="Proveedores.php" class="text-info badge-danger">Nuevo</a></i></span>
					</div>

					<br><button   class="input-group btn btn-success btn-block" id="articulos"></button>

				</form>
			</div>
		</div>
	</div>

	<div class="panel-group listar">
		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Articulos</p></div>

			<div class="panel-body">
				<button id="btn-listar" class="btn btn-info">Crear Articulo</button>
				<div id="tabla_articulos" class="table-responsive"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		Recargar();

			$('#btn-listar').click( function() {
				$('#articulos').text("Nuevo");
				$('#articulos').slideDown();
				Recargar();
			});

		function Recargar(){
			var articulos = "Select";
			var tabla = "articulos";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {articulos:articulos, tabla:tabla},
				success: function (data) {
					$("#clave_articulo").val('');
					$("#descripcion_articulo").val('');
					$("#categoria_articulo").val('');
					$("#invmin_articulo").val('');
					$('#invmax_articulo').val('');
					$('#compra_articulo').val('');
					$('#utilidad_articulo').val('');
					$('#venta_articulo').val('');
					$('#cantidad_articulo').val('');
					$('#proveedor_articulo').val('');
					$('#articulos').text("Nuevo");
					$('#tabla_articulos').html(data);
				}
			});
		}

		$('#articulos').click(function(e){
			e.preventDefault();

			var clave_a = $('#clave_articulo').val();
			var descripcion_a = $('#descripcion_articulo').val();
			var invmin_a = $('#invmin_articulo').val();
			var invmax_a = $('#invmax_articulo').val();
			var compra_a = $('#compra_articulo').val();
			var utilidad_a = $('#utilidad_articulo').val();
			var cantidad_a = $('#cantidad_articulo').val();
			var proveedor_a = $('#proveedor_articulo').val();
			var categoria_a = $('#categoria_articulo').val();
			var id= $('#id_articulo').val();
			var articulos = $('#articulos').text();

			if (clave_a !='' && descripcion_a != '' && categoria_a !='' && invmin_a !='' && invmax_a !='' && compra_a !='' && utilidad_a !='' && cantidad_a !='' && proveedor_a !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {clave_a:clave_a, descripcion_a:descripcion_a, invmin_a:invmin_a, invmax_a:invmax_a, compra_a:compra_a, utilidad_a:utilidad_a, cantidad_a:cantidad_a, categoria_a:categoria_a, proveedor_a:proveedor_a, id:id, articulos:articulos},
					success: function (data) {
						alertify.message(data);
						Recargar();
					}
				});
			}
			else {
				alertify.warning("Campos Vacios!");
			}
		});

		$(document).on('click', '.Actualizar', function(){
			var id = $(this).attr("id");
			var articulos = "articulos";

			alertify.confirm("¿Actualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, articulos:articulos},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
							$('#articulos').slideDown();
							$('#articulos').text("Actualizar");
							$("#id_articulo").val(id);
							$('#clave_articulo').val(data.clave_articulo);
							$('#descripcion_articulo').val(data.descripcion_articulo);
							$('#invmin_articulo').val(data.invmin_articulo);
							$('#invmax_articulo').val(data.invmax_articulo);
							$('#compra_articulo').val(data.compra_articulo);
							$('#utilidad_articulo').val(data.utilidad_articulo);
							$('#venta_articulo').val(data.venta_articulo);
							$('#cantidad_articulo').val(data.cantidad_articulo);
						}
					});
				},

				function(){
					alertify.error("Operación Cancelada");
				});
		});

		$(document).on('click', '.Ver', function(){
			var id = $(this).attr("id");
			var articulos = "articulos";


			alertify.confirm("¿Visualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, articulos:articulos},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
		 					$('#articulos').slideUp();
		 					$("#id_articulo").val(id);
							$('#clave_articulo').val(data.clave_articulo);
							$('#descripcion_articulo').val(data.descripcion_articulo);
							$('#invmin_articulo').val(data.invmin_articulo);
							$('#invmax_articulo').val(data.invmax_articulo);
							$('#compra_articulo').val(data.compra_articulo);
							$('#utilidad_articulo').val(data.utilidad_articulo);
							$('#venta_articulo').val(data.venta_articulo);
							$('#cantidad_articulo').val(data.cantidad_articulo);
						}
			});

				},
				function(){
					alertify.error("Operación Cancelada");
				});
		});

		$(document).on('click', '.Eliminar', function(){
			var id = $(this).attr("id");
			var articulos = "Eliminar";

			alertify.confirm('¿Eliminar el Registro?',
				function(){

				$.ajax({
					url: 'Crud.php',
					type: 'post',
					data: {id:id, articulos:articulos},
					success: function (data) {
						alertify.message(data);
						Recargar();
					}
				});

				},
				function(){
					alertify.error("Operación Cancelada");

				});

		});

	});

</script>
</body>
</html>