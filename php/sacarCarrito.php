<?php
	$idCarrito = $_GET['idCarrito'];

	include_once('conexion.php');
	$query = "DELETE FROM carrito WHERE idCarrito = '$idCarrito'";
	$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($error));

	if($rsQuery){
		echo 'ok';
	}else{
		echo 'error';
	}
?>