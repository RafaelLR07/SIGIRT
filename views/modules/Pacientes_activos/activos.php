
<div class="title" align="center">
      <strong><h3>Pacientes Activos</h3></strong><hr>
  </div>  
<br>


<div class="container">
  <div class="col-xs-12">
    <div class="row">
      <div class="bus">
        <?php 
          $user = $_SESSION['tipoUsuario'];

            
            if($user=="Medico"){
              echo '<input class="form-control" type="text" id="but_med" placeholder="buscar en" <br>';

              echo '<input class="form-control" type="hidden" id="us" value="'.$user.'">';

            
             
            }else{
              echo '<input class="form-control" type="text" id="but" placeholder="busqueda">';            
              echo '<input class="form-control" type="hidden" id="us" value="0">';
            }

         ?>

        
      </div>
      
      <button id="more" type="button" class="btn btn-primary btn-lg" 
          onclick="window.location.href='content.php?p=nuevo_paciente'">
            <span class="glyphicon glyphicon-plus"></span> Nuevo paciente
      </button>

      <div class="datos" id="datos"></div>
    </div>
  </div>
</div>

<script type="text/javascript" src="views/includes/js/serch_act.js"></script>