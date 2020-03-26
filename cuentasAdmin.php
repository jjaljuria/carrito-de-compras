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
	<script src="include/cerrarSession.js"></script>
	<script src="js/cuentasAdmin.js"></script>
</head>
<body id="bienvenida">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>

	<main class="min-vh-100">
		<section>
		<form method="post" class="col-md-4 text-center mx-auto bg-secondary p-4 rounded my-5" name="formNuevoAdmin">
				<div class="form-group">
					<label for="nombreUsuario">Nombre de Usuario:</label>
					<input type="text" maxlength="100" name="nombreUsuario" class="form-control" placeholder="Nombre de Usuario" required id="nombreUsuario">
				</div>
				<div class="form-group">
					<label for="password">Contraseña:</label>
					<input type="password" maxlength="100" name="password" class="form-control" placeholder="Contraseña" required>
				</div>
				<div class="form-group">
					<label for="password2">Confirmar Contraseña:</label>
					<input type="password" maxlength="100" name="password2" class="form-control" placeholder="Confirmar Contraseña" required>
				</div>
				<button type="submit" class="btn btn-primary btn-lg" name="btn" id="btn">Enviar</button>
			</form>
		</section>
		<section class="text-center">
			<h1>Borrar Actual Cuenta de Administrador</h1>
			<button class="btn btn-danger" onclick="borrarCuenta(<?php echo $_SESSION['idAdmin']; ?>)">Borrar Cuenta</button>
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