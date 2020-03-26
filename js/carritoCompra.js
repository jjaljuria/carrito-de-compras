var nodo;
function sacarCarrito(idCarrito, btn){
	 llamadaAjax(idCarrito);
	 nodo = btn.parentNode.parentNode;
}

function llamadaAjax(idCarrito){
	let ajax = new XMLHttpRequest();
	ajax.open('GET', 'php/sacarCarrito.php?idCarrito='+idCarrito, true);
	ajax.send(null);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4)
			procesarRespuesta(this.responseText, nodo);
	}
}

function procesarRespuesta(respuesta){
	console.log(respuesta);
	if(respuesta === 'ok'){
		nodo.remove();
	}else
		alert('Error');
}

function metodoPago(cont){

	if(verificarCarritoVacio()){
		location.href = 'metodoPago.php';
	}else{
		alert('El carrito esta vacío');
	}
	
}

function verificarCarritoVacio(){
	let cards = document.getElementsByClassName('card');
	if(cards.length > 0)
		return true;
		
	return false;
}