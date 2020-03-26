<?php
include_once('conexion.php');
$idProducto = $_POST['idProducto'];
$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
$precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT);
$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);

//Modificar

	

	if(!empty($_FILES['imagen']['name'])){
			$nuevo = '../img-productos/' . $_FILES['imagen']['name'];
			$img = 'img-productos/' . $_FILES['imagen']['name'];
			move_uploaded_file($_FILES['imagen']['tmp_name'], $nuevo);
			$query = "update producto set nombre='$nombre', descripcion='$descripcion' , imagen='$img', precio='$precio', categoria='$categoria' where idProducto='$idProducto'";
	}else{
			$query = "update producto set nombre='$nombre', descripcion='$descripcion' , precio='$precio', categoria='$categoria' where idProducto='$idProducto'";
	}
			
	$rsQUERY = mysqli_query($conn, $query) or die(mysqli_error($conn));
header('location: ../productos.php');
?>