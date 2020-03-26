<?php
//Guarda la informacion de los menus
$menuCliente = Array('Inicio' => 'index.php', 'Producto' => 'productos.php?categoria=Todos&pagina=1', 'Carrito' => 'carritoCompra.php',);

$menuAdmin = Array('Inicio' => 'index.php', 'Producto' => 'productos.php?categoria=Todos&pagina=1', 'Reporte' => 'reportes.php', 'Pedidos' => 'pedidos.php', 'Cuentas' => 'cuentasAdmin.php', 'Nuevo Producto' => 'nuevoProducto.php',);

$menuVisitante = Array('Inicio' => 'index.php', 'Producto' => 'productos.php?categoria=Todos&pagina=1', 'Carrito' => 'carritoCompra.php',);

$menu = Array();
if(!empty($_SESSION['usuario'])){
	
	if($_SESSION['usuario'] === 'cliente'){
		$menu = $menuCliente;
	}else if($_SESSION['usuario'] === 'administrador'){
		$menu = $menuAdmin;
	}
}else{
	$menu = $menuVisitante;
}
?>


<nav class="navbar navbar-dark bg-dark navbar-expand-md">
		<div class="container-fluid">
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="menu-principal">
				<ol class="navbar-nav w-100">
					<?php 
					foreach ($menu as $key => $value){
					?>
					<li class="nav-item h4 w-100 text-left text-md-center"><a href="<?php echo $menu[$key] ?>" class="nav-link"><?php echo $key?></a></li>
					<?php }?>
				</ol>
			</div>
		</div>

	</nav>
	