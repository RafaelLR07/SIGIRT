  <div class="title" align="center">
      <strong><h3>Pacientes Pendientes</h3></strong><hr>
  </div>	

<button id="more" type="button" class="btn btn-primary btn-lg" 
			    onclick="window.location.href='content.php?p=nuevo_paciente'">
			    	<span class="glyphicon glyphicon-plus"></span> Nuevo paciente
			    </button>



<div class="container">
<?php 
  $valor="";
  $f02_var = new control_f02();

  $datos_user = $f02_var->pacAct_controller();
 
  echo '<br> <br> <br>';	
  

  //$f02_var->saludo();


 ?>

</div>
