<?php 
	
    
    $tipoUsuario = "";
    $name = "";

      if(!$_SESSION["validar"]){

         header("Location: index.php");

      }else{
        $name = $_SESSION['nom_usuario'];
        $tipoUsuario = $_SESSION['tipoUsuario'];
      }

      $dates_controller = new user_get_Inf();
      $info_medic = $dates_controller->getProfile_infoM();




     if ($tipoUsuario=='Paciente') {
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
				      			
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg" >Folio</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Curp</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">RFC</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Ápellido Paterno</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Apellido Materno</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Nombre</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
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
					  	 <h4 class="title_a">Avance de tramite folio</h4>	
						 <h4 class="subtitle">fecha: dd/mm/aaaa</h4>
						 </a>	
						</div><br>
						<div class="grafica-avan">
						 <input type="text" value="20" class="dial">
						</div>	
					 </center>		
					  </div>	
					  

				   </div>
			
	      	</div>';

      	}else if($tipoUsuario == 'Medico'){

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
				      			
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg" >Cedula</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Nombre</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Apellido Paterno</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>	

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Ápellido Materno</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>

			                    <div class="form-group row">
			                      <label for="Paciente" class="col-sm-3 col-form-label col-form-label-lg">Clave</label>
			                      <div class="col-sm-7">
			                        <input name="no_paciente" type="text" class="form-control" id="Paciente">
			                      </div>
			                    </div>


 	
							</div>
			      		</div>
			      	</div>
			    </div>
	   	</div>


	     	
      	</div>
';
      	} 
      		



   ?>



	</div>
	<br><br><br>
 