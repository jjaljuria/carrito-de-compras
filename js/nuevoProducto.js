function iniciar(){
	let formulario = document.forms.formNuevoProducto;
	formulario.btnEnviar.addEventListener('click', validarFormulario);
}

function validarFormulario(){
	let formulario = document.forms.formNuevoProducto;
	if(formulario.checkValidity()){
		event.preventDefault();
		let url = obtenerParametros();
		validarRegistro(url);
	}
}

//obtiene los datos del usuario del formulario y los pasa como objeto
function obtenerParametros(){
	let input = document.createElement('input');
	input.type = 'file';
	input.files;
	let formulario = document.forms.formNuevoProducto;
	let nombre = formulario.nombre.value;
	let imagen = formulario.imagen.files;
	console.log(imagen);
	let precio = formulario.precio.value;
	let descripcion = formulario.descripcion.value;
	let categoria = formulario.categoria.value;
	let parametros = 'nombre='+nombre+'&imagen='+imagen+'&precio='+precio+'&descripcion='+descripcion+'&categoria='+categoria+'&boton=Ingresar';
	return parametros;
}


function validarRegistro(parametros){
	let ajax = new XMLHttpRequest();
	ajax.open('POST', 'php/nuevoProducto.php', true);
	ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	alert(parametros);
	ajax.send(parametros);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4){
			procesarRespuesta(this.responseText);
		}
	}
}

//procesa la respuesta recibida
function procesarRespuesta(estado){
	console.log(estado);
	if(estado === 'ok'){
		alert('Producto Registrado');
		let formulario = document.forms.formNuevoProducto;
		formulario.reset();
	}else if(estado === 'error'){
		alert('Uups Hubo un error en el registro');
	}
}

window.addEventListener('load', iniciar);