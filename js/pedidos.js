function aprobar(idPedido){
	if(confirm('Desea aprobar el pedido?')){
		location.href = 'php/pedidos.php?idPedido='+idPedido+'&estado=aprobado';
	}
}

function despachar(idPedido){
	if(confirm('El pedido fue despachado')){
		location.href= "php/pedidos.php?idPedido="+idPedido+'&estado=despachado';
	}
}

function negar(idPedido){
	if(confirm('Desea negar el pedido?'))
		location.href = 'php/pedidos.php?idPedido='+idPedido+'&estado=negado';
}

function factura(srcfactura){
	console.log(srcfactura);
	location.href = 'mostrarFactura.php?factura='+srcfactura;
}