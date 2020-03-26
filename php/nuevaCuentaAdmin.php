<?php
	include_once('conexion.php');
	//Optiene los datos por get
	$nombre = $_POST['nombre'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	//Query para comprobar que el email no este registrado en la db
	$queryComprobacion = "SELECT nombreUsuario FROM administrador where nombreUsuario = '$nombre'";

	$respuestaComprobacion = mysqli_query($conn, $queryComprobacion) or die(mysqli_query($conn));

	if(!mysqli_fetch_array($respuestaComprobacion)['nombreUsuario']){
		//query SQL de insertar datos del cliente
		$query = "INSERT INTO administrador(nombreUsuario, password) values('$nombre','$password')";

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