<?php include "Header.php"?>

<div class="container">
	<div class="panel-group crear">
		<div class="panel panel-primary">
				<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Proveedores</p></div>
			<div class="panel-body">
				<button id="btn-crear" class="btn btn-info">Listar Proveedores</button>

				<form class="form-group" method="POST">

					<div class="input-group">
						<span class="input-group-addon"><i>ID:</i></span>
						<input type="text" name="id" id="id_proveedor" class="form-control" placeholder="No Editable" disabled="disabled">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>RFC:</i></span>
						<input type="text" name="rfc_proveedor" id="rfc_proveedor" class="form-control" placeholder="16 DIGITOS">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>EMPRESA:</i></span>
						<input type="text" name="empresa_proveedor" id="empresa_proveedor"  class="form-control" placeholder="NOMBRE DE LA EMPRESA">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>REPRESENTANTE</i></span>
						<input type="text" name="representante_proveedor" id="representante_proveedor"  class="form-control" placeholder="NOMBRE PERSONA FISICA">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i">DIRECCIÓN:</i></span>
						<input type="text" name="direccion_proveedor" id="direccion_proveedor"  class="form-control" placeholder="DIRECCION DE LA EMPRESA">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i">TELEFONO</i></span>
						<input type="text" name="telefono_proveedor" id="telefono_proveedor"  class="form-control" placeholder="10 DIGITOS">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>CORREO</i></span>
						<input type="text" name="correo_proveedor" id="correo_proveedor"  class="form-control" placeholder="EJEMPLO@GMAIL.COM">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>NO. CUENTA</i></span>
						<input type="text" name="cuenta_proveedor" id="cuenta_proveedor"  class="form-control" placeholder="16 DIGITOS(929283716234123)">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i>DESCRIPCIÓN</i></span>
						<input type="text" name="descripcion_proveedor" id="descripcion_proveedor"  class="form-control" placeholder="DESCRIPCIÓN BREVE">
					</div>

					<br><button id="proveedores" class="input-group btn btn-success btn-block"></button>
				</form>
			</div>
		</div>
	</div>

	<div class="panel-group">

		<div class="panel panel-primary listar">
				<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Proveedores Registrados</p></div>
			<div class="panel-body">
				<button id="btn-listar" class="btn btn-info">Nuevo Proveedor</button>

				<div id="tabla_proveedores" class="table-responsive"></div>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {

		Recargar();

			$('#btn-listar').click( function() {
				$('#proveedores').text("Nuevo");
				$('#proveedores').slideDown();
				Recargar();
			});

		function Recargar(){
			var proveedores = "Select";
			var tabla = "proveedores";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {proveedores:proveedores, tabla:tabla},
				success: function (data) {
					$("#rfc_proveedor").val('');
					$("#empresa_proveedor").val('');
					$("#representante_proveedor").val('');
					$('#telefono_proveedor').val('');
					$('#correo_proveedor').val('');
					$('#cuenta_proveedor').val('');
					$('#descripcion_proveedor').val('');
					$('#direccion_proveedor').val('');
					$('#proveedores').text("Nuevo");
					$('#tabla_proveedores').html(data);
				}
			});
		}

		$('#proveedores').click(function(e){
			e.preventDefault();

			var rfc_p = $('#rfc_proveedor').val();
			var empresa_p = $('#empresa_proveedor').val();
			var representante_p = $('#representante_proveedor').val();
			var direccion_p = $('#direccion_proveedor').val();
			var telefono_p = $('#telefono_proveedor').val();
			var correo_p = $('#correo_proveedor').val();
			var cuenta_p = $('#cuenta_proveedor').val();
			var descripcion_p = $('#descripcion_proveedor').val();
			var id= $('#id_proveedor').val();
			var proveedores = $('#proveedores').text();

			if (rfc_p !='' && empresa_p != '' && representante_p !='' && direccion_p !='' && telefono_p !='' && correo_p !='' && cuenta_p !='' && descripcion_p !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {rfc_p:rfc_p, empresa_p:empresa_p, representante_p:representante_p, direccion_p:direccion_p, telefono_p:telefono_p, correo_p:correo_p, cuenta_p:cuenta_p, descripcion_p:descripcion_p, id:id, proveedores:proveedores},
					success: function (data) {
						alertify.message(data);
						Recargar();
					}
				});
			}
			else {
				alertify.error("Campos Vacios!");
			}
		});

		$(document).on('click', '.Actualizar', function(){
			var id = $(this).attr("id");
			var proveedores = "proveedores";

			alertify.confirm("¿Actualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, proveedores:proveedores},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
							$('#proveedores').slideDown();
							$('#proveedores').text("Actualizar");
							$("#id_proveedor").val(id);
							$('#rfc_proveedor').val(data.rfc_proveedor);
							$('#empresa_proveedor').val(data.empresa_proveedor);
							$('#representante_proveedor').val(data.representante_proveedor);
							$('#direccion_proveedor').val(data.direccion_proveedor);
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

		$(document).on('click', '.Ver', function(){
			var id = $(this).attr("id");
			var proveedores = "proveedores";


			alertify.confirm("¿Visualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, proveedores:proveedores},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
		 					$('#proveedores').slideUp();
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
					alertify.error("Operación Cancelada");

				});

		});

		$(document).on('click', '.Eliminar', function(){
			var id = $(this).attr("id");
			var proveedores = "Eliminar";

			alertify.confirm('¿Eliminar el Registro?',
				function(){

				$.ajax({
					url: 'Crud.php',
					type: 'post',
					data: {id:id, proveedores:proveedores},
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
