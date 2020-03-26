<?php
include_once('conexion.php');
session_start();

$idProductos = join(',', $_SESSION['idProductos']);
$idCliente = $_SESSION['idCliente'];
$costo = $_SESSION['costo'];
$codigo = rand(100, 200);
$factura = "facturas/factura$codigo.pdf";
$_SESSION['codigo'] = $codigo;

$query = "INSERT INTO pedido(idProducto, idCliente, estado, costo,codigo, factura) values('$idProductos', '$idCliente', 'pendiente', '$costo', $codigo, '$factura');";

$respuesta = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($respuesta){

	header("location: ../facturar.php?codigo=$codigo");
}else{
	echo error;
}
?>