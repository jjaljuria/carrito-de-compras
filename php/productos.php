<?php
$btn = $_GET['btn'];
$idProducto = $_GET['idProducto'];


include_once('conexion.php');
if($btn === 'eliminar'){
	$queryEliminar = "DELETE FROM producto WHERE idProducto='$idProducto'";
$rsQuery = mysqli_query($conn, $queryEliminar) or die(mysqli_error($conn));

if($rsQuery)
	header('location: ../productos.php');
}
?>