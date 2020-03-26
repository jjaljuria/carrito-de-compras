window.addEventListener('load', iniciar);

function iniciar(){
	let btn = document.getElementById('btnCerrarSesion');
	btn.addEventListener('click', cerrarSesion);
}

function cerrarSesion(){
	window.location = 'include/cerrarSesion.php';
}

