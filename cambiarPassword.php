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
	<script src="js/cambiarPassword.js"></script>
</head>
<body id="bienvenida">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>

	<main>
		<section>
		<form action="" method="post" class="col-md-4 text-center mx-auto bg-secondary p-4 rounded my-5" name="formCambiarPassword">
				<div class="form-group">
					<label for="passwordVieja">Contraseña:</label>
					<input type="password" maxlength="100" name="passwordVieja" class="form-control" placeholder="Contraseña actual" required id="passwordVieja">
				</div>
				<div class="form-group">
					<label for="passwordNueva">Contraseña Nueva:</label>
					<input type="password" maxlength="100" name="passwordNueva" class="form-control" placeholder="Contraseña nueva" required>
				</div>
				<div class="form-group">
					<label for="password2">Confirmar Contraseña:</label>
					<input type="password" maxlength="100" name="password2" class="form-control" placeholder="Confirmar Contraseña" required>
				</div>
				<button type="submit" class="btn btn-primary btn-lg" name="btn" id="btn">Enviar</button>
			</form>
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