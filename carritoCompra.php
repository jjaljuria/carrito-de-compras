<?php
session_start();
include_once('php/conexion.php');
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
	<script src="js/carritoCompra.js"></script>
</head>
<body id="bienvenida">
<div class="contenedor min-vh-100">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>
	
	<main class="">
		<section >
			<div class="container mt-3">
			<div class="row">
			<?php
			if(isset($_SESSION) && !empty($_SESSION['idCliente'])){

			
				$idCliente = $_SESSION['idCliente'];
				$queryCarrito = "SELECT * FROM carrito inner join producto on carrito.idProducto = producto.idProducto WHERE producto.idProducto IN (SELECT carrito.idProducto FROM carrito where idCliente = $idCliente)";

				$rsquery = mysqli_query($conn, $queryCarrito) or die(mysqli_error($conn)); 

				$suma = 0;
				$cont = 0;
				while($filaQselect = mysqli_fetch_array($rsquery)){
				$suma += $filaQselect['precio'] * $filaQselect['cantidad'];
				$idProductos[$cont++] = $filaQselect['idProducto'];
			?>
				<article class="col-12 col-md-3">
				<div class="card mb-4 shadow">
  					<img class="card-img-top" src="<?php echo $filaQselect['imagen']; ?>" alt="Card image cap">
  					<div class="card-body">
    					<h4 class="card-title"><?php echo $filaQselect['nombre'];?></h4>
    					<p class="card-text border-top">
							Precio:<?php echo $filaQselect['precio']?>
    					</p>
						<p class="card-text">
							Cantidad: <?php echo $filaQselect['cantidad']; ?>
						</p>
						<button class="btn btn-danger btn-block" onclick="sacarCarrito(<?php echo $filaQselect['idCarrito']; ?>, this)">Sacar</button>
  					</div>
				</div>
				</article>
					

				
				<?php
				}
				if(isset($idProductos)){
					$_SESSION['idProductos'] = $idProductos;
				}
				
				$_SESSION['costo'] = $suma;
			}else{ ?>
				<p class="h1 m-auto text-center">Inicie Sesión para ingresar a su carrito</p>
			<?php } ?>
			</div>
			</div>
		</section>
			
				
		</div>
	</main>
	</div>
	<?php if(isset($suma)){?>
	
	<div class="text-right m-4 bg-secondary rounded">
		<span id="suma"><b>Total: </b><?php echo $suma; ?></span>				
		<button type="button" class="bg-success text-light btn btn-success" onclick="metodoPago()">Comprar</button>
	</div>
	<?php }
	?>
	<footer class="w-100 bg-dark text-light text-center mt-4">
		&copy; Derechos Reservados SkySoft 2019
	</footer>
</body>
</html>
