<?php include "Header.php"; ?>

<div class="container">
	<div class="panel-group crear">
		<div class="panel panel-primary">
			<div class="panel panel-heading"><p class="text-center text-white text-uppercase">Entradas de Artículos</p></div>
			<div class="panel-body">
			<button id="btn-crear" class="btn btn-info">Ver Movimientos</button>	
				<form class="form-group">
					<br><div class="input-group btn-block"><p class="text-center text-success text-uppercase">Datos Artículo</p></div>

					<div class="input-group">
						<span class="input-group-addon">Clave</span>
						<input type="text" id="clave_articulo" name="clave_articulo" class="form-control">
					</div>

					<!-- <div class="input-group"><input type="text" class="form-control" disabled></div> -->

					<div class="input-group">
						<span class="input-group-addon">Cantidad</span>
						<input class="form-control" type="number" id="cantidad_articulo" name="cantidad_articulo" pattern="{0-9}" onpaste="return false">
					</div>

					<br><button   class="input-group btn btn-success btn-block" id="entradas"></button>

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
				$('#entradas').text("Nuevo");
				$('#entradas').slideDown();
				Recargar();
			});

		function Recargar(){
			var entradas = "Select";
			var tabla = "entradas";

			$.ajax({
				url: 'dataTable.php',
				type: 'POST',
				data: {entradas:entradas, tabla:tabla},
				success: function (data) {
					$("#clave_articulo").val('');
					$('#cantidad_articulo').val('');
					$('#entradas').text("Nuevo");
					$('#tabla_entradas').html(data);
				}
			});
		}

		$('#entradas').click(function(e){
			e.preventDefault();

			var clave_a = $('#clave_articulo').val();
			var cantidad_a = $('#cantidad_articulo').val();
			var entradas = $('#entradas').text();

			if (clave_a !='' && cantidad_a !='') {

				$.ajax({
					url: 'Crud.php',
					type: 'POST',
					data: {clave_a:clave_a, cantidad_a:cantidad_a, entradas:entradas},
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