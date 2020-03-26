var solicitud;

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
	ajax.open('POST','php/validarAdmin.php',true);
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	ajax.send(parametros);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4){
			procesarRespuesta(this.responseText);
		}
	}
}

function getEmail(){
	let email = document.querySelector('input[name="nombreUsuario"]');
	return email.value;
}

function getPassword(){
	let password = document.querySelector('input[name="password"]');
	return password.value;
}

function obtenerParametros(){
	let formulario = document.forms.formulario;
	let nombreUsuario = formulario.nombreUsuario.value;
	let password = formulario.password.value;
	let cSesion = formulario.cSesion.checked;
	return 'nombreUsuario='+nombreUsuario+'&password='+password+'&cSesion='+cSesion;
}

function procesarRespuesta(estado){
	console.log(estado);
	if(estado === 'ok'){
		window.location = 'index.php';
	}else if(estado === 'error'){
		alert('Usuario o Cantraseña invalidos');
	}
}