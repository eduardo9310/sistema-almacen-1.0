<?php include "Header.php"?>

	<div class="container">
	  <h2 class="text-center text-primary">Configuración del Sistema</h2>
	  <div class="panel-group">

	    <div class="panel panel-primary">
	      <div class="panel-heading">Datos del Sistema</div>
	      <div class="panel-body">

	      <form action="" class="" method="POST">

	      	<div class="input-group">
	      	<span class="input-group-addon">Nombre del Sistema:</span>
	      	<input type="text" class="form-control" name="nombre_sistema" placeholder="Maximo de 15 Digitos" required pattern="">
	      	</div><br>

	      	<div class="input-group">
	      	<span class="input-group-addon">Version del Sistema:</span>
	      	<input type="text" class="form-control" name="version_sistema" placeholder="v.1" required>
	      	</div><br>

	      	<div class="input-group">
	      	<span class="input-group-addon">Ruta del Logo:</span>
	      	<input type="file" class="form-control" name="logo_sistema" placeholder="Ejemplo">
	      	</div>

					<br><button id="proveedores" class="input-group btn btn-success btn-block">Guardar Configuración</button>
	      </form>
	      </div>
	    </div>
	  </div>
	</div>
	<?php
if (isset($_POST['btn-configuracion'])) {

    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['usuario']['tipo_usuario'] = "Admin") {
            $nombre_sistema  = $_POST['nombre_sistema'];
            $version_sistema = $_POST['version_sistema'];
            $logo_sistema    = $_POST['logo_sistema'];
            $usuario         = $_SESSION['usuario']['id'];
            require '../../main_app/Conexion.php';

            $query = "INSERT INTO config_sistema (id_usuario, nombre_sistema, version_sistema) VALUES ('" . $usuario . "', '" . $nombre_sistema . "', '" . $version_sistema . "')";

            if (mysqli_query($mysqli, $query)) {
                ?>

				<script>
				Push.create("Configuración",{
				  body:"El usuario Acutalizo los datos del sistema",
				  icon: "../../Notification/Admin_96px.png",
				  timeout:"5000",
				  onClick: function(){
				    window.focus();
				    this.close();
				}
        })

				</script>
	<?php

            } else {
                echo "False";
            }

        }
    }
} else {}

?>

	<script src="../../js/jquery-3.2.1.min.js"></script>
	<script src="../../js/popper.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

</body>
</html>