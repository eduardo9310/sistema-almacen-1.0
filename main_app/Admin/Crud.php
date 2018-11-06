<?php  
	$output='';
	require '../Conexion.php';


// Mensajes

$registro_ok_new = "<h4 class='text-success'><span class='fa fa-plus '></span> Registro Creado.</h4>";
$registro_ok_update = "<h4 class='text-success'><span class='fa fa-edit '></span> Registro Actualizado.</h4>";
$registro_ok_delete = "<h4 class='text-success'><span class='fa fa-close '></span> Registro Eliminado.</h4>";

$registro_fail_new = "<h4 class='text-danger'><span class='fa fa-plus '></span> Registro NO Creado.</h4>";
$registro_fail_update = "<h4 class='text-danger'><span class='fa fa-edit '></span> Registro NO Actualizado.</h4>";
$registro_fail_delete = "<h4 class='text-danger'><span class='fa fa-close '></span> Registro NO Eliminado.</h4>";

$registro_ok_search = "<h4 class='text-danger'><span class='fa fa-plus '></span> Registro NO Encontrado.</h4>";
$registro_fail_search = "<h4 class='text-danger'><span class='fa fa-exclamation-triangle'></span> Registro NO Encontrado.</h4>";



// Crud para Modulo Categorias.
if(isset($_POST["Opcion"])){


	if($_POST["Opcion"]=="Nuevo") {

		$nombre_categoria = $_POST['nombre_c'];
		$departamento_categoria = $_POST['departamento_c'];
		$descripcion_categoria = $_POST['descripcion_c'];

		$query = "INSERT INTO categorias(nombre_categoria, departamento_categoria, descripcion_categoria) VALUES( '".$nombre_categoria."', '".$departamento_categoria."', '".$descripcion_categoria."')";
		
		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_new;
		} else {
			echo $registro_fail_new;
		}
	}

	if($_POST["Opcion"]=="Actualizar") {

		$id = $_POST['id'];
		$nombre_categoria = $_POST['nombre_c'];
		$departamento_categoria = $_POST['departamento_c'];
		$descripcion_categoria = $_POST['descripcion_c'];

		$query = "UPDATE categorias SET nombre_categoria ='".$nombre_categoria."', departamento_categoria='".$departamento_categoria."', descripcion_categoria= '".$descripcion_categoria."' WHERE id_categoria = '".$id."'";
		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_update;
		} else {
			echo $registro_fail_update;
		}
	}

	if($_POST["Opcion"]=="Eliminar") {

		$query = "DELETE FROM categorias WHERE id_categoria = '".$_POST["id"]."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_delete;
		}else {
			echo $registro_fail_delete;
		}
	}
}


// Crud para Modulo Proveedores.
if(isset($_POST["proveedores"])){

	if($_POST["proveedores"]=="Nuevo") {

		$id =$_POST['id'];
		$rfc_proveedor = $_POST['rfc_p'];
		$empresa_proveedor = $_POST['empresa_p'];
		$representante_proveedor = $_POST['representante_p'];
		$direccion_proveedor = $_POST['direccion_p'];
		$telefono_proveedor = $_POST['telefono_p'];
		$correo_proveedor = $_POST['correo_p'];
		$cuenta_proveedor = $_POST['cuenta_p'];
		$descripcion_proveedor = $_POST['descripcion_p'];

		$query = "INSERT INTO proveedores(rfc_proveedor, empresa_proveedor, representante_proveedor, direccion_proveedor, telefono_proveedor, correo_proveedor, cuenta_proveedor, descripcion_proveedor) VALUES( '".$rfc_proveedor."', '".$empresa_proveedor."', '".$representante_proveedor."', '".$direccion_proveedor."', '".$telefono_proveedor."', '".$correo_proveedor."', '".$cuenta_proveedor."', '".$descripcion_proveedor."')";
		
		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_new;
		} else {
			echo $registro_fail_new;
		}
	}
	
	if($_POST["proveedores"]=="Actualizar") {
		
		$id =$_POST['id'];
		$rfc_proveedor = $_POST['rfc_p'];
		$empresa_proveedor = $_POST['empresa_p'];
		$representante_proveedor = $_POST['representante_p'];
		$direccion_proveedor = $_POST['direccion_p'];
		$telefono_proveedor = $_POST['telefono_p'];
		$correo_proveedor = $_POST['correo_p'];
		$cuenta_proveedor = $_POST['cuenta_p'];
		$descripcion_proveedor = $_POST['descripcion_p'];

		$query = "UPDATE proveedores SET rfc_proveedor ='".$rfc_proveedor."', empresa_proveedor='".$empresa_proveedor."', representante_proveedor= '".$representante_proveedor."', direccion_proveedor='".$direccion_proveedor."', telefono_proveedor='".$telefono_proveedor."', correo_proveedor='".$correo_proveedor."', cuenta_proveedor='".$cuenta_proveedor."', descripcion_proveedor='".$descripcion_proveedor."'  WHERE id_proveedor = '".$id."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_update;
		} else {
			echo $registro_fail_update;
		}
	}

	if($_POST["proveedores"]=="Eliminar") {

		$query = "DELETE FROM proveedores WHERE id_proveedor = '".$_POST["id"]."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_delete;
		}else {
			echo $registro_fail_delete;
		}
	}
}


// Crud para Modulo Usuarios.
if(isset($_POST["usuarios"])){

	if($_POST["usuarios"]=="Nuevo") {

		$id = $_POST['id'];
		$nombre_usuario = $_POST['nombre_u'];
		$usuario_usuario = $_POST['usuario_u'];
		$clave_usuario = $_POST['clave_u'];
		$direccion_usuario = $_POST['direccion_u'];
		$telefono_usuario = $_POST['telefono_u'];
		$correo_usuario = $_POST['correo_u'];
		$tipo_usuario = $_POST['tipo_u'];
		$estado_usuario = $_POST['estado_u'];

		// Encriptación de la Clave del Usuario (Hash).
		$clave_hash= password_hash($clave_usuario, PASSWORD_DEFAULT);


		$query = "INSERT INTO usuarios(nombre_usuario, usuario_usuario, clave_usuario, direccion_usuario, telefono_usuario, correo_usuario, tipo_usuario, estado_usuario) VALUES( '".$nombre_usuario."', '".$usuario_usuario."', '".$clave_hash."', '".$direccion_usuario."', '".$telefono_usuario."', '".$correo_usuario."', '".$tipo_usuario."', '".$estado_usuario."')";
		
		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_new;
		} else {
			echo $registro_fail_new;
		}
	}
	


	if($_POST["usuarios"]=="Actualizar") {
		
		$id = $_POST['id'];
		$nombre_usuario = $_POST['nombre_u'];
		$usuario_usuario = $_POST['usuario_u'];
		$clave_usuario = $_POST['clave_u'];
		$direccion_usuario = $_POST['direccion_u'];
		$telefono_usuario = $_POST['telefono_u'];
		$correo_usuario = $_POST['correo_u'];
		$tipo_usuario = $_POST['tipo_u'];
		$estado_usuario = $_POST['estado_u'];

		$query = "UPDATE usuarios SET nombre_usuario ='".$nombre_usuario."', usuario_usuario='".$usuario_usuario."', clave_usuario= '".$clave_usuario."', direccion_usuario='".$direccion_usuario."', telefono_usuario='".$telefono_usuario."', correo_usuario='".$correo_usuario."', tipo_usuario='".$tipo_usuario."', estado_usuario='".$estado_usuario."'  WHERE id_usuario = '".$id."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_update;
		} else {
			echo $registro_fail_update;
		}
	}


	if($_POST["usuarios"]=="Eliminar") {

		$query = "DELETE FROM usuarios WHERE id_usuario = '".$_POST["id"]."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_delete;
		}else {
			echo $registro_fail_delete;
		}
	}
}


// Crud para Modulo Sucursales.
if(isset($_POST["sucursales"])){

	if($_POST["sucursales"]=="Nuevo") {

		$numero_sucursal = $_POST['numero_s'];
		$nombre_sucursal = $_POST['nombre_s'];
		$responsable_sucursal = $_POST['responsable_s'];
		$ubicacion_sucursal = $_POST['ubicacion_s'];
		$referencia_sucursal = $_POST['referencia_s'];
		$telefono_sucursal = $_POST['telefono_s'];
		$descripcion_sucursal = $_POST['descripcion_s'];



		$query = "INSERT INTO sucursales(numero_sucursal, nombre_sucursal, responsable_sucursal, ubicacion_sucursal, referencia_sucursal, telefono_sucursal, descripcion_sucursal) VALUES( '".$numero_sucursal."', '".$nombre_sucursal."', '".$responsable_sucursal."', '".$ubicacion_sucursal."', '".$referencia_sucursal."', '".$telefono_sucursal."', '".$descripcion_sucursal."')";
		
		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_new;

		} else {
			echo $registro_fail_new;
		}
	}
	

	if($_POST["sucursales"]=="Actualizar") {
		
		$id = $_POST['id'];
		$numero_sucursal = $_POST['numero_s'];
		$nombre_sucursal = $_POST['nombre_s'];
		$responsable_sucursal = $_POST['responsable_s'];
		$ubicacion_sucursal = $_POST['ubicacion_s'];
		$referencia_sucursal = $_POST['referencia_s'];
		$telefono_sucursal = $_POST['telefono_s'];
		$descripcion_sucursal = $_POST['descripcion_s'];

		$query = "UPDATE sucursales SET numero_sucursal ='".$numero_sucursal."', nombre_sucursal='".$nombre_sucursal."', responsable_sucursal= '".$responsable_sucursal."', ubicacion_sucursal='".$ubicacion_sucursal."', referencia_sucursal='".$referencia_sucursal."', telefono_sucursal='".$telefono_sucursal."', descripcion_sucursal='".$descripcion_sucursal."' WHERE id_sucursal = '".$id."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_update;
		} else {
			echo $registro_fail_update;
		}
	}

	if($_POST["sucursales"]=="Eliminar") {

		$query = "DELETE FROM sucursales WHERE id_sucursal = '".$_POST["id"]."'";

		if(mysqli_query($mysqli, $query)){

			echo $registro_ok_delete;
		}else {
			echo $registro_fail_delete;
		}
	}
}

// Crud para Modulo Articulos.
if(isset($_POST["articulos"])){

	if($_POST["articulos"]=="Nuevo") {

		$clave_articulo = $_POST['clave_a'];
		$descripcion_articulo = $_POST['descripcion_a'];
		$invmin_articulo = $_POST['invmin_a'];
		$invmax_articulo = $_POST['invmax_a'];
		$compra_articulo = $_POST['compra_a'];
		$utilidad_articulo = $_POST['utilidad_a'];
		$cantidad_articulo = $_POST['cantidad_a'];
		$categoria_articulo = $_POST['categoria_a'];
		$proveedor_articulo = $_POST['proveedor_a'];
		$venta = $_POST['compra_a'];
		$venta_articulo= $venta + ($venta * ($utilidad_articulo/100));



		$query = "INSERT INTO articulos(clave_articulo, descripcion_articulo, invmin_articulo, invmax_articulo, compra_articulo, utilidad_articulo, venta_articulo, cantidad_articulo, id_categoria, id_proveedor) VALUES( '".$clave_articulo."', '".$descripcion_articulo."', '".$invmin_articulo."', '".$invmax_articulo."', '".$compra_articulo."', '".$utilidad_articulo."', '".$venta_articulo."', '".$cantidad_articulo."', '".$categoria_articulo."', '".$proveedor_articulo."')";

		$query_check = "SELECT clave_articulo, descripcion_articulo FROM articulos WHERE clave_articulo='".$clave_articulo."'";
		$consulta = mysqli_query($mysqli, $query_check);
		$resultado = mysqli_fetch_array($consulta);

		if ($consulta->num_rows == 0) {
			if(mysqli_query($mysqli, $query)){
			echo $registro_ok_new;

			} else {
				echo $registro_fail_new;
			}
		}else{
			echo "<h4 class='text-warning'><span class='fa fa-warning'></span> Clave Registrada </h4>".$resultado['descripcion_articulo'];
		}
	}
	

	if($_POST["articulos"]=="Actualizar") {
		
		$id = $_POST['id'];
		$clave_articulo = $_POST['clave_a'];
		$descripcion_articulo = $_POST['descripcion_a'];
		$invmin_articulo = $_POST['invmin_a'];
		$invmax_articulo = $_POST['invmax_a'];
		$compra_articulo = $_POST['compra_a'];
		$utilidad_articulo = $_POST['utilidad_a'];
		$cantidad_articulo = $_POST['cantidad_a'];
		$proveedor_articulo = $_POST['proveedor_a'];
		$venta = $_POST['compra_a'];
		$venta_articulo= $venta + ($venta * ($utilidad_articulo/100));

		$query = "UPDATE articulos SET clave_articulo ='".$clave_articulo."', descripcion_articulo='".$descripcion_articulo."', invmin_articulo= '".$invmin_articulo."', invmax_articulo='".$invmax_articulo."', compra_articulo='".$compra_articulo."', utilidad_articulo='".$utilidad_articulo."', venta_articulo='".$venta_articulo."', cantidad_articulo='".$cantidad_articulo."' WHERE id_articulo = '".$id."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_update;
		} else {
			echo $registro_fail_update;
		}
	}

	if($_POST["articulos"]=="Eliminar") {

		$query = "DELETE FROM articulos WHERE id_articulo = '".$_POST["id"]."'";

		if(mysqli_query($mysqli, $query)){
			echo $registro_ok_delete;
		}else {
			echo $registro_fail_delete;
		}
	}
}


// Crud para Modulo Entradas.
if(isset($_POST["entradas"])){

	if($_POST["entradas"]=="Nuevo") {

		$sql = "SELECT cantidad_articulo, descripcion_articulo FROM articulos where clave_articulo = '".$_POST['clave_a']."'";
		$consulta = mysqli_query($mysqli, $sql);
		$resultado = mysqli_fetch_array($consulta);


		$clave_articulo = $_POST['clave_a'];
		$cantidad_articulo = $_POST['cantidad_a'] + $resultado['cantidad_articulo'];
		$cantidad_anterior_articulo = $resultado['cantidad_articulo'];
		$diferencia_entrada = $cantidad_articulo - $cantidad_anterior_articulo;
		$descripcion_articulo_entrada = $resultado['descripcion_articulo'];


		$query = "UPDATE articulos SET cantidad_articulo='".$cantidad_articulo."' WHERE clave_articulo = '".$clave_articulo."'";
		
		$query1 = "INSERT INTO entradas(clave_articulo, cantidad_actual_articulo, cantidad_anterior_articulo, diferencia_entrada) VALUES( '".$clave_articulo."', '".$cantidad_articulo."', '".$cantidad_anterior_articulo."', '".$diferencia_entrada."')";

		if ($consulta->num_rows==1 ) {
		

			if(mysqli_query($mysqli, $query) && mysqli_query($mysqli, $query1)){
				echo $registro_ok_new;
			} else {
				echo $registro_fail_new;

			}

		}else{

			echo "<h4 class='text-warning'><span class='fa fa-warning'></span> Articulo NO Disponible</h4>".'<a class="btn btn-info" href="Articulos.php">Agregar Articulo</a>';
		}

	}
		if($_POST["entradas"]=="Eliminar") {

			$query = "DELETE FROM entradas WHERE id_entrada = '".$_POST["id"]."'";

			if(mysqli_query($mysqli, $query)){
				echo $registro_ok_delete;
			}else {
				echo $registro_fail_delete;
			}
		}
}

// Crud para Modulo Salidas.
if(isset($_POST["salidas"])){

	if($_POST["salidas"]=="Nuevo") {


		$clave_articulo_salida = $_POST['clave_a'];
		$cantidad_articulo_salida = $_POST['cantidad_a'];
		$id_sucursal = $_POST['id_suc'];

		$query_a = "SELECT* FROM articulos where clave_articulo = '".$clave_articulo_salida."'";
		$consulta = mysqli_query($mysqli, $query_a);
		$resultado = mysqli_fetch_array($consulta);




		// Operaciones Salidas.

		$nueva_cantidad_articulo = $resultado['cantidad_articulo'] - $cantidad_articulo_salida;
		$total_precio_salida = $cantidad_articulo_salida * $resultado['venta_articulo']; 

		// Tabla articulos.
		$query = "UPDATE articulos SET cantidad_articulo='".$nueva_cantidad_articulo."' WHERE clave_articulo = '".$clave_articulo_salida."'";
		
		
		// Tabla Salidas.
		$query1 = "INSERT INTO salidas(clave_articulo, cantidad_articulo, precio_articulo, total_articulo, id_sucursal) VALUES( '".$clave_articulo_salida."', '".$cantidad_articulo_salida."', '".$resultado['venta_articulo']."', '".$total_precio_salida."', '".$id_sucursal."')";
		
		// Proceso
		if ($consulta-> num_rows == 1)
		{

			if ($nueva_cantidad_articulo>=0 and $cantidad_articulo_salida>0) {
				if(mysqli_query($mysqli, $query) && mysqli_query($mysqli, $query1)){
					echo $registro_ok_new;
				} else {
					echo $registro_fail_new;
				}
			}else{
				echo "<h4 class='text-warning'><span class='fa fa-warning'></span> Cantidad NO Disponible</h4>".'<a href="Entradas.php">Agregar Entrada</a>';
			}
		}else{
			echo "<h4 class='text-warning'><span class='fa fa-warning'></span> Articulo NO Disponible</h4>".'<a class="btn btn-info" href="Articulos.php">Agregar Articulo</a>';

		}
	}
		if($_POST["salidas"]=="Eliminar") {

			$query = "DELETE FROM salidas WHERE id_salida = '".$_POST["id"]."'";

			if(mysqli_query($mysqli, $query)){
				echo "<h4 class='text-success'><span class='fa fa-check '></span> Eliminado con EXITO!<h4>";
			}else {
				echo "Registro NO Eliminado!";
			}
		}
}
?>