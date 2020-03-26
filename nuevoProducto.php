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
	<main class="h-75">
		<section class="h-100">
			<?php
			
			if(isset($_GET['btn'])){
			$btn = $_GET['btn'];
			$idProducto = $_GET['idProducto'];
			$queryModificar = "SELECT * FROM producto WHERE idProducto='$idProducto'";
			$rsQuery = mysqli_query($conn, $queryModificar) or die(mysqli_error($conn));

			$producto = mysqli_fetch_array($rsQuery);
				
			?> 
				<form method="POST" action="php/modificarProducto.php" class="col-md-4 text-center mx-auto bg-secondary py-4 rounded my-5" name="formNuevoProducto" enctype="multipart/form-data" x>
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" name="nombre" placeholder="Nombre del Producto" class="form-control" maxlength="50" required value="<?php echo $producto['nombre'];?>">
			</div>
			<div class="form-group">

					<label for="categoria">Categoria:</label>				<?php $categoria = $producto['categoria'];
					
					?>
					<select class="custom-select" name="categoria" required>
						<option value="Autos">Autos</option>
						<option value="Computadoras">Computadoras</option>
						<option value="Electrodomesticos">Electrodomesticos</option>
						<option value="Ropa">Ropa</option>
						<option value="Telefonos">Telefonos</option>
						<option value="Otros">Otros</option>
					</select>
				</div>

			<div class="form-group">
				<label for="imagen">Imagen:</label>
				<input type="file" name="imagen" class="form-control" accept="image/*" value="<?php echo $producto['imagen']; ?>">
			</div>
			<div class="form-group">
				<label for="precio">Precio:</label>
				<input type="number" name="precio" min="0" class="form-control" required value="<?php echo $producto['precio'];?>">
			</div>
			<div class="form-group">
				<label for="nombre">Descripción:</label>
				<textarea name="descripcion" placeholder="Descripción del Producto" class="form-control" row="5" required><?php echo $producto['descripcion'];?></textarea>
			</div>
			<input type="hidden" value="<?php echo $idProducto?>" name="idProducto">
			<input type="submit" class="btn btn-primary" name="btn" value="Modificar" id="btnEnviar">		
		</form>	

			<?php
			}else{?>
<form method="POST" action="php/nuevoProducto.php" class="col-md-4 text-center mx-auto bg-secondary py-4 rounded my-5" name="formNuevoProducto" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" placeholder="Nombre del Producto" class="form-control" maxlength="50" required>
				</div>
				<div class="form-group">
					<label for="categoria">Categoria:</label>
					<select class="custom-select" name="categoria" required>
						<option value="Autos">Autos</option>
						<option value="Computadoras">Computadoras</option>
						<option value="Electrodomesticos">Electrodomesticos</option>
						<option value="Ropa">Ropa</option>
						<option value="Telefonos">Telefonos</option>
						<option value="Otros" selected>Otros</option>
					</select>
				</div>
				<div class="form-group">
					<label for="imagen">Imagen:</label>
					<input type="file" name="imagen" class="form-control" required accept="image/*">
				</div>
				<div class="form-group">
					<label for="precio">Precio:</label>
					<input type="number" name="precio" min="0" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="nombre">Descripción:</label>
					<textarea name="descripcion" placeholder="Descripción del Producto" class="form-control" row="5" required></textarea>
				</div>
				<input type="submit" class="btn btn-primary" name="boton" value="Enviar" id="btnEnviar">	</form>

			<?php
			}?>
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