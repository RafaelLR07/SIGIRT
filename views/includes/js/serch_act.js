

var url_pend = window.location.search;
var tipos = url_pend.split("=");
tipos = tipos[tipos.length-1];

(scanner_pagle());

function scanner_pagle() {
	
	let medico_user = document.getElementById('us').value;
	console.log(tipos);
	if(tipos === "recha"){
			console.log(tipos);
			buscar_recha_medi();
		}
	else
	if(tipos === "activos" && medico_user != "Medico"){
		//buscar_datos();
		buscar_datos();
	}else
		if(medico_user === "Medico" && tipos != "pendientes"){
			buscar_medi();
		}
		else if(medico_user === "Medico" && tipos === "pendientes"){
			
			buscar_pend_medi();
		}

		

	else {
		buscar_datos2();
	}
}

$(document).on('keyup','#but_med_recha', function(){
		valor = $(this).val();
		if (valor != "") {
			buscar_recha_medi(valor);
		}else{
			buscar_recha_medi();
		}
 	
 });

function buscar_recha_medi(consulta){
	
	$.ajax({
		url: 'views/async.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {recha_med: consulta,
				status:"RECHA_med"},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos_recha").html(respuesta);
	             
	            
		}
	});

}

$(document).on('keyup','#but_med_pend', function(){
		valor = $(this).val();
		if (valor != "") {
			buscar_pend_medi(valor);
		}else{
			buscar_pend_medi();
		}
 	
 });

function buscar_pend_medi(consulta){
	
	$.ajax({
		url: 'views/async.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {pend_med: consulta,
				status:"PEND_med"},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos_pend").html(respuesta);
	             
	            
		}
	});

}

$(document).on('keyup','#but_med', function(){
		valor = $(this).val();
		if (valor != "") {
			buscar_medi(valor);
		}else{
			buscar_medi();
		}
 	
 });


$(document).on('keyup','#but_pend', function(){
		valor = $(this).val();
		if (valor != "") {
			buscar_datos2(valor);
		}else{
			buscar_datos2();
		}
 	
 });




function buscar_medi(consulta){
	
	$.ajax({
		url: 'views/async.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {but_med: consulta,
				status:"ACTIVO_med"},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos").html(respuesta);
	             
	            
		}
	});

}



function buscar_datos2(consulta){
	
	$.ajax({
		url: 'views/async.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta_pend: consulta,
				status:"PEND"},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos_pend").html(respuesta);
	             
	            
		}
	});

}


$(document).on('keyup','#but', function(){
		valor = $(this).val();
		$status = "ACTIVO"
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
		data: {consulta: consulta,
				status:"ACTIVO"},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos").html(respuesta);
	             
	            
		}
	});

}



