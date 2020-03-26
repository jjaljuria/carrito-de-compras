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
	<script src="js/metodoPago.js"></script>
</head>
<body id="bienvenida">
<div class="contenedor min-vh-100">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>
	<main>
		<section >
			<div class="container">
			
			<form id="formPago" method="post" action="php/metodoPago.php" class="my-5  text-center" name="formPago">

				<div class="row mb-4">
					<h1 class=" col-12 text-center display-4">Pago con Tarjeta de Credito</h1>
				</div>

				<div class="row justify-content-md-center">

					<div class="form-group col-12 col-md-4" >
						<label for="titular"><h2>Nombre del Titular</h2></label>
						<input type="text" class="form-control" name="titular" required>
					</div>

					<div class="form-group col-12 col-md-4">
						<label for="numTarjeta"><h2>Número de Tarjeta</h2></label>
						<input type="text" class="form-control" name="numTarjeta" id="numTarjeta" maxlength="16"  required>
					</div>

				</div>
				<div class="row justify-content-center">
				
					<div class="form-group col-12 col-md-4">

						<label class="h2">Fecha de Expiración</label>
						<div class="d-flex">
							<input type="text" class="form-control mr-1" name="mesExpiracion" class="" placeholder="MES" id="mesExpiracion" required>
		
							<input type="text" class="form-control" name="anioExpiracion" class="col-md-1" placeholder="AÑO" id="anioExpiracion" maxlength="4" required>
						</div>

					</div>
					
					<div class="form-group col-12  col-md-4">

						<label for="codSeguridad" class="h2">Código de Seguridad</label>
						<input type="text" class="form-control text-center" name="codSeguridad" id="codSeguridad" maxlength="3" placeholder="3 dígitos" required>
					</div>
				</div>
					
				
				<div class="row">

					<div class="col-6 col-md-1 offset-md-8">
						<label class="form-check-inline "><img src="img/visa.jpg" width="50px" height="60px"><input type="radio" class="" name="tarjeta" id="visa" disabled  required></label>
					</div>

					<div class="col-6 col-md-1">
						<label class="form-check-inline"><img src="img/master.jpg" width="50px" height="60px"><input type="radio" class="" name="tarjeta" disabled id="master" required></label>
					</div>
				</div>

				<div class="row justify-content-center">
					<div class="col-12"></div>
					<button type="submit" class="btn btn-danger btn-lg" onclick="validarPago()">Pagar</button>
				</div>
			</form>
			</div>
		</section>
	</main>
	</div>
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