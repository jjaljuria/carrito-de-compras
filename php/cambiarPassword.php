<?php
session_start();
include_once('conexion.php');
if(isset($_POST['passwordVieja']) && !empty($_POST['passwordVieja'])){
	$usuario = $_SESSION['usuario'];
	$passwordVieja = $_POST['passwordVieja'];
	$query = '';
	switch ($usuario) {
		case 'cliente':
			$idCliente = $_SESSION['idCliente'];
			$query = "SELECT password FROM cliente WHERE idCliente='$idCliente'";
			break;

		case 'administrador':
			$idAdmin = $_SESSION['idAdmin'];
			$query = "SELECT password FROM administrador WHERE idAdmin='$idAdmin'";
			break;
		
		default:
			# code...
			break;
	}
	
	$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$resultado = mysqli_fetch_array($rsQuery);
	if(password_verify($passwordVieja, $resultado['password']))
		echo 'ok';
	else
		echo 'error';
}else if(isset($_POST['passwordNueva']) && !empty($_POST['passwordNueva'])){
	$usuario = $_SESSION['usuario'];
	$passwordNueva = password_hash($_POST['passwordNueva'], PASSWORD_DEFAULT);
	$query = '';
	switch ($usuario) {
		case 'cliente':
			$idCliente = $_SESSION['idCliente'];
			$query = "UPDATE cliente SET password='$passwordNueva' WHERE idCliente='$idCliente'";
			break;

		case 'administrador':
			$idAdmin = $_SESSION['idAdmin'];
			$query = "UPDATE administrador SET password='$passwordNueva' WHERE idAdmin='$idAdmin'";
			break;
	}
	
	$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if($rsQuery){
		echo $_POST['passwordNueva'];
		echo $passwordNueva;
		echo password_verify($_POST['passwordNueva'], $passwordNueva);
		echo 'ok';
	}else
		echo 'error';
}

?>