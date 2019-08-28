<?php 
  date_default_timezone_set('America/Mexico_City');
  $fecha_hoy = strftime("%Y-%m-%d");
 
  require_once "models/log_model.php";
  require_once "controllers/log_controller.php";

  $ingreso =  new log_controller();
  $valor = $ingreso->logApp();

 

if ($valor=="error") {
     echo "<div class='alert alert-danger alert-dismissible fade in'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error <strong>¡en el usuario ó contraseña invalido!</strong></div>";
  }


 ?>



<!DOCTYPE html>
<html lang="en">
    <head>
	  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="views/includes/bootstrap/css/bootstrap.min.css">
  	  <link rel="stylesheet" type="text/css" href="views/includes/css/styles.css">
	  <link rel="icon" type="image/png" href="views/includes/images/icon.png">

      <title>SIGIRT</title>    
   	</head>
   	
   	
	<body>
	<img class="imge_center" src="views/includes/images/logo issste 2019_3.jpg" alt="">

    <div class="col-md-12">
		<div class="container">
			<div class="row main">
			<div class="panel-heading">
	          	<div class="panel-title text-center">
	            	<h2 class="title">Inicio de Sesión</h2>
	          	</div>
	      	</div>
        <form action="" method="POST" class="col-md-4 col-md-offset-4">
          	<div class="form-group ">
				<label for="name" class="cols-sm-3 control-label">Usuario</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user" style="font-size:30px;" aria-hidden="true"></i></span>
						<input type="text" class="form-control" name="usuario" id="user"  placeholder="Usuario" required/>
						</div>
					</div>
			</div>
          	<div class="form-group">
				<label for="name" class="cols-sm-3 control-label">Contraseña</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock" style="font-size:18px;" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="contra" id="password"  placeholder="Contraseña" required/>
						</div>
					</div>
			</div>

        <input type="submit" class="btn-block" name="log" id="ingresar_log" value="Ingresar">
      </form>
     
    </div>	
	</body>
   	<!-- Pie de pagina del sistema PRAXAIR-->
	  <?php //include "PHP/Pagina/Footer.php";
	   ?>    	    		
	<!-- Fin-->
</html>
