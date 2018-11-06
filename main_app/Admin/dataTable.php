<?php require '../Conexion.php'; ?>


<?php if ($_POST["tabla"]=="categorias"): ?>
	
<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Categoria</td>
			<td>Departamento</td>
			<td>Descripción</td>
			<td>Opciones</td>

		</tr>
	</thead>
			<?php 

			$consulta = mysqli_query($mysqli, "SELECT* FROM categorias");
			while ($resultado = mysqli_fetch_array($consulta)) {
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_categoria"].'</td>
			<td>'.$resultado["nombre_categoria"].'</td>
			<td>'.$resultado["departamento_categoria"].'</td>
			<td>'.$resultado["descripcion_categoria"].'</td>

			<td width=100px>
			<button type="button" name="Ver" id="'.$resultado["id_categoria"].'" class="Ver btn btn-info btn-xs">
			<span class="fa fa-eye"></span></button>
	
			<button type="button" name="Actualizar" id="'.$resultado["id_categoria"].'" class="Actualizar btn btn-success btn-xs">
			<span class="fa fa-edit"></span></button> 

			<button type="button" name="Eliminar" id="'.$resultado["id_categoria"].'" class="Eliminar btn btn-danger btn-xs">
			<span class="fa fa-trash"></span></button>
			</td>
		</tr>
			';
			}
			?>	
</table>


<?php endif ?>


<?php if($_POST["tabla"]=="proveedores"): ?>
	
<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>RFC</td>
			<td>Empresa</td>
			<td>Representante</td>
			<td>Dirección</td>
			<td>Telefono</td>
			<td>Correo</td>
			<td>NO. Cuenta</td>
			<td>Descripción</td>
			<td>Opciones</td>

		</tr>
	</thead>
			<?php 

			$consulta = mysqli_query($mysqli, "SELECT* FROM proveedores");
			while ($resultado = mysqli_fetch_array($consulta)) {
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_proveedor"].'</td>
			<td>'.$resultado["rfc_proveedor"].'</td>
			<td>'.$resultado["empresa_proveedor"].'</td>
			<td>'.$resultado["representante_proveedor"].'</td>
			<td>'.$resultado["direccion_proveedor"].'</td>
			<td>'.$resultado["telefono_proveedor"].'</td>
			<td>'.$resultado["correo_proveedor"].'</td>
			<td>'.$resultado["cuenta_proveedor"].'</td>
			<td>'.$resultado["descripcion_proveedor"].'</td>

			<td width=100px>

				<button type="button" name="Ver" id="'.$resultado["id_proveedor"].'" class="Ver btn btn-info btn-xs">
				<span class="fa fa-eye"></span></button>
		
				<button type="button" name="Actualizar" id="'.$resultado["id_proveedor"].'" class="Actualizar btn btn-success btn-xs">
				<span class="fa fa-edit"></span></button> 

				<button type="button" name="Eliminar" id="'.$resultado["id_proveedor"].'" class="Eliminar btn btn-danger btn-xs">
				<span class="fa fa-remove"></span></button>

			</td>
		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


<?php if($_POST["tabla"]=="usuarios"): ?>	

<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Nombre</td>
			<td>Usuario</td>
			<td>Contraseña</td>
			<td>Dirección</td>
			<td>Telefono</td>
			<td>Correo</td>
			<td>Rol</td>
			<td>Estado</td>
			<td>Opciones</td>

		</tr>
	</thead>
			<?php 

			$consulta = mysqli_query($mysqli, "SELECT* FROM usuarios");
			while ($resultado = mysqli_fetch_array($consulta)) {
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_usuario"].'</td>
			<td>'.$resultado["nombre_usuario"].'</td>
			<td>'.$resultado["usuario_usuario"].'</td>
			<td>'.$resultado["clave_usuario"].'</td>
			<td>'.$resultado["direccion_usuario"].'</td>
			<td>'.$resultado["telefono_usuario"].'</td>
			<td>'.$resultado["correo_usuario"].'</td>
			<td>'.$resultado["tipo_usuario"].'</td>
			<td>'.$resultado["estado_usuario"].'</td>

			<td width=100px>
			<button type="button" name="Ver" id="'.$resultado["id_usuario"].'" class="Ver btn btn-info btn-xs">
			<span class="fa fa-eye"></span></button>
	
			<button type="button" name="Actualizar" id="'.$resultado["id_usuario"].'" class="Actualizar btn btn-success btn-xs">
			<span class="fa fa-edit"></span></button> 

			<button type="button" name="Eliminar" id="'.$resultado["id_usuario"].'" class="Eliminar btn btn-danger btn-xs">
			<span class="fa fa-remove"></span></button>
			</td>
		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


<?php if($_POST["tabla"]=="sucursales"): ?>	

<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Numero</td>
			<td>Sucursal</td>
			<td>Responsable</td>
			<td>Ubicación</td>
			<td>Referencia</td>
			<td>Telefono</td>
			<td>Descripcioón</td>
			<td>Opciones</td>

		</tr>
	</thead>
			<?php 

			$consulta = mysqli_query($mysqli, "SELECT* FROM sucursales");
			while ($resultado = mysqli_fetch_array($consulta)) {
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_sucursal"].'</td>
			<td>'.$resultado["numero_sucursal"].'</td>
			<td>'.$resultado["nombre_sucursal"].'</td>
			<td>'.$resultado["responsable_sucursal"].'</td>
			<td>'.$resultado["ubicacion_sucursal"].'</td>
			<td>'.$resultado["referencia_sucursal"].'</td>
			<td>'.$resultado["telefono_sucursal"].'</td>
			<td>'.$resultado["descripcion_sucursal"].'</td>

			<td width=100px>
				<button type="button" name="Ver" id="'.$resultado["id_sucursal"].'" class="Ver btn btn-info btn-xs">
				<span class="fa fa-eye"></span></button>
		
				<button type="button" name="Actualizar" id="'.$resultado["id_sucursal"].'" class="Actualizar btn btn-success btn-xs">
				<span class="fa fa-edit"></span></button> 

				<button type="button" name="Eliminar" id="'.$resultado["id_sucursal"].'" class="Eliminar btn btn-danger btn-xs">
				<span class="fa fa-remove"></span></button>
			</td>
		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


<?php if($_POST["tabla"]=="articulos"): ?>	

<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Clave</td>
			<td>Descripcion</td>
			<td>Categoria</td>
			<td>Inv. Min</td>
			<td>Inv. Max</td>
			<td>Compra</td>
			<td>Utilidad</td>
			<td>Venta</td>
			<td>Cantidad</td>
			<td>Proveedor</td>
			<td>Opciones</td>

		</tr>
	</thead>
			<?php 

			$consulta = mysqli_query($mysqli, "SELECT* FROM articulos");
			while ($resultado = mysqli_fetch_array($consulta)) {

			$sql1 = "SELECT nombre_categoria FROM categorias where id_categoria= '".$resultado['id_categoria']."'";
			$consulta1 = mysqli_query($mysqli, $sql1);
			$resultado1 = mysqli_fetch_array($consulta1);

			$sql2 = "SELECT empresa_proveedor FROM proveedores where id_proveedor= '".$resultado['id_proveedor']."'";
			$consulta2 = mysqli_query($mysqli, $sql2);
			$resultado2 = mysqli_fetch_array($consulta2);


			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_articulo"].'</td>
			<td>'.$resultado["clave_articulo"].'</td>
			<td>'.$resultado["descripcion_articulo"].'</td>
			<td>'.$resultado1["nombre_categoria"].'</td>
			<td>'.$resultado["invmin_articulo"].'</td>
			<td>'.$resultado["invmax_articulo"].'</td>
			<td>'.$resultado["compra_articulo"].'</td>
			<td>'.$resultado["utilidad_articulo"].'</td>
			<td>'.$resultado["venta_articulo"].'</td>
			<td>'.$resultado["cantidad_articulo"].'</td>
			<td>'.$resultado2["empresa_proveedor"].'</td>

			<td width=100px>
				<button type="button" name="Ver" id="'.$resultado["id_articulo"].'" class="Ver btn btn-info btn-xs">
				<span class="fa fa-eye"></span></button>
		
				<button type="button" name="Actualizar" id="'.$resultado["id_articulo"].'" class="Actualizar btn btn-success btn-xs">
				<span class="fa fa-edit"></span></button> 

				<button type="button" name="Eliminar" id="'.$resultado["id_articulo"].'" class="Eliminar btn btn-danger btn-xs">
				<span class="fa fa-remove"></span></button>
			</td>
		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


<?php if($_POST["tabla"]=="entradas"): ?>	

<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Clave Articulo</td>
			<td>Descripcion articulo</td>
			<td>Cantidad Actual</td>
			<td>Cantidad Anterior</td>
			<td>Diferencia Entrada</td>
			<td>Fecha Cambio</td>
			<td>Opción</td>
		</tr>
	</thead>
			<?php 
			


			$consulta = mysqli_query($mysqli, "SELECT* FROM entradas");
			while ($resultado = mysqli_fetch_array($consulta)) {
			$art=$resultado['clave_articulo'];
			$sql = "SELECT* FROM articulos where clave_articulo= '".$art."'";
			$consulta1 = mysqli_query($mysqli, $sql);
			$resultado1 = mysqli_fetch_array($consulta1);
			
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_entrada"].'</td>
			<td>'.$resultado1["clave_articulo"].'</td>
			<td>'.$resultado1["descripcion_articulo"].'</td>
			<td>'.$resultado["cantidad_actual_articulo"].'</td>
			<td>'.$resultado["cantidad_anterior_articulo"].'</td>
			<td>'.$resultado["diferencia_entrada"].'</td>
			<td>'.$resultado["date_entrada"].'</td>

			<td width=100px>
				<button type="button" name="Eliminar" id="'.$resultado["id_entrada"].'" class="Eliminar btn btn-danger btn-xs">
				<span class="fa fa-remove"></span></button>
			</td>

		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


<?php if($_POST["tabla"]=="salidas"): ?>	

<table id="tabla" class="table table-striped table-bordered table-hover" width="100%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Clave Articulo</td>
			<td>Descripcion articulo</td>
			<td>Cantidad</td>
			<td>Precio</td>
			<td>Total</td>
			<td>Sucursal</td>
			<td>Fecha Cambio</td>
			<td>Opción</td>
		</tr>
	</thead>
			<?php 
			
			$consulta = mysqli_query($mysqli, "SELECT* FROM salidas");
			while ($resultado = mysqli_fetch_array($consulta)) {

			$query_articulos = "SELECT* FROM articulos where clave_articulo= '".$resultado['clave_articulo']."'";
			$consulta_articulos= mysqli_query($mysqli, $query_articulos);
			$resultado_articulos = mysqli_fetch_array($consulta_articulos);

			$query_sucursal = "SELECT nombre_sucursal FROM sucursales where id_sucursal= '".$resultado['id_sucursal']."'";
			$consulta_sucursal= mysqli_query($mysqli, $query_sucursal);
			$resultado_sucursal = mysqli_fetch_array($consulta_sucursal);
			
			echo '<tr class="text-muted">
			<td class="text-danger">'.$resultado["id_salida"].'</td>
			<td>'.$resultado["clave_articulo"].'</td>
			<td>'.$resultado_articulos["descripcion_articulo"].'</td>
			<td>'.$resultado["cantidad_articulo"].'</td>
			<td>'.$resultado["precio_articulo"].'</td>
			<td>'.$resultado["total_articulo"].'</td>
			<td>'.$resultado_sucursal["nombre_sucursal"].'</td>
			<td>'.$resultado["date_salida"].'</td>

			<td width=100px>
				<button type="button" name="Eliminar" id="'.$resultado["id_salida"].'" class="Eliminar btn btn-danger btn-xs">
				<span class="fa fa-remove"></span></button>
			</td>
		</tr>
			';
			}
			?>	
</table>

<?php endif ?>


	<script>
  $(document).ready(function() {
    $('.table').DataTable();
  });
</script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" href="../css_app/dataTables.bootstrap4.min.css">

