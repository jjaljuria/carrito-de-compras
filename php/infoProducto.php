<?php 
	$idCliente = $_GET['idCliente'];
	$idProducto = $_GET['idProducto'];
	$cantidad = filter_var($_GET['cantidad'], FILTER_SANITIZE_NUMBER_INT);
	include_once('conexion.php');
	
	$query = "INSERT INTO carrito(idCliente, idProducto, cantidad) VALUES($idCliente, $idProducto, $cantidad)";
	$rsQuery = mysqli_query($conn, $query);

	if($rsQuery){
		header('location: ../carritoCompra.php');
	}
?>