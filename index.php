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
</head>
<body id="bienvenida">
<div class="contenedor min-vh-100">
	<?php include_once('include/encabezado.php'); ?>

	<?php include_once('include/menus.php');?>
	<main class="">
		<section class="pb-3">
			<?php 
				if(!empty($_SESSION)){?>
					<div class="container"> 
						<p class="bien h1  text-center display-3 my-3  border border-primary shadow py-2"><?php echo 'Bienvenido ' . $_SESSION['email'];?></p>
					</div>
				<?php }else{ ?>
					<div class="container"> 
						<p class="bien h1 display-3 text-center my-3 border border-primary shadow py-2">Bienvenido a Super Tienda</p>
					</div>
				<?php } ?>
				
			<div class="container">
				<p class="text-center mx-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero, sapiente. Officiis, neque magni, molestias obcaecati eveniet voluptatum id quisquam ea ratione quaerat odio quasi, optio nesciunt officia adipisci. Ad, quae.</p>
			</div>

			<br>
			<br>
			<div class="container">
			<div id="demo" class="carousel slide w-100 h-100 m-auto" data-ride="carousel">
				
				<ul class="carousel-indicators">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>

				
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="img/dragon.jpg"  class="img-fluid"alt="Los Angeles">
					</div>
					<div class="carousel-item">
						<img src="img/mario.jpg" class="img-fluid" alt="Chicago">
					</div>
					<div class="carousel-item">
						<img src="img/mario.jpg" class="img-fluid" alt="New York">
					</div>
				</div>
				
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
			</div></div>
		<section>
		
	</main>
</div>
		<footer class="pie-de-pagina text-center bg-dark text-white">
			<p class="m-0">&copy; Derechos Reservados SkySoft 2019</p>
		</footer>

	<script src="JQuery/jquery-3.4.1.min.js"></script>
	<script src="Popper/popper.min.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
?>