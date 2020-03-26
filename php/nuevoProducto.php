<?php
include_once('conexion.php');
if(isset($_POST['boton']) && $_POST['boton'] == 'Enviar'){
		if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
			$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
			$precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_FLOAT);
			$descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
			$categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
			
			$tipo = $_FILES['imagen']['type'];
			$tmp_name = $_FILES['imagen']['tmp_name'];
			$name = $_FILES['imagen']['name'];

			$nueva_path = "../img-productos/" . $name;
			move_uploaded_file($tmp_name, $nueva_path);
			$src = "img-productos/" . $name;
			$query = "INSERT INTO producto(nombre, precio, descripcion, imagen, categoria) values('$nombre', '$precio', '$descripcion', '$src', '$categoria');";
			


			$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
			if($rsQuery)
				header('location: ../nuevoProducto.php');
			else
				echo 'ERROR';
			
			/*if($rsQuery)
				echo 'ok';
			else
			echo 'error';*/

		}else{
			echo 'falta';
		}
}else{
	echo 'debe iniciar sesion';
}
?>