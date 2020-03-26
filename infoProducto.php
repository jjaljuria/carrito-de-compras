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
	
	<script src="JQuery/jquery-3.4.1.min.js"></script>
	<script src="Popper/popper.min.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
	<script src="js/infoProducto.js"></script>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body id="bienvenida" class="">
<div class="contenedor min-vh-100">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>
	<main class="">
		<section class="my-3 mx-1 ">
			<div class="container-fluid">
			<div class="row">
			<?php
				$idProducto = $_GET['ID'];
				$query = "SELECT * FROM producto WHERE idProducto='$idProducto'";
				$rsQuery = mysqli_query($conn, $query) or die(mysqli_error($conn));
				$producto = mysqli_fetch_array($rsQuery); 
			?>
			<div class="col-12 col-md-6">
				<img src="<?php echo $producto['imagen'];?>" class="img-fluid">
			</div>
			<div class="col-12 col-md-6 text-md-center mt-4">
				<b>Nombre:</b><br>
				<?php echo $producto['nombre'];?><br>
				<b>Precio:</b><br>
				<?php echo $producto['precio'];?><br>
				<b>Descripcion:</b><br>
				<?php echo $producto['descripcion'];?><br>
			</div>
			</div>

			<div class="row mt-4">
				

				<div class="col-12 col-md-1">
					<label for="cantidad" class="">Cantidad: 
					<input type="number" name="cantidad" id="cantidad" class="form-control" class="col-sm-1" step="1" min="1" value="1" max="99" style="width: 60px;">
					</label>
				</div>
				
			</div>

			<div class="row">
				<div class="col-12 col-md-12">
					<button type="button" class="btn btn-warning btn" <?php if(!empty($_SESSION)){
						echo 'onclick="enviarCarrito(' . $_SESSION['idCliente'] . ',' . $idProducto . ')"' ;}else{
						echo 'data-toggle="modal" data-target="#exampleModalCentered"';
						} 
							?> >Carrito</button>
						
									
				</div>
			</div>
			</div>

			<!-- Modal -->
<div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Debe Iniciar Sesion para Comprar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
	  	Debe Iniciar Sesion para Compra</center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary" onclick="iniciarSesion()">Iniciar Sesión</button>
      </div>
    </div>
  </div>
</div>
		</section>

	</main>
	</div>
	<footer class="w-100 bg-dark text-light text-center mt-4">
		&copy; Derechos Reservados SkySoft 2019
	</footer>
	
</body>
</html>