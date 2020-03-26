window.addEventListener('load', iniciar);

function iniciar(){
	let nombreUsuario = document.getElementById('nombreUsuario');
	nombreUsuario.addEventListener('keypress', validarNombre);
	formNuevoAdmin.btn.addEventListener('click', validarFormulario);
}

function validarNombre(evt){
	let charCode = (evt.which) ? evt.which : event.keyCode;
	console.log(String.fromCharCode(charCode));
	let valor = /\s/.test(String.fromCharCode(charCode));
	console.log(valor);
	if(valor)
		evt.preventDefault();
}

function validarFormulario(){
	let formulario = document.forms.formNuevoAdmin;
	let password = formulario.password;
	let password2 = formulario.password2;
	if(formulario.checkValidity()){
		event.preventDefault();
		if(password.value === password2.value){
			let url = obtenerParametros();
			validarRegistro(url);
		}else{
			alert('La contraseña no coincide');
			password2.value = '';
		}
	}
}

function obtenerParametros(){
	let formulario = document.forms.formNuevoAdmin;
	let nombre = formulario.nombreUsuario.value;
	let password = formulario.password.value;
	return 'nombreUsurio='+nombre+'&password='+password;
}


function validarRegistro(parametros){
	let ajax = new XMLHttpRequest();
	ajax.open('POST', 'php/nuevaCuentaAdmin.php', true);
	ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	ajax.send(parametros);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4){
			procesarRespuestaNuevo(this.responseText);
		}
	}
}

//procesa la respuesta recibida
function procesarRespuestaNuevo(estado){
	console.log(estado);
	if(estado === 'ok'){
		alert('Administrador registrado con exito');
		let formulario = document.forms.formNuevoAdmin;
		formulario.reset();
	}else if(estado === 'repetido'){
		alert('El nombre de usuario ya esta registrado');
	}else{
		alert('Uups Hubo un error en el registro');
	}
}



function borrarCuenta(idAdmin){
	console.log(nombreUsuario);

	if(confirm('¿Seguro que desea borrar esta cuenta?')){
		let password = prompt('Ingrese su contraseña:');
		let nombreUsuario = document.getElementById('usuario').textContent;
		let ajax = new XMLHttpRequest();
		ajax.open('POST', 'php/validarAdmin.php', true);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		ajax.send('nombreUsuario='+nombreUsuario+'&password='+password);
		ajax.onreadystatechange = function(){
			if(this.readyState === 4){
				procesarRespuestaBorrar(this.responseText);
			}
		}	
	}
}

function procesarRespuestaBorrar(estado){
	console.log(estado);
	if(estado === 'ok'){
		window.location = 'php/borrarCuentaAdmin.php';
	}else if(estado === 'error'){
		alert('Cantraseña invalidos');
	}
}