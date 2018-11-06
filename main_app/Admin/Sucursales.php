<?php include "Header.php"; ?>
<div class="container">
	<div class="panel-group crear">
		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Sucursales</p></div>

			<div class="panel-body">
				<button id="btn-crear" class="btn btn-info">Listar Sucursales</button>

				<form class="form-group" id="form-sucursales" method="post">

					<div class="input-group">
						<span class="input-group-addon"><i>ID</i></span>
						<input type="number" name="id_sucursal" id="id_sucursal" class="form-control" disabled min="1">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>No. Sucursal</i></span>
						<input type="number" name="numero_sucursal" id="numero_sucursal" class="form-control" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Nombre de la Sucursal: </i></span>
						<input type="text" name="nombre_sucursal" id="nombre_sucursal" class="form-control" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Responsable: </i></span>
						<select name="responsable_sucursal" id="responsable_sucursal" class="form-control" required>
							<option value="">Selecciona una Opcion...</option>
							<?php
							require '../Conexion.php';
							$sql = "SELECT id_usuario, nombre_usuario FROM usuarios";

							$consulta = mysqli_query($mysqli, $sql);
							while ($resultado = mysqli_fetch_array($consulta)) {
							    echo '<option value=' . $resultado['id_usuario'] . '>' . $resultado['nombre_usuario'] . '</option>';
							}
							?>
						</select>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Ubicación: </i></span>
						<input type="text" name="ubicacion_sucursal" id="ubicacion_sucursal" class="form-control" placeholder="Ejem. C. 50 X 34 No. 179 Col. Centro" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Referencia: </i></span>
						<input type="text" name="referencia_sucursal" id="referencia_sucursal" class="form-control" placeholder="Ejem. A un costado ADO" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Telefono o Celular: </i></span>
						<input type="tel" name="telefono_sucursal" id="telefono_sucursal" class="form-control" placeholder="10 Digitos" required>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>Descripción: </i></span>
						<input type="text" name="descripcion_sucursal" id="descripcion_sucursal" class="form-control disabled" placeholder="50 Caracteres" required>
					</div>

					<br><button   class="input-group btn btn-success btn-block" id="sucursales"></button>
				</form>
			</div>
		</div>
	</div>

	<div class="panel-group listar">
		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Lista de Sucursales</p></div>
			<div class="panel-body">
				<button id="btn-listar" class="btn btn-info">Crear Sucursales</button>

				<div id="tabla_sucursales" class="table-responsive"></div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {

		Recargar();

			$('#btn-listar').click( function() {
				$('#sucursales').text("Nuevo");
				$('#sucursales').slideDown();
				Recargar();
			});

		function Recargar(){
			var sucursales = "Select";
			var tabla = "sucursales";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {sucursales:sucursales, tabla:tabla},
				success: function (data) {
					$("#numero_sucursal").val('');
					$("#nombre_sucursal").val('');
					$("#responsable_sucursal").val('');
					$('#ubicacion_sucursal').val('');
					$('#referencia_sucursal').val('');
					$('#telefono_sucursal').val('');
					$('#descripcion_sucursal').val('');
					$('#sucursales').text("Nuevo");
					$('#tabla_sucursales').html(data);
				}
			});
		}

		$('#sucursales').click(function(e){
			e.preventDefault();

			var numero_s = $('#numero_sucursal').val();
			var nombre_s = $('#nombre_sucursal').val();
			var responsable_s = $('#responsable_sucursal').val();
			var ubicacion_s = $('#ubicacion_sucursal').val();
			var referencia_s = $('#referencia_sucursal').val();
			var telefono_s = $('#telefono_sucursal').val();
			var descripcion_s = $('#descripcion_sucursal').val();
			var id= $('#id_sucursal').val();
			var sucursales = $('#sucursales').text();

			if (numero_s !='' && nombre_s != '' && responsable_s !='' && ubicacion_s !='' && referencia_s !='' && telefono_s !='' && descripcion_s !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {numero_s:numero_s, nombre_s:nombre_s, responsable_s:responsable_s, ubicacion_s:ubicacion_s, referencia_s:referencia_s, telefono_s:telefono_s, descripcion_s:descripcion_s, id:id, sucursales:sucursales},
					success: function (data) {
						alertify.message(data);
						Recargar();
					}
				});
			}
			else {
				alertify.error("Campos Vacios!"+responsable_s);
			}
		});

		$(document).on('click', '.Actualizar', function(){
			var id = $(this).attr("id");
			var sucursales = "sucursales";

			alertify.confirm("¿Actualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, sucursales:sucursales},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
							$('#sucursales').slideDown();
							$('#sucursales').text("Actualizar");
							$("#id_sucursal").val(id);
							$('#numero_sucursal').val(data.numero_sucursal);
							$('#nombre_sucursal').val(data.nombre_sucursal);
							$('#responsable_sucursal').val(data.responsable_sucursal);
							$('#ubicacion_sucursal').val(data.ubicacion_sucursal);
							$('#referencia_sucursal').val(data.referencia_sucursal);
							$('#telefono_sucursal').val(data.telefono_sucursal);
							$('#descripcion_sucursal').val(data.descripcion_sucursal);
						}
					});
				},

				function(){
					alertify.error("Registro NO Actualizado!");
				});
		});

		$(document).on('click', '.Ver', function(){
			var id = $(this).attr("id");
			var sucursales = "sucursales";


			alertify.confirm("¿Visualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, sucursales:sucursales},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
		 					$('#sucursales').slideUp();
							$("#id_proveedor").val(id);
							$('#rfc_proveedor').val(data.rfc_proveedor);
							$('#empresa_proveedor').val(data.empresa_proveedor);
							$('#representante_proveedor').val(data.representante_proveedor);
							$('#direccion_proveedor').val(data.direccion_proveedor);
							$('#telefono_proveedor').val(data.telefono_proveedor);
							$('#correo_proveedor').val(data.correo_proveedor);
							$('#telefono_proveedor').val(data.telefono_proveedor);
							$('#correo_proveedor').val(data.correo_proveedor);
							$('#cuenta_proveedor').val(data.cuenta_proveedor);
							$('#descripcion_proveedor').val(data.descripcion_proveedor);
						}
			});

				},
				function(){
					alertify.error("Registro NO Actualizado!");

				});

		});

		$(document).on('click', '.Eliminar', function(){
			var id = $(this).attr("id");
			var sucursales = "Eliminar";

			alertify.confirm('¿Eliminar el Registro?',
				function(){

				$.ajax({
					url: 'Crud.php',
					type: 'post',
					data: {id:id, sucursales:sucursales},
					success: function (data) {
						alertify.message(data);
						Recargar();
					}
				});

				},
				function(){
					alertify.error("Registro NO Eliminado!");

				});

		});

	});

</script>
</body>
</html>
