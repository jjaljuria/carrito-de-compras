<?php
include_once('fpdf/fpdf.php');
require_once('conexion.php');

//Query para conseguir informacion del pedido
$codigo = $_GET['codigo'];
$queryPedido = "SELECT * FROM pedido WHERE codigo = '$codigo'";

$rsPedido = mysqli_query($conn, $queryPedido) or die(mysqli_error($conn));

$pedido = mysqli_fetch_array($rsPedido);


$idProductos =$pedido['idProducto'];
$costo = $pedido['costo'];
$codigo = $pedido['codigo'];
$fecha = $pedido['fechaRealizacion'];
$idCliente = $pedido['idCliente'];



// Query para conseguir nombre del cliente
$queryCliente = "SELECT nombre, apellido FROM cliente WHERE idCliente = '$idCliente'";

$rsCliente = mysqli_query($conn, $queryCliente) or die(mysqli_error($conn));

$cliente = mysqli_fetch_array($rsCliente);
$nombre = $cliente['nombre'];
$apellido = $cliente['apellido'];

// Query para conseguir los productos

$queryProducto = $query = "SELECT * FROM carrito inner join producto on carrito.idProducto = producto.idProducto WHERE producto.idProducto IN (SELECT carrito.idProducto FROM carrito where idCliente = $idCliente)";

$rsProducto = mysqli_query($conn, $queryProducto) or die(mysqli_error($conn));

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 24);
	$pdf->Cell(0,10,'Super Tienda Las Mejores Ventas', 0, 1, 'C');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(0, 10, 'J-00000000',0,1,'C');
	$pdf->Cell(0,10, "Factura N". utf8_decode('°')." $codigo", 0, 1, 'C');
	$pdf->Cell(0,10, "Fecha: $fecha", 0, 1, 'C');
    $pdf->SetFont("Arial","B",14);
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(0,10,"Muchas gracias, $nombre $apellido su compra ha sido completada con exito.",1,1,'C');
    $pdf->Ln();

    $pdf->SetTextColor(100,100,0);
    $pdf->Cell(0,10,"---- Productos comprados ----",1,1,'C');
	$pdf->Ln();
	$cont = 1;
	while($producto = mysqli_fetch_array($rsProducto)){
	
		$nombreProducto = $producto['nombre'];
		$precio = $producto['precio'];
		$cantidad = $producto['cantidad'];
		$subtotal = $precio*$cantidad;

	$pdf->SetTextColor(0,0,100);
	$pdf->Cell(0,10,"$cont .- " . "$nombreProducto",1,1);
	$cont++;
	$pdf->SetTextColor(100,0,100);
	$pdf->Cell(0,10,"Cantidad: " . "$cantidad " . "----------------- Costo: $subtotal",1,1);
	$pdf->SetTextColor(100,0,0);
	$pdf->Cell(0,10,"Precio por unidad: $" . "$precio",1,1);
	$pdf->Ln();
	
	}
	
	$pdf->SetTextColor(0,100,100);
    $pdf->Cell(0,10,"Monto total: $" . "$costo",1,1,'C');
    $pdf->Ln();
	$pdf->Output('F', "facturas/factura$codigo.pdf", true);

	//Query para vaciar el carrito
$queryVaciar = "DELETE FROM carrito WHERE idCliente = '$idCliente'";mysqli_query($conn, $queryVaciar) or die(mysqli_error($conn));
?>