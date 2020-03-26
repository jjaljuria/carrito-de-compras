window.addEventListener('load', iniciar);

function iniciar(){
	let btn = document.getElementById('btnEnviar');
	btn.addEventListener('click', iniciarSesion);
}

function iniciarSesion(){
	let formulario = document.forms.formulario;
	if(formulario.checkValidity()){
		event.preventDefault();
		let parametros = obtenerParametros();
		validarUsuario(parametros);
	}
}
function validarUsuario(parametros){

	let ajax = new XMLHttpRequest();
	ajax.open('POST','php/recuperarPassword.php',true);
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	ajax.send(parametros);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4){
			procesarRespuesta(this.responseText);
		}
	}
}

function obtenerParametros(){
	let formulario = document.forms.formulario;
	let email = formulario.email.value;
	return 'email='+email;
}

function procesarRespuesta(estado){
	console.log(estado);
	if(estado === 'ok'){
		window.location = 'nuevaPassword.html';
	}else if(estado === 'error'){
		alert('Correo no esta registrado');
	}
}