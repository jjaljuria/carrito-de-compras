function iniciar(){
	let formulario = document.forms.formulario;
	formulario.btn.addEventListener('click', validarFormulario);
}

function validarFormulario(){
	let formulario = document.forms.formulario;
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

//obtiene los datos del usuario del formulario y los pasa como objeto
function obtenerParametros(){
	let formulario = document.forms.formulario;
	let nombre = formulario.nombre.value;
	let apellido = formulario.apellido.value;
	let email = formulario.email.value;
	let password = formulario.password.value;/*
	let preguntaSecreta = formulario = formulario.preguntaSecreta.value;
	console.log(preguntaSecreta);
	let respuestaSecreata = formulario.respuestaSecreata.value;*/
	let parametros = 'nombre='+nombre+'&apellido='+apellido+'&email='+email+'&password='+password/*+'&preguntaSecreta='+pregunntaSecreta+'&respuestaSecreta='+respuestaSecreata*/;
	return parametros;
}


function validarRegistro(parametros){
	let ajax = new XMLHttpRequest();
	ajax.open('POST', 'php/registrar.php', true);
	ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
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
		alert('Cliente registrado con exito');
		let formulario = document.forms.formulario;
		formulario.reset();
		window.location = 'index.html';
	}else if(estado === 'repetido'){
		alert('El email ya esta registrado');
	}else{
		alert('Uups Hubo un error en el registro');
	}
}

window.addEventListener('load', iniciar);