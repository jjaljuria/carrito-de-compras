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