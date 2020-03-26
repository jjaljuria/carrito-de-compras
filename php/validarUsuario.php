<?php
require_once('conexion.php');

//Obtiene los datos por POST
$email = strtolower($_POST['email']);
$password = $_POST['password'];
$cSesion = $_POST['cSesion'];

//Query para comprobar si el email y la password estas en la db
$query = "SELECT email, password, idCliente FROM cliente WHERE email = '$email'";

$resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));

$cliente = mysqli_fetch_array($resultado);
if(password_verify($password, $cliente['password'])){
	echo 'ok';
	
	if($cSesion == true){
		session_set_cookie_params(time() + (3600*24*365));
	}
	session_start();
	$_SESSION['idCliente'] = $cliente['idCliente'];
	$_SESSION['email'] = $cliente['email'];
	$_SESSION['usuario'] = 'cliente';
}else{
	echo 'error';
}
?>