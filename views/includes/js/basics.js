
(scann_grl());
function scann_grl() {
  var url_pend = window.location.search;
  var tipos = url_pend.split("=");
  tipos = tipos[tipos.length-1];
  scann_tipo_user2(tipos);
}

function validar_form_grl() {
  $('.alert').remove();
  let pass = document.getElementById("pass").value;
  let rep_pass = document.getElementById("rep_pass").value;
  let tipo = document.getElementById("tipo").value;
    
  if(tipo==0){
     $('.formulario').before('<div class="alert alert-danger"> ' +
               "Debe elegir un usuario" + 
               ' </div>');

      return false;

  }

    if(validarPass(pass,rep_pass) == false){
       $('.formulario').before('<div class="alert alert-danger"> ' +
               "La contraseña debe coincidir" + 
               ' </div>');

      return false;
    }else{
      return true;
    }

}


function scann_tipo_user2(tipo) {
  
  switch(tipo){
    case "Admin":
       $('#medic').fadeOut();
       $('#admin').fadeIn();
      break;
    case "Usuario":
      $('#medic').fadeOut();
      $('#admin').fadeIn();
      console.log("empleado");
      break;
    case "Medico":
      $('#admin').fadeOut();
      $('#medic').fadeIn();
      console.log("medico");
      break;

    case "Paciente":
      $('#admin').fadeOut();
      $('#medic').fadeOut();
      console.log("medico");
      break;
    
    
    default:
      return false;
      break;

  }
}

function scann_tipo_user(tipo) {
  
  switch(tipo){
    case "Admin":
       $('#medic').fadeOut();
       $('#admin').fadeIn();
      break;
    case "Usuario":
      $('#medic').fadeOut();
      $('#admin').fadeIn();
      console.log("empleado");
      break;
    case "Medico":
      $('#admin').fadeOut();
      $('#medic').fadeIn();
      console.log("medico");
      break;

    
    default:
      return false;
      break;

  }
}




function validar_form() {
	$('.alert').remove();
	let pass = document.getElementById("pass").value;
  	let rep_pass = document.getElementById("rep_pass").value;
  	console.log(pass,rep_pass);
  	if(validarPass(pass,rep_pass) == false){
  		 $('.formulario').before('<div class="alert alert-danger"> ' +
  		 				 "La contraseña debe coincidir" + 
  		 				 ' </div>');

  		return false;
  	}else{
  		return true;
  	}

}

function validarPass(pass, rep_pass) {
	
  	if(pass === rep_pass){
  		return true;
  	}else{
  		return false;
  	}

 
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
