window.addEventListener('load', iniciar);

function iniciar(){
	let formulario = document.forms[0];
	formulario.btn.addEventListener('click', validarCambio);
}

function validarCambio(){
	let formulario = document.forms[0];
	if(formulario.checkValidity()){
		event.preventDefault();
		let passwordVieja = document.getElementById('passwordVieja');
	ajax = new XMLHttpRequest();
	ajax.open('POST', 'php/cambiarPassword.php', true);
	ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	ajax.send('passwordVieja='+passwordVieja.value);
	ajax.onreadystatechange = function(){
		if(this.readyState === 4){
			procesarRespuesta(this.responseText );
		}
	}
	}
	

}

function validarFormulario(){
	let formulario = document.forms[0];
	let passwordNueva = formulario.passwordNueva.value;
	let password2 = formulario.password2.value;

	if(passwordNueva.value === password2.value){
		ajax = new XMLHttpRequest();
		ajax.open('POST', 'php/cambiarPassword.php', true);
		ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		ajax.send('passwordNueva='+passwordNueva);
		ajax.onreadystatechange = function(){
			if(this.readyState === 4){
				console.log(this.responseText);
				alert('Contraseña Cambiada exitosamente!!!');
				formulario.reset();
			}
		}
		
	}else{
		alert('La contraseña no coincide');
			password2.value = '';
	}
}


//procesa la respuesta recibida
function procesarRespuesta(estado){
	if(estado === 'ok'){
		validarFormulario();
	}else{
		alert('Contraseña incorrecta');
	}
}
