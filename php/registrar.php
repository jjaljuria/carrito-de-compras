<?php
	include_once('conexion.php');
	//Optiene los datos por get
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = strtolower($_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);/*
	$preguntaSecreta = $_POST['preguntaSecreta'];
	$respuestaSecreta = $_POST['respuestaSecreta'];*/

	//Query para comprobar que el email no este registrado en la db
	$queryComprobacion = "SELECT email FROM cliente where email = '$email'";

	$respuestaComprobacion = mysqli_query($conn, $queryComprobacion) or die(mysqli_query($conn));

	if(!mysqli_fetch_array($respuestaComprobacion)['email']){
		//query SQL de insertar datos del cliente
		$query = "INSERT INTO cliente values(null,'$nombre','$apellido','$email','$password')";

		//hace la consulta a la db
		$respuesta = mysqli_query($conn, $query) or die(mysqli_error($conn));

		if($respuesta){
			echo "ok";
		}else{
			echo "error";
		}
	}else{
		echo "repetido";
	}

?>