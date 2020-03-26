<?php
$idPedido = $_GET['idPedido'];
$estado = $_GET['estado'];

include_once('conexion.php');

$query = "UPDATE pedido SET estado = '$estado' WHERE idPedido = '$idPedido'";
$resultado = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($resultado)
	header('location: ../pedidos.php');
?>