<?php
require_once('conexion.php');

//Obtiene los datos por POST
$email = strtolower($_POST['email']);


//Query para comprobar si el email y la password estas en la db
$query = "SELECT email FROM cliente WHERE email = '$email'";

$resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));

$cliente = mysqli_fetch_array($resultado);
if(isset($cliente['email'])){
	$email = $cliente['email'];
	$codigo = rand(10000, 20000);
	mail($email, 'RECUPERAR CONTRASEÑA SUPER TIEND', "CLAVE DE RECUPERACION DE CONTRASEÑA: $codigo");
	session_start();
	$_SESSION['codigo'] = $codigo;
	echo 'ok';
}else{
	echo 'error';
}
?>