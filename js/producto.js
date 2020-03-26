function info(id){
	event.preventDefault();
	let url = "infoProducto.php?ID="+id;
	location.href=url;
}

function modificar(idProducto){
	if(confirm('Seguro que desea modificar?')){
		location.href = 'nuevoProducto.php?idProducto='+idProducto+'&btn=modificar';
	}

}

function eliminar(idProducto){
	if(confirm('Seguro que desea eliminar')){
		location.href = 'php/productos.php?idProducto='+idProducto+'&btn=eliminar';
	}
}

var activado = false;
function desplegar(){
	let menuLateral = document.getElementById('menu-lateral');
	if(activado){
		menuLateral.style = "transform: translateX(-100%);";
		document.getElementsByTagName("body")[0].style.overflowY = "auto";
		activado = false;
	}else{
		
		menuLateral.style = "transform: translateX(0px);"
		document.getElementsByTagName("body")[0].style.overflowY = "hidden";
		activado = true;
	}
}

function replegar(){
	let menuLateral = document.getElementById('menu-lateral');
	if(activado){
		menuLateral.style = "transform: translateX(-100%);";
		document.getElementsByTagName("body")[0].style.overflowY = "auto";
		activado = false;
	}else{
		
		menuLateral.style = "transform: translateX(0px);"
		document.getElementsByTagName("body")[0].style.overflowY = "hidden";
		activado = true;
	}
}

function buscarPorCategoria(parametro){
	location.href = "productos.php?categoria="+ parametro.textContent+"&pagina=1";
}