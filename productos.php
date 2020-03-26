<?php
session_start();
include_once('php/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
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
	<script src="js/producto.js"></script>
</head>
<body>
<div class="contenedor min-vh-100">
<?php include_once('include/encabezado.php'); ?>
<?php include_once('include/menus.php');?>
<main class="">	
	


		<div class="container-fluid">
		<div class="row">
		<aside class="p-4 bg-secondary menu-lateral col-12 col-md-2 text-break text-center" id="menu-lateral">
		
			<button type="button" onclick="replegar()" class="float-left btn btn-outline-light bg-dark position-absolute" id="boton-replegar" >&laquo;</button>
			
			<p class="h2 border-bottom">Categorias<p>
			<div class="text-white" id="categorias">
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Todos</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Autos</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Computadoras</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Electrodomesticos</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Ropa</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Telefonos</button>
				<button class="btn btn-block shadow-none border-bottom" onclick="buscarPorCategoria(this)">Otros</button>
				
			</div>	

		</aside>

		<section class="col-12 col-md-10" >
			
			<div class="row justify-content-center">
				<form action="productos.php" method="get" name="formBuscar" class="col-12 col-md-8 mt-3">
				<div class="input-group ">
					<input type="text" class="form-control rounded-left" placeholder="" aria-label="" aria-describedby="basic-addon1" name="buscar">
					<input type="hidden" name="pagina" value="1">
					<div class="input-group-append">
						<button class="btn btn-primary" type="submit" name="btn" value="buscar">Buscar</button>
					</div>
				
				</div></form>

			</div>
			
			<div class="row">
				<button type="button" onclick="desplegar()" id="boton-desplegar" class="col-4 btn btn-primary m-3">Categorias &laquo;</button>
			</div>

			<div class="row">		
				
			<?php
				include_once('php/conexion.php');
				
				$pagina = (filter_var($_GET['pagina'], FILTER_SANITIZE_NUMBER_INT) - 1) * 10;
				if(isset($_GET['buscar']) && !empty($_GET['buscar'])){

					$buscar = $_GET['buscar'];
					$qselect = "SELECT * FROM producto WHERE nombre LIKE '%$buscar%' LIMIT $pagina , 10";

					//Query para obtener el numero de paginas
					$queryPaginacion = "SELECT COUNT(*) FROM producto WHERE nombre LIKE '%$buscar%' ";

				}else{
					
					if(isset($_GET['categoria']) && !empty($_GET['categoria'])){

						
						
						if($_GET['categoria'] === 'Todos'){
							$qselect = "SELECT idProducto, nombre, descripcion, precio, imagen, categoria FROM producto LIMIT $pagina, 10";

							//Query para obtener el numero de paginas
							$queryPaginacion = "SELECT COUNT(*) FROM producto";
							
						}else{
							$categoria = filter_var($_GET['categoria'], FILTER_SANITIZE_STRING);
							$qselect = "SELECT idProducto, nombre, descripcion, precio, imagen, categoria FROM producto WHERE categoria = '$categoria' LIMIT $pagina, 10";

							//Query para obtener el numero de paginas
							$queryPaginacion = "SELECT COUNT(*) FROM producto WHERE categoria = '$categoria'";
						}
					}else{
						$qselect = "SELECT idProducto, nombre, descripcion, precio, imagen, categoria FROM producto";

						//Query para obtener el numero de paginas
						$queryPaginacion = "SELECT COUNT(*) FROM producto";
					}
				}
				
				$filas = mysqli_query($conn, $queryPaginacion) or die(mysqli_error($conn));
				$a = mysqli_fetch_row($filas);
				$paginas = ceil($a[0] / 10);
				$rsquery = mysqli_query($conn, $qselect) or die(mysqli_error($conn));
				mysqli_free_result($filas);

				$cont = 1;
				
				while($filaQselect = mysqli_fetch_array($rsquery)){
					
					if(!empty($_SESSION)){

					
					if($_SESSION['usuario'] === 'cliente'){

				?>
					<article class="col-12 col-md-3 text-center my-3">
					<a href="infoProducto.php" onclick="info(<?php echo $filaQselect['idProducto']; ?>);" class="card-link">
						<div class="card">
  							<img class="card-img-top" src="<?php echo $filaQselect['imagen']; ?>" alt="Card image cap">
  							<div class="card-body">
    							<h4 class="card-title"><?php echo $filaQselect['nombre'];?></h4>
    							<p class="card-text border-top">
									Precio: <?php echo $filaQselect['precio']?> $
    							</p>
  							</div>
						</div>
					</a>
					</article>
					
					
				<?php
					}else if($_SESSION['usuario'] === 'administrador'){
						?>
						
						<article class="col-12 col-md-3 text-center my-3">
							<div class="card"><a data-toggle="modal" data-target="#Modal<?php echo $cont;?>">
  							<img class="card-img-top" src="<?php echo $filaQselect['imagen']; ?>" alt="Card image cap"></a>
  							<div class="card-body">
    							<h4 class="card-title"><?php echo $filaQselect['nombre'];?></h4>
    							<p class="card-text border-top">
									Precio: <?php echo $filaQselect['precio']?> $
    							</p>
								<button class="btn btn-primary" onclick="modificar(<?php echo $filaQselect['idProducto']?>)">Modificar</button>
								<button class="btn btn-danger" onclick="eliminar(<?php echo $filaQselect['idProducto']?>)">Eliminar</button>
  								</div>
							</div>
					</article>


					<!-- Modal -->
					<div class="modal" id="Modal<?php echo $cont++;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenteredLabel">Detalles</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							Nombre: <?php echo $filaQselect['nombre']?><br>
							Categoria: <?php echo $filaQselect['categoria']?><br>
							Descripción: <?php echo $filaQselect['descripcion']?><br>
							Precio: <?php echo $filaQselect['precio']?>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
						</div>
						</div>
					</div>
					</div>

							
					
					<?php
					}
				} else{ ?>
				<article class="col-12 col-md-3 text-center my-3">
					<a href="infoProducto.php" onclick="info(<?php echo $filaQselect['idProducto']; ?>);" class="card-link">
						<div class="card">
  							<img class="card-img-top" src="<?php echo $filaQselect['imagen']; ?>" alt="Card image cap">
  							<div class="card-body">
    							<h4 class="card-title"><?php echo $filaQselect['nombre'];?></h4>
    							<p class="card-text border-top">
									Precio: <?php echo $filaQselect['precio']?> $
    							</p>
  							</div>
						</div>
					</a>
					</article>
				<?php } 
			} 
			mysqli_free_result($rsquery);
			?>
				
			</div>
			<?php if($paginas > 1){?>
				<nav aria-label="Page navigation example">
 					<ul class="pagination justify-content-center">
					<li class="page-item <?php if($_GET['pagina'] === '1'){echo 'disabled';} ?>">
      					<a class="page-link" href="productos.php?categoria=Todos&pagina=<?php echo $_GET['pagina']-1; ?>"" aria-label="Previous">
        				<span aria-hidden="true">&laquo;</span>
        				<span class="sr-only">Previous</span>
      					</a>
   					 </li>
					<?php for ($i=1; $i <= $paginas; $i++) { ?>
					<li class="page-item <?php if($_GET['pagina'] == $i) echo 'disabled';?>"><a class="page-link" href="productos.php?categoria=Todos&pagina=<?php echo $i; ?>"><?php echo $i;?></a></li>
					

				<?php } ?>
					<li class="page-item <?php if($_GET['pagina'] == $paginas) echo 'disabled';?>">
      					<a class="page-link" href="productos.php?categoria=Todos&pagina=<?php echo $_GET['pagina']+1; ?>"" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
						<span class="sr-only">Next</span>
      					</a>
    				</li>
  					</ul>
				</nav>
			<?php } ?>
		</section>
	</main>

</div>
</div>
</div>
	<footer class="w-100 bg-dark text-light text-center" style="display: block;">
		&copy; Derechos Reservados SkySoft 2019
	</footer>
</body>
</html>