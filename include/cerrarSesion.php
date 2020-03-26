<?php 
session_start();

$usuario = $_SESSION['usuario'];

if($usuario === 'cliente'){
	session_destroy();
	setcookie('noCerrarSesion', $datos, time() - 1, '/');
	header('location: ../index.php');
}

if($usuario === 'administrador'){
	session_destroy();
	setcookie('noCerrarSesion', $datos, time() - 1, '/');
	header('location: ../c-admin.html');
}


?>