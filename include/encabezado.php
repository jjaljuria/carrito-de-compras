
<header class="bg-dark container-fluid h-25">
	<div class="d-flex-sm text-center text-md-left h-100" >
		<!--Logo de la Empresa-->
		<h1 class="py-2 display-4"><a href="index.php" class="text-decoration-none">Super Tienda</a></h1>
		

		<?php 
		if(empty($_SESSION)){?>
		<div class="text-center text-md-right">
			<a href="login.html" class="align-self-center btn btn-outline-primary">Iniciar Sesión</a>
		</div>
		<?php }else{ ?>
		<div class="text-md-right">
			<p class="text-light h4"><?php echo $_SESSION['email'];?></p>
			<div class="btn-group">
						<button type="button" class="btn btn-primary">Opciónes</button>
						<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"></button>
						<div class="dropdown-menu">
						<a class="dropdown-item" href="include/cerrarSesion.php">Cerrar Sesión</a>
						<a class="dropdown-item" href="cambiarPassword.php">Cambiar Contraseña</a>
						</div>
				</div>	
			</div>

				
	
			

		<?php } ?>
	</div>
</header>
	
	<!--
		

-->