function enviarCarrito(idCliente, idProducto){
	let cantidad= document.getElementById('cantidad');
	let url = 'php/infoProducto.php?idCliente='+idCliente+'&idProducto='+idProducto+'&cantidad='+cantidad.value;
	location.href = url;
}

function iniciarSesion(){
	location.href = 'login.html';
}