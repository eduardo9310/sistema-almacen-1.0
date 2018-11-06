<?php include "Header.php"; ?>

	<div class="container">
		<div class="panel-group crear">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Registro de Categorias</p></div>
				<div class="panel-body">
					<button id="btn-crear" class="btn btn-info">Listar Categoria</button>

					<form class="form-group" method="POST" id="form-crear">

						<div class="input-group">
							<span class="input-group-addon"><i>ID:</i></span>
							<input type="text" class="form-control" name="id" id="id_categoria" disabled>
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i>Nombre de la categoria:</i></span>
							<input type="text" class="form-control" name="nombre_categoria" id="nombre_categoria">
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i>Departamento:</i></span>
							<input type="text" class="form-control" name="departamento_categoria" id="departamento_categoria">
						</div>

						<div class="input-group">
							<span class="input-group-addon"><i>Descripción:</i></span>
							<input type="text" class="form-control" name="descripcion_categoria" id="descripcion_categoria">
						</div>
						<br><button type="button" id="Opcion" class="input-group btn btn-success btn-block"></button>
					</form>
				</div>
			</div>
		</div>

		<div class="panel-group listar">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Lista de Categorias</p></div>
				<br><button id="btn-listar" class="btn btn-info">Nueva Categoria</button>
				<div id="tabla_categorias" class="table-responsive"></div>

				<div class="panel-body">

				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {

			Recargar();

			$('#btn-listar').click( function() {
				$('#Opcion').text("Nuevo");
				$('#Opcion').slideDown();
				Recargar();
			});

			function Recargar(){
				var Opcion = "Select";
				var tabla = "categorias";

				$.ajax({
					url: 'dataTable.php',
					type: 'POST',
					data: {Opcion:Opcion, tabla:tabla},
					success: function (data) {
						$("#id_categoria").val('');
						$("#nombre_categoria").val('');
						$("#departamento_categoria").val('');
						$("#descripcion_categoria").val('');
						$('#Opcion').text("Nuevo");
						$('#tabla_categorias').html(data);
					}
				});
			}


			$('#Opcion').click(function(){

				var nombre_c = $('#nombre_categoria').val();
				var departamento_c = $('#departamento_categoria').val();
				var descripcion_c = $('#descripcion_categoria').val();
				var id= $('#id_categoria').val();
				var Opcion=  $('#Opcion').text();

				if (nombre_c !='' && departamento_c != '' && descripcion_c !='') {

					$.ajax({
						url: 'Crud.php',
						type: 'POST',
						data: {nombre_c:nombre_c, departamento_c:departamento_c, descripcion_c:descripcion_c, id:id, Opcion:Opcion},
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
				var categorias = "categorias";


				alertify.confirm("¿Actualizar el Registro?",
					function(){
				$.ajax({
					url: 'Select.php',
					type: 'POST',
					data: {id:id, categorias:categorias},
					dataType: 'json',
					success: function (data) {
						$('.listar').slideUp();
						$('.crear').slideDown();
						$('#Opcion').slideDown();
						$('#Opcion').text("Actualizar");
						$("#id_categoria").val(id);
						$('#nombre_categoria').val(data.nombre_categoria);
						$('#departamento_categoria').val(data.departamento_categoria);
						$('#descripcion_categoria').val(data.descripcion_categoria);
					}
				});

					},
					function(){
					alertify.error("Operación Cancelada");

					});

			});

			$(document).on('click', '.Ver', function(){
				var id = $(this).attr("id");
				var categorias = "categorias";


				alertify.confirm("¿Visualizar el Registro?",
					function(){
				$.ajax({
					url: 'Select.php',
					type: 'POST',
					data: {id:id, categorias:categorias},
					dataType: 'json',
					success: function (data) {
						$('.listar').slideUp();
						$('.crear').slideDown();
	 					$('#Opcion').slideUp();
						$("#id_categoria").val(id);
						$('#nombre_categoria').val(data.nombre_categoria);
						$('#departamento_categoria').val(data.departamento_categoria);
						$('#descripcion_categoria').val(data.descripcion_categoria);
					}
				});

					},
					function(){
					alertify.error("Operación Cancelada");

					});

			});

			$(document).on('click', '.Eliminar', function(){
				var id = $(this).attr("id");
				var Opcion = "Eliminar";

				alertify.confirm('¿Eliminar el Registro?',
					function(){

					$.ajax({
						url: 'Crud.php',
						type: 'post',
						data: {id:id, Opcion:Opcion},
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
