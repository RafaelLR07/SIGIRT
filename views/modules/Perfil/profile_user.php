<?php 
	
    
    $tipoUsuario = "";
    $name = "";

      if(!$_SESSION["validar"]){

         header("Location: index.php");

      }else{
        $name = $_SESSION['nom_usuario'];
        $tipoUsuario = $_SESSION['tipoUsuario'];
      }
	  $id = $_SESSION['ide'];
      $dates_controller = new user_get_Inf();
   




     if ($tipoUsuario=='Paciente') {
		$info_medic = $dates_controller->getProfile_info($id,'Paciente');
      	echo '<div class="container">
				<div class="perfil">
				<div class="person panel panel-danger">
			      <div class="panel-heading"><h4>Perfil de usuario</h4></div>
			      	<div class="panel-body">
			      		<div class="image_profile">
			      			<center><img src="views/includes/images/user.png" alt="image not foud"><center>
			      		</div>
			      		<div class="datos_user">
			      			<div class="personal_info">

				      			
			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Curp</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['curp'].'" readonly>
				                      </div>
				                    </div>  
			                    </div>

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">RFC</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['rfc'].'" readonly>
				                      </div>
				                    </div>  
			                    </div>	

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Ápellido Paterno</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['ape_pater'].'" readonly>
				                      </div>
				                    </div>
			                    </div>

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Apellido Materno</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['ape_mater'].'" readonly>
				                      </div>
				                    </div>
			                    </div>

			                    <div class="form-group row">
			                       <div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Nombre</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['nombre'].'" readonly>
				                      </div>
				                   </div>
			                    </div>


			                    <div class="form-group row">
			                       <div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Nombre de usuario</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['user'].'" readonly>
				                      </div>
				                   </div>
			                    </div>


			                    <div class="form-group row">
			                       <div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Correo</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['email'].'" readonly>
				                      </div>
				                   </div>
			                    </div>

 	
							</div>
			      		</div>
			      	</div>
			    </div>
	   	     </div>
	   	<div class="info">
			
				<div class="panel panel-danger">

			      	<div class="panel-heading"><h4>Tramites</h4></div>
			      	<div class="panel-body">
					 <center>
					  <div class="avances">
					  	<div class="title_avan">
					  	<a href="content.php?p=dashboard" class="link">
					  	 <h4 class="title_a" style="font-size:24px;">Avance de tramite de riesgo</h4>	
						 
					 </center>		
					  </div>	
					  

				   </div>
			
	      	</div>';

      	}else if($tipoUsuario == 'Medico'){
      		
      		$info_medic = $dates_controller->getProfile_info($id,'Medico');
      		echo '<div class="container">
			<div class="perfil">
				<div class="person panel panel-danger">
			      <div class="panel-heading"><h4>Perfil de usuario</h4></div>
			      	<div class="panel-body">
			      		<div class="image_profile">
			      			<center><img src="views/includes/images/user.png" alt="image not foud"><center>
			      		</div>
			      		<div class="datos_user">
			      			<div class="personal_info">

				      			<div class="form-group row">
				      			 <div class="dom">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg" >Cedula</label>
			                      	<div class="col-sm-7">
			                        	<input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['cedula'].'" readonly>
			                      	</div>
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Nombre</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['nombre'].'" readonly>
				                      </div>
				                    </div>  
			                    </div>

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Apellido Paterno</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['apellido_pat'].'" readonly>
				                      </div>
				                    </div>
			                    </div>	

			                    <div class="form-group row">
			                      <div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Ápellido Materno</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['apellido_mat'].'" readonly>
				                      </div>
				                    </div>
			                    </div>

			                    

			                    <div class="form-group row">
			                       <div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Correo</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['email'].'" readonly>
				                      </div>
				                    </div>
			                    </div>


 	
							</div>
			      		</div>
			      	</div>
			    </div>
		   	</div>
    	   	</div>';
      	} 
      		
      	else if($tipoUsuario == 'Usuario'||$tipoUsuario == 'Admin'){
      		$info_medic = $dates_controller->getProfile_info($id,$tipoUsuario);
      		echo '<div class="container">
			<div class="perfil">
				<div class="person panel panel-danger">
			      <div class="panel-heading"><h4>Perfil de usuario</h4></div>
			      	<div class="panel-body">
			      		<div class="image_profile">
			      			<center><img src="views/includes/images/user.png" alt="image not foud"><center>
			      		</div>
			      		<div class="datos_user">
			      			<div class="personal_info">

				      			<div class="form-group row">
				      			 <div class="dom">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg" >Nombre de usuario</label>
			                      	<div class="col-sm-7">
			                        	<input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['nombre'].'" readonly>
			                      	</div>
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                    	<div class="dom">
				                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Correo</label>
				                      <div class="col-sm-7">
				                        <input name="no_paciente" type="text" class="form-control" id="Paciente" value="'.$info_medic['email'].'" readonly>
				                      </div>
				                    </div>  
			                    </div>

			                   


 	
							</div>
			      		</div>
			      	</div>
			    </div>
		   	</div>
    	   	</div>';
      	}	


   ?>



	</div>
	
	<br><br><br>
 