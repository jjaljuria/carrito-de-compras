<?php
session_start();
include_once('php/conexion.php');
if(!empty($_SESSION)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Super Tienda</title>
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilo.css">
	<script src="JQuery/jquery-3.4.1.min.js"></script>
	<script src="Popper/popper.min.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
</head>
<body id="bienvenida">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>

	<main>
		<section>
			<table class="table table-hover text-center tabla-responsive">
				<tr class="bg-dark text-light">
					<td class="pr-5">Total de Pedidos</td>
					<td class="pr-5">Pedidos Aprobados</td>
					<td class="pr-5">Pedidos Negados</td>
					<td class="pr-5">Pedidos Pendientes</td>
					<td class="pr-5">Pedidos Despachados</td>
				</tr>
			<?php
				//Pedido Totoal
				$query1 = "SELECT COUNT(*), SUM(costo) FROM pedido";
				$rsQuery = mysqli_query($conn, $query1) or die(mysqli_error($conn));
				$pedido = mysqli_fetch_array($rsQuery);

				//Pedidos Aprobados
				$query2 = "SELECT COUNT(*), SUM(costo) FROM pedido WHERE estado='aprobado'";
				$rsQuery = mysqli_query($conn, $query2) or die(mysqli_error($conn));
				$pedido2 = mysqli_fetch_array($rsQuery);

				//Pedidos Negados
				$query3 = "SELECT COUNT(*), SUM(costo) FROM pedido WHERE estado='negado'";
				$rsQuery = mysqli_query($conn, $query3) or die(mysqli_error($conn));
				$pedido3 = mysqli_fetch_array($rsQuery);

				//Pedidos Pendientes
				$query4 = "SELECT COUNT(*), SUM(costo) FROM pedido WHERE estado='pendiente'";
				$rsQuery = mysqli_query($conn, $query4) or die(mysqli_error($conn));
				$pedido4 = mysqli_fetch_array($rsQuery);

				//Pedidos Despachados
				$query5 = "SELECT COUNT(*), SUM(costo) FROM pedido WHERE estado='despachado'";
				$rsQuery = mysqli_query($conn, $query5) or die(mysqli_error($conn));
				$pedido5 = mysqli_fetch_array($rsQuery);
			
			?>
				<tr>
					<td class="pr-5">
					Total: <?php echo $pedido['COUNT(*)'];?>
				</td>
				<td class="pr-5">
					Total: <?php echo $pedido2['COUNT(*)'];?>
				</td>
				<td class="pr-5">
					Total: <?php echo $pedido3['COUNT(*)'];?>
				</td>
				<td class="pr-5">
					Total: <?php echo $pedido4['COUNT(*)'];?>
				</td>
				<td>
					Total: <?php echo $pedido5['COUNT(*)'];?>
				</td>
				</tr>
				

				<tr>
					<td class="pr-5">
						Costo: <?php echo $pedido['SUM(costo)'];?>
					</td>
					<td class="pr-5">
						Costo: <?php echo $pedido2['SUM(costo)'];?>
					</td>
					<td class="pr-5">
						Costo: <?php echo $pedido3['SUM(costo)'];?>
					</td>
					<td class="pr-5">
						Costo: <?php echo $pedido4['SUM(costo)'];?>
					</td>
					<td class="pr-5">
						Costo: <?php echo $pedido5['SUM(costo)'];?>
					</td>
				</tr>

			</table>
		</section>

	</main>
	
	<footer class="w-100 bg-dark text-light text-center mt-4 fixed-bottom">
		&copy; Derechos Reservados SkySoft 2019
	</footer>
</body>
</html>
<?php
}else{
	echo "Debe iniciar session";
}
?>