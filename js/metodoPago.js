window.addEventListener('load', iniciar);

var visa;
var master;
function iniciar(){
	let numTarjeta = document.getElementById('numTarjeta');
	numTarjeta.addEventListener('keypress', validarNumeros);
	numTarjeta.addEventListener('input', reconocerTarjeta);
	let codSeguridad = document.getElementById('codSeguridad');
	codSeguridad.addEventListener('keypress', validarNumeros);
	anioExpiracion = document.getElementById('anioExpiracion');
	anioExpiracion.addEventListener('keypress', validarAnio);
	visa = document.getElementById('visa');
	master = document.getElementById('master');

}

function validarNumeros(){
	let caracter = String.fromCharCode(event.charCode);
		if(!isNumberKey(event))
			event.preventDefault();
}


function isNumberKey(evt){
    let charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    	return false;
 
    return true;
}


function reconocerTarjeta(){
	if(this.value.length === 16){
		if(/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/.test(this.value)){//tarjeta visa
			visa.checked=true;
			console.log(visa.checked);
		}else
		visa.checked=false;

		if(/^5[1-5]\d{2}-?\d{4}-?\d{4}-?\d{4}$/.test(this.value)){
			master.checked = true;
		}
		else
			master.checked=false;
	}else{
		visa.checked = false;
		master.checked = false;
	}
}

function validarAnio(){
	
}


function validarPago(){
	let formulario = document.forms[0];
	let visa = document.getElementById('visa');
	let master = document.getElementById('master');
	if(formulario.checkValidity()){
		if(!(visa.checked || master.checked)){
			alert('Numero de la tarjeta no es Visa ni')
			event.preventDefault();
		}	
	}
}