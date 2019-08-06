
$(buscar_datos());

$(document).on('keyup','#but', function(){
		valor = $(this).val();

		if (valor != "") {
			buscar_datos(valor);
		}else{
			buscar_datos();
		}
 	
 });


function buscar_datos(consulta){
	$.ajax({
		url: 'views/async.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta:consulta},
		success:function(respuesta){
			
	               $("#datos").html(respuesta);
	            
		}
	});

}

       

function mostrar_inactivos() {

	var elemento = document.getElementById("tabla_inactivos");
   	elemento.style.display = 'block';
   	var elemento2 = document.getElementById("tabla_activos");
   	elemento.style.display = 'none';

		
}

function mostrar_activos() {

	var elemento = document.getElementById("tabla_inactivos");
   	elemento.style.display = 'none';
   	var elemento2 = document.getElementById("tabla_activos");
   	elemento2.style.display = 'block';
}


function calculo_lic() {
	let fecha_ini = document.getElementById('fech_ini').value;
	//let fecha_fin = getElementsById('fech_fin');
	alert(fech_ini);

}



function mayus(palabra) {
	palabra.value = palabra.value.toUpperCase();
}
