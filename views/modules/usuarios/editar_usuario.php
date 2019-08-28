  
<?php 
  
  $id = $_GET['valor'];

  if(isset($_GET['edd'])){
    echo '<div class="alert alert-success"> 
                 Actualizado correctamente
            </div>';
  }
  $reg = new usuarios_controller();
  $result = $reg->llenadoUpgrl($id);

  //echo var_dump($result);
  $type_us = $result['tipo_user'];
  $arrayAdm = array('num_empleado' => '');
  $arrayMed = array('cedula'=>'','apellido_pat'=>'','apellido_mat'=> '',
                    'nombre' => '','clave'=>'');
  if ($type_us == "Admin"||$type_us == "Usuario") {

    $arrayAdm['num_empleado'] = $result['num_empleado'];
    // echo var_dump($arrayAdm);

  }else if ($type_us == "Medico") {
   
    $arrayMed['cedula'] = $result['cedula'];
    $arrayMed['clave'] = $result['clave'];
    //echo var_dump($arrayMed);

  }


  $upps = $reg->Upgrl_usu($id);
  if($upps == "successPac"){
     header("Location:content.php?p=editarUsuario&valor=$id&tipo=Paciente&edd=ok");
    }else if($result == "error"){
      echo '<div class="alert alert-danger"> 
                 ERROR EN LA INSERCION
            </div>';   
    }

  //traspasar a un arreglo admin o user dependiento la respuesta del servidor


  /*$result = $reg->regis_usuarios_grl();
  if($result == "success"){
   header("Location:content.php?p=usuarios");
  }else if($result == "error"){
    echo '<div class="alert alert-danger"> 
               ERROR EN LA INSERCION
          </div>';    */  
   
  
 ?>

  <div class="container">
  <div class="title" align="center">
      <strong><h3>Edición de usuario general</h3></strong><hr>
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
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre de usuario" name="nombre" value="<?php echo $result['nombre']  ?>">
              </div>
          </div>
          <div class="form-group">
               <label for="">Correo Electronico</label>
              <div class="input">
                  <input type="mail" class="form-control" id="email" placeholder="Correo electronico" name="email" value="<?php echo $result['email']  ?>" >
              </div>
          </div>

          <div class="form-group">
              <label for="">Contraseña</label>
              <div class="input">
                  <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" value="<?php echo $result['passwordU']  ?>" >
              </div>
          </div>
          

            <div class="form-group">
              <label for="">Repetir contraseña</label>
              <div class="input">
                  <input type="password" class="form-control" id="rep_pass" placeholder="Repetir contraseña" name="rep_pass" value="<?php echo $result['passwordU']  ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="">Tipo de usuario</label>
              <div class="input">
                 <input type="text" class="form-control" name="tipo" id="tipo" readonly onchange="scann_tipo_user2(this.value)" value="<?php echo $result['tipo_user']?>">
                 <!--
                 <select class="form-control" name="tipo" id="tipo" readonly onchange="scann_tipo_user2(this.value)">
                    <?php 
                      $tipo_u = $result['tipo_user'];
                      $tipo_uu = "";
                      ($tipo_u == "Usuario")?$tipo_uu = "Empleado":$tipo_uu=$tipo_u;
                      echo "<option value='$tipo_u' selected>$tipo_uu</option>"
                           ?>
                    <option value="0">Elige tipo de usuario</option>
                    <option value="Admin">Administrador</option>
                    <option value="Usuario">Empleado</option>
                    <option value="Medico">Medico</option>
                    <option value="Paciente">Paciente</option>-->
                   
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
                    <input type="text" class="form-control" id="nombre_per"  name="nombre_per" placeholder="nombre" value="<?php echo $result['nombre_empl']?>">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Apellido paterno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_pater"  name="ape_pater" placeholder="Apellido paterno" value="<?php echo $result['ape_pater']?>">
                  </div>
                </div>

                 <div class="form-group">
                <label for="">Apellido materno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_mater"  name="ape_mater" placeholder="Apellido materno" value="<?php echo $result['ape_mater']?>">
                  </div>
                </div>
                
                <div class="form-group">
                <label for="">No. empleado</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="no_empleado" name="no_empleado" placeholder="Numero de empleado" value="<?php echo $result['num_empleado']?>">
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
                    <input type="text" class="form-control" id="nombre_med"  name="nombre_med" placeholder="nombre" value="<?php echo $result['nombre']?>">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Apellido paterno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_patermed"  name="ape_patermed" placeholder="Apellido paterno" value="<?php echo $result['apellido_pat']?>">
                  </div>
                </div>

                 <div class="form-group">
                <label for="">Apellido materno</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="ape_matermed"  name="ape_matermed" placeholder="Apellido materno" value="<?php echo $result['apellido_mat']?>">
                  </div>
                </div>
                
                <div class="form-group">
                <label for="">Clave</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="clave" name="clave" placeholder="Clave" value="<?php echo $result['clave']?>">
                  </div>
                </div>

                <div class="form-group">
                <label for="">Cédula</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="<?php echo $result['cedula']?>">
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