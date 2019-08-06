  <div class="title" align="center">
      <strong><h3>Pacientes Activos</h3></strong><hr>
  </div>  
<br>

<div class="container">
    <div class="col-xs-12">
    <div class="row">
<div class="bus">
  <input class="form-control" type="text" id="but" placeholder="hola">
</div>
<button id="more" type="button" class="btn btn-primary btn-lg" 
          onclick="window.location.href='content.php?p=nuevo_paciente'">
            <span class="glyphicon glyphicon-plus"></span> Nuevo paciente
          </button>

    <?php 
          /*$valor="";
          $f02_var = new control_f02();

          $datos_user = $f02_var->pacAct_controller();
          echo $datos_user;*/
          //echo '<br> <br> <br>';  
          //$f02_var->saludo();

         ?>
         <div class="datos" id="datos"></div>
</div>
</div>
</div>