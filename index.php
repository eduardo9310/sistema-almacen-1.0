<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if ($_SESSION['usuario']['tipo_usuario'] == "Admin") {
        header('Location: main_app/Admin/');
    } elseif ($_SESSION['usuario']['tipo_usuario'] == "Usuario") {
        header('Location: main_app/Usuario');
    }
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Sistema Almacén</title>
	<link rel="stylesheet" href="main_app/css_app/bootstrap.min.css">
	<link rel="stylesheet" href="main_app/css_app/font-awesome.min.css">
	<link rel="stylesheet" href="main_app/css_app/index.css">



	</head>
<body>
<div class="error alert alert-warning"><p class="text-warning text-center text-uppercase">Usuario o Contraseña incorrectos!</p></div>
	<div class="container">
		<div class="center-block">
			<div class="panel panel-primary">
				<div class="panel panel-heading">
					<h1 class="text-center text-center">
					<img src="notification/Admin_96px.png" alt="" class="img-circle img-thumbnail">
					<br></h1>
				</div>
				<div class="estado alert alert-danger"><p class="text-center text-uppercase text-danger">Este usuario esta desactivado!</p></div>
				<h1 class="msg"></h1>
				<form id="formlg" action="" method="POST">
					<div class="panel panel-body">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input id="user" type="text" class="usuariolg form-control" name="usuariolg" placeholder="Usuario" required pattern="[a-zA-Z0-9ñ@-_.]{1,16}">
						</div><br>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input id="password" type="password" class="passlg form-control" name="passlg" placeholder="Contraseña (8-32 Digitos)" required pattern="{8,255}">
						</div><br>
						<input name="btn" id="btn-login" class="btn btn-primary btn-lg btn-block" type="submit" value="LOGIN" >
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="main_app/js/jquery-3.2.1.min.js"></script>
	<script src="main_app/js/index.js"></script>
	<script src="main_app/js/bootstrap.min.js"></script>
	<script src="main_app/js/push.min.js"></script>
</body>
</html>
