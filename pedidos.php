<?php
session_start();

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
	<script src="js/pedidos.js"></script>
</head>
<body id="bienvenida">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>
	<main class="">
		<section class="min-vh-100">
			<table class="table tabla-responsive table-hover text-center ">
				<tr class="bg-dark text-light">
					<td class="pr-5">ID</td>
					<td class="pr-5">Costo</td>
					<td class="pr-5">Nombre</td>
					<td class="pr-5">Apellido</td>
					<td class="pr-5">Codigo</td>
					<td colspan="2" class="text-center"> Acciones</td>
				</tr>
			<?php
				include_once('php/conexion.php');
				$query = "SELECT * FROM pedido WHERE estado != 'despachado' AND estado != 'negado'";
				$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
				while($pedido = mysqli_fetch_array($rsQuery)){
					$idCliente = $pedido['idCliente'];
					$query2 = "SELECT nombre, apellido from cliente where idCliente = '$idCliente'";
					$rsQuery2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));
					$cliente = mysqli_fetch_array($rsQuery2);
				?>
					<tr>
						<td ><?php echo $pedido['idPedido']; ?></td>
						<td><?php echo $pedido['costo'];?></td>
						<td><?php echo $cliente['nombre'];?></td>
						<td><?php echo $cliente['apellido'];?></td>
						<td><?php echo $pedido['codigo']; ?></td>
						<td>
							<?php
								if($pedido['estado'] === 'pendiente'){?>
							<button type="button" class="btn btn-success" onclick="aprobar(<?php  echo $pedido['idPedido'];?>)">Aprobar</button>
							
							<button type="button" class="btn btn-danger" onclick="negar(<?php  echo $pedido['idPedido'];?>)">Negar</button>
							<?php }else{ ?>

							<button type="button" class="btn btn-warning" onclick="despachar(<?php  echo $pedido['idPedido'];?>)">Despachar</button>

							<?php } ?>
							

							<a href="<?php echo $pedido['factura'] ?>" target="_blank"><button type="button" class="btn btn-primary">Ver Factura</button></a>
							
						</td>
					</tr>
				<?php
				}
				?>
			</table>
		</section>
	</main>
	
	<footer class="w-100 bg-dark text-light text-center mt-4">
		&copy; Derechos Reservados SkySoft 2019
	</footer>
</body>
</html>
<?php
}else{
	echo "Debe iniciar session";
}
?>