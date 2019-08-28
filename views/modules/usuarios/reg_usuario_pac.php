	
<?php 
  $reg = new usuarios_controller();
  $result = $reg->regis_usua($_GET['valor']);
  if($result == "success"){
   header("Location:content.php?p=activos");
  }  
  
 ?>

  <div class="container">
  <div class="title" align="center">
      <strong><h3>Registro de usuario</h3></strong><hr>
  </div>	
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
                <strong><h3>Información del usuario</h3></strong><hr>     
             </div>
             <div class="panel-body">

                 
  <form class="formulario" method="POST" onsubmit="return validar_form()"> 
        <div class="info_personal">
         
          <div class="form-group">
              <label for="">Nombre de usuario</label>
              <div class="input">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre de usuario" name="nombre">
              </div>
          </div>
          <div class="form-group">
               <label for="">Correo Electronico</label>
              <div class="input">
                  <input type="mail" class="form-control" id="email" placeholder="Correo electronico" name="email">
              </div>
          </div>

          <div class="form-group">
              <label for="">Contraseña</label>
              <div class="input">
                  <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">
              </div>
          </div>
          

            <div class="form-group">
              <label for="">Repetir contraseña</label>
              <div class="input">
                  <input type="password" class="form-control" id="rep_pass" placeholder="Repetir contraseña" name="rep_pass">
              </div>
          </div>
      
                              

                 </div> 
             </div>
             <div class="btn-group col-sm-8 col-lg-offset-9">
              <input type="submit" name="regis_usua" class="btn btn-success" value = "Registrar">
           </div> 
        </div>
  
      </form>
      <br><br>
     </div>
 </div>
</div>