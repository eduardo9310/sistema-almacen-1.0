<?php include "Header.php"; ?>

	<div class="container">
		<div class="panel-group">

			<div class="panel panel-primary crear">

				<div class="panel panel-heading">Registro de Usuarios</div>
				<div class="panel-body">
					<button id="btn-crear" class="btn btn-info">Listar Usuarios</button>

					<form action="Articulos.php" class="form-group">

						<div class="input-group">
							<span class="input-group-addon"><i>ID</i></span>
							<input type="text" id="id_usuario" name="id" class="form-control" placeholder="ID Usuario" disabled="disabled">
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-male"></i></span>
							<input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre Completo" required>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" id="usuario_usuario" name="usuario_usuario" class="form-control" placeholder="Usuario (8-50 Caracteres)" required>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input type="text" id="clave_usuario" name="clave_usuario" class="form-control" placeholder="Contraseña (8-16 Caracteres)" required>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
							<input type="text" id="direccion_usuario" name="direccion_usuario" class="form-control" placeholder="Dirección" required>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<input type="tel" id="telefono_usuario" name="telefono_usuario" class="form-control" placeholder="Telefono (10 Digitos)" required>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" id="correo_usuario" name="correo_usuario" class="form-control" placeholder="Email" required>
						</div>


						<div class="input-group">
							<span class="text-primary">Tipo de Usuario</span>
							<select class="form-control" name="tipo_usuario" id="tipo_usuario">
								<option value="">Seleccione una Opción...</option>
								<option value="Admin">Admin</option>
								<option value="Usuario">Usuario</option>
							</select>
						</div>

						<div class="input-group">
							<span class="text-primary">Estado de Usuario</span>
							<select class="form-control" name="estado_usuario" id="estado_usuario">
								<option value="">Seleccione una Opción...</option>
								<option value="1">Activado</option>
								<option value="0">Descativado</option>
							</select>
						</div><br>
							<button id="usuarios" class="input-group btn btn-success btn-block"></button>
					</form>
				</div>
			</div>

			<div class="panel panel-primary listar">
				<div class="panel panel-heading ">Usuarios Registrados</div>
					<div class="panel-body">
						<button id="btn-listar" class="btn btn-info">Nuevo Usuario</button>
						<div id="tabla_usuarios" class="table-responsive"></div>

				</div>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function() {

		Recargar();

			$('#btn-listar').click( function() {
				$('#usuarios').text("Nuevo");
				$('#usuarios').slideDown();
				Recargar();
			});

		function Recargar(){
			var usuarios = "Select";
			var tabla = "usuarios";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {usuarios:usuarios, tabla:tabla},
				success: function (data) {
					$("#id_usuario").val('');
					$("#nombre_usuario").val('');
					$("#usuario_usuario").val('');
					$("#clave_usuario").val('');
					$('#direccion_usuario').val('');
					$('#telefono_usuario').val('');
					$('#correo_usuario').val('');
					$('#tipo_usuario').val('');
					$('#estado_usuario').val('')
					$('#usuarios').text("Nuevo");
					$('#tabla_usuarios').html(data);
				}
			});
		}

		$('#usuarios').click(function(e){
			e.preventDefault();

			var nombre_u = $('#nombre_usuario').val();
			var usuario_u = $('#usuario_usuario').val();
			var clave_u = $('#clave_usuario').val();
			var direccion_u = $('#direccion_usuario').val();
			var telefono_u = $('#telefono_usuario').val();
			var correo_u = $('#correo_usuario').val();
			var tipo_u = $('#tipo_usuario').val();
			var estado_u = $('#estado_usuario').val();
			var id= $('#id_usuario').val();
			var usuarios = $('#usuarios').text();

			if (nombre_u !='' && usuario_u != '' && clave_u !='' && direccion_u !='' && telefono_u !='' && correo_u !='' && tipo_u !='' && estado_u !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {nombre_u:nombre_u, usuario_u:usuario_u, clave_u:clave_u, direccion_u:direccion_u, telefono_u:telefono_u, correo_u:correo_u, tipo_u:tipo_u, estado_u:estado_u, id:id, usuarios:usuarios},
					success: function (data) {;
						alertify.success(data);
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
			var usuarios = "usuarios";

			alertify.confirm("¿Actualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, usuarios:usuarios},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
							$('#usuarios').slideDown();
							$('#usuarios').text("Actualizar");
							$('#id_usuario').val(id);
							$('#nombre_usuario').val(data.nombre_usuario);
							$('#usuario_usuario').val(data.usuario_usuario);
							$('#clave_usuario').val(data.clave_usuario);
							$('#direccion_usuario').val(data.direccion_usuario);
							$('#telefono_usuario').val(data.telefono_usuario);
							$('#correo_usuario').val(data.correo_usuario);
							$('#tipo_usuario').val(data.tipo_usuario);
							$('#estado_usuario').val(data.estado_usuario);
						}
					});
				},

				function(){
					alertify.error("Registro NO Actualizado!");
				});
		});

		$(document).on('click', '.Ver', function(){
			var id = $(this).attr("id");
			var usuarios = "usuarios";


			alertify.confirm("¿Visualizar el Registro?",
				function(){
					$.ajax({
						url: 'Select.php',
						type: 'POST',
						data: {id:id, usuarios:usuarios},
						dataType: 'json',
						success: function (data) {
							$('.listar').slideUp();
							$('.crear').slideDown();
		 					$('#usuarios').slideUp();
							$('#id_usuario').val(id);
							$('#nombre_usuario').val(data.nombre_usuario);
							$('#usuario_usuario').val(data.usuario_usuario);
							$('#clave_usuario').val(data.clave_usuario);
							$('#direccion_usuario').val(data.direccion_usuario);
							$('#telefono_usuario').val(data.telefono_usuario);
							$('#correo_usuario').val(data.correo_usuario);
							$('#tipo_usuario').val(data.tipo_usuario);
							$('#estado_usuario').val(data.estado_usuario);
						}
			});

				},
				function(){
					alertify.error("Registro NO Actualizado!");

				});

		});

		$(document).on('click', '.Eliminar', function(){
			var id = $(this).attr("id");
			var usuarios = "Eliminar";

			alertify.confirm('¿Eliminar el Registro?',
				function(){

				$.ajax({
					url: 'Crud.php',
					type: 'post',
					data: {id:id, usuarios:usuarios},
					success: function (data) {
						alertify.success(data);
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
