<?php
session_start();
if (isset($_SESSION['usuario'])) {
	if ($_SESSION['usuario']['tipo_usuario'] == "Usuario") {
		header('Location: Usuario');
	}
	if ($_SESSION['usuario']['tipo_usuario'] == "Admin") {
		header('Location: Admin');
	}
} else {
	header('Location: ../../');
}
?>
