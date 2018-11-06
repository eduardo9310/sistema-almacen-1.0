<?php
sleep(.8);
$mysqli = new mysqli('localhost','root','','proyecto_almacen');
if ($mysqli->connect_errno):
  echo "Error de conexion".$mysqli->connect_error;
endif;
 ?>