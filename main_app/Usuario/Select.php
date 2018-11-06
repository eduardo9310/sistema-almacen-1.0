<?php  
  
require '../Conexion.php';

// Modeulo Categorias
if(isset($_POST["categorias"])){

if(isset($_POST["id"])){  
      $output = array();  
      $query = "SELECT* FROM categorias WHERE id_categoria ='".$_POST['id']."'";  
           if(mysqli_query($mysqli, $query)){

                $result = mysqli_query($mysqli, $query);  
                while($row = mysqli_fetch_array($result))  
                {  
                     $output['nombre_categoria'] = $row["nombre_categoria"];  
                     $output['departamento_categoria'] = $row["departamento_categoria"];  
                     $output['descripcion_categoria'] = $row["descripcion_categoria"];  
                }  
                echo json_encode($output);  
           }  
 }  
}

// Modulo Proveedores.
if(isset($_POST["proveedores"])){

  $output = array();  
  $query = "SELECT* FROM proveedores WHERE id_proveedor ='".$_POST['id']."'";  
  if(mysqli_query($mysqli, $query)){

    $result = mysqli_query($mysqli, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
      $output['rfc_proveedor'] = $row["rfc_proveedor"];  
      $output['empresa_proveedor'] = $row["empresa_proveedor"];  
      $output['representante_proveedor'] = $row["representante_proveedor"];  
      $output['direccion_proveedor'] = $row["direccion_proveedor"];  
      $output['telefono_proveedor'] = $row["telefono_proveedor"];  
      $output['correo_proveedor'] = $row["correo_proveedor"];  
      $output['cuenta_proveedor'] = $row["cuenta_proveedor"];  
      $output['descripcion_proveedor'] = $row["descripcion_proveedor"];  
    }  
    echo json_encode($output);  
  }  
}

// Modulo Usuarios.
if(isset($_POST["usuarios"])){

  $output = array();  
  $query = "SELECT* FROM usuarios WHERE id_usuario ='".$_POST['id']."'";  
  if(mysqli_query($mysqli, $query)){

    $result = mysqli_query($mysqli, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
      $output['nombre_usuario'] = $row["nombre_usuario"];  
      $output['usuario_usuario'] = $row["usuario_usuario"];  
      $output['clave_usuario'] = $row["clave_usuario"];  
      $output['direccion_usuario'] = $row["direccion_usuario"];  
      $output['telefono_usuario'] = $row["telefono_usuario"];  
      $output['correo_usuario'] = $row["correo_usuario"];  
      $output['tipo_usuario'] = $row["tipo_usuario"];  
      $output['estado_usuario'] = $row["estado_usuario"];  
    }  
    echo json_encode($output);  
  }  
}

// Modulo Sucursales.
if(isset($_POST["sucursales"])){

  $output = array();  
  $query = "SELECT* FROM sucursales WHERE id_sucursal ='".$_POST['id']."'";  
  if(mysqli_query($mysqli, $query)){

    $result = mysqli_query($mysqli, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
      $output['numero_sucursal'] = $row["numero_sucursal"];  
      $output['nombre_sucursal'] = $row["nombre_sucursal"];  
      $output['responsable_sucursal'] = $row["responsable_sucursal"];  
      $output['ubicacion_sucursal'] = $row["ubicacion_sucursal"];  
      $output['referencia_sucursal'] = $row["referencia_sucursal"];  
      $output['telefono_sucursal'] = $row["telefono_sucursal"];  
      $output['descripcion_sucursal'] = $row["descripcion_sucursal"];  
    }  
    echo json_encode($output);  
  }  
}

//Modulo Articulos.
if(isset($_POST["articulos"])){

  $output = array();  
  $query = "SELECT* FROM articulos WHERE id_articulo ='".$_POST['id']."'";  
  if(mysqli_query($mysqli, $query)){

    $result = mysqli_query($mysqli, $query);  
    while($row = mysqli_fetch_array($result))  
    {  
      $output['clave_articulo'] = $row["clave_articulo"];  
      $output['descripcion_articulo'] = $row["descripcion_articulo"];  
      $output['invmin_articulo'] = $row["invmin_articulo"];  
      $output['invmax_articulo'] = $row["invmax_articulo"];  
      $output['compra_articulo'] = $row["compra_articulo"];  
      $output['utilidad_articulo'] = $row["utilidad_articulo"];  
      $output['venta_articulo'] = $row["venta_articulo"];  
      $output['cantidad_articulo'] = $row["cantidad_articulo"];  
    }  
    echo json_encode($output);  
  }  
}
 ?>  


