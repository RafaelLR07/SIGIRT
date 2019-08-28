

var url_pend = window.location.search;
var tipos = url_pend.split("=");
tipos = tipos[tipos.length-1];

(scanner_pagle());

function scanner_pagle() {
	
	if(tipos=="usuarios"){
		//funcion de busqueda de usuarios
		buscar_usuarios_grl();
		
	}else if (tipos=="medicos"){
		console.log("medicos");
	}
}

$(document).on('keyup','#busqueda', function(){
		valor = $(this).val();
		if (valor != "") {
			buscar_usuarios_grl(valor);
			
		}else{
			buscar_usuarios_grl();
		}
 	
 });

function buscar_usuarios_grl(consulta){
	
	$.ajax({
		url: 'views/async_users.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {users: consulta},
		success:function(respuesta){
			//		console.log("success");
	               $("#datos_grl").html(respuesta);
	             
	            
		}
	});

}