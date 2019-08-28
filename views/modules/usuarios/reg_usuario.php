  
<?php 
  
  $reg = new usuarios_controller();
  $result = $reg->regis_usuarios_grl();
  if($result == "success"){
   header("Location:content.php?p=usuarios");
  }else if($result == "error"){
    echo '<div class="alert alert-danger"> 
               ERROR EN LA INSERCION
                </div>';
  } 
  
 ?>

  <div class="container">
  <div class="title" align="center">
      <strong><h3>Registro de usuario general</h3></strong><hr>
  </div>  
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
                <strong><h3>Información del usuario</h3></strong><hr>     
             </div>
             <div class="panel-body">

                 
  <form class="formulario" method="POST" onsubmit="return validar_form_grl()"> 
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

            <div class="form-group">
              <label for="">Tipo de usuario</label>
              <div class="input">
                 <select class="form-control" name="tipo" id="tipo" onchange="scann_tipo_user(this.value)">
                    <option value="0">Elige tipo de usuario</option>
                    <option value="Admin">Administrador</option>
                    <option value="Usuario">Empleado</option>
                    <option value="Medico">Medico</option>
                 </select>
              </div>
            </div>
            


                </div> 
             </div>
           
        </div>
        



          <div class="admin" id="admin" style="display: none;">
          <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información de empleado</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
               
               <div class="form-group">
                <label for="">Nombre</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="nombre_per"  name="nombre_per" placeholder="nombre">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Apellido paterno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_pater"  name="ape_pater" placeholder="Apellido paterno">
                  </div>
                </div>

                 <div class="form-group">
                <label for="">Apellido materno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_mater"  name="ape_mater" placeholder="Apellido materno">
                  </div>
                </div>
                
                <div class="form-group">
                <label for="">No. empleado</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="no_empleado" name="no_empleado" placeholder="Numero de empleado">
                  </div>
                </div>

               </div>
            </div>
          </div>

        </div>





          <div class="medic" id="medic" style="display: none;">
          <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información del médico</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
               
               <div class="form-group">
                <label for="">Nombre</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="nombre_med"  name="nombre_med" placeholder="nombre">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Apellido paterno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_patermed"  name="ape_patermed" placeholder="Apellido paterno">
                  </div>
                </div>

                 <div class="form-group">
                <label for="">Apellido materno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_matermed"  name="ape_matermed" placeholder="Apellido materno">
                  </div>
                </div>
                
                <div class="form-group">
                <label for="">Clave</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Cédula</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula">
                  </div>
                </div>

               </div>
            </div>
          </div>

        </div>






          <div class="btn-group col-sm-8 col-lg-offset-9">
              <input type="submit" name="regis_usua" class="btn btn-success" value = "Registrar">
           </div> 
      </form>
      <br><br>
     </div>
 </div>
</div>