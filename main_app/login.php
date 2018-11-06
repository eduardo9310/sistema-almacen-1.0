<?php


if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
  # code...
  require 'Conexion.php';
  sleep(.6);
  session_start();


  $mysqli -> set_charset('utf8');
  $usuario = $mysqli->real_escape_string($_POST['usuariolg']);
  $pass = $mysqli->real_escape_string($_POST['passlg']);
  
  if ($nueva_consulta = $mysqli->prepare("SELECT id_usuario, nombre_usuario, clave_usuario, tipo_usuario, estado_usuario FROM  usuarios WHERE usuario_usuario = ?")){
    # code...
    $nueva_consulta->bind_param('s', $usuario);
    $nueva_consulta->execute();
    $resultado = $nueva_consulta->get_result();

    if ($resultado->num_rows == 1){
      # code...
      $datos = $resultado->fetch_assoc();

      if (password_verify("$pass", $datos['clave_usuario'])) {
        # code...
        $_SESSION['usuario'] = $datos;
        echo json_encode(array('error' => false, 'id' => $datos['id_usuario'], 'tipo' => $datos['tipo_usuario'], 'estado' => $datos['estado_usuario']));
      } else {
        echo json_encode(array('error' => true));
      }
      
    }else{
      # code...
      echo json_encode(array('error' => true));
    }
    $nueva_consulta->close();
  }
}
$mysqli->close();
?>
