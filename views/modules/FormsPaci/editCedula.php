<?php 
  date_default_timezone_set('America/Mexico_City');
  include_once "class/f02_methods.php";

  $fecha_hoy = strftime("%Y-%m-%d");
  $id_pac = $_GET['pac'];
  $token = $_GET['token'];  

   if(isset($_GET['edit'])){
    echo "<div class='alert alert-success alert-dismissible fade in'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Exito! <strong>Actualizado correctamente</strong></div>";
  }

  //instancia de la clase de funciones generales
  $methods_class = new f02_methods();


  //buscar el token del f02 mayor
  $ced_var = new cedula_controller();
  $info_grl = $ced_var->llenadoGrl_up($token);
  $cedula_inf = $ced_var->llenadoCedula_up($token);
  if($cedula_inf=="error"||$info_grl=="error"){
     header("Location:content.php?p=cedulaup&pac=$id_pac&token=$token");
  }
  
  //finalizacion
  $request_fina = $ced_var->fina_ced($token);
  if($request_fina=="success"){
     header("Location:content.php?p=dashboard");
 
     }
  
  //edicion de la cedula inicial
  $request = $ced_var->udpateCedu($token);
  if($request=="success"){
     header("Location:content.php?p=cedulaup&pac=$id_pac&edit=true&token=$token");
      

    }else if($request=="Error"){
      echo "<div class='alert alert-danger alert-dismissible fade in'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error <strong>¡en el usuario ó contraseña invalido!</strong></div>";
    }


 ?>

	<div class="container">
  <div class="title" align="center">
      <strong><h3>Cedula de identificación inicial(Avance)</h3></strong><hr>
  </div>	
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
                <strong><h3>Información personal</h3></strong><hr>     
             </div>
             <div class="panel-body">
                 
  <form class="formulario" method="POST">
        <div class="info_personal">
          <div class="form-group">
              <label for="">Fecha de nacimiento</label>
              <div class="input">
                  <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="<?php echo $info_grl['fecha_nac'] ?>">
              </div>
          </div>
          
          <div class="form-group">
              <label for="">Edad</label>
              <div class="input">
                  <input type="text" class="form-control" id="edad" placeholder="Edad" name="edad" value="<?php echo $info_grl['edad'] ?>">
              </div>
          </div>

            <div class="form-group">
              <label for="">Sexo</label>
              <div class="input">
                <?php 
                    $selet_option_mas = "";
                    $selet_option_fem = "";
                    if($info_grl['sexo']=="masculino"){
                        $selet_option_mas = "selected";
                    }else{
                        $selet_option_fem = "selected";
                   }
                 ?>
                  <select class="form-control" name="sexo" id="sexo">
                    <option value="masculino" <?php echo  $selet_option_mas; ?> >Masculino</option>
                    <option value="femenino" <?php echo  $selet_option_fem; ?> >Femenino</option>
                  </select>
              </div>
          </div>
                  
            <div class="form-group">
              <label for="">Telefono particular</label>
              <div class="input">
                  <input type="text" class="form-control" name="tel_part" id="fecha_nac" placeholder="Telefono particular" value="<?php echo $info_grl['tel_particular'] ?>">
              </div>
          </div>
           <div class="form-group">
              <label for="">Email</label>
              <div class="input">
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"  value="<?php echo $info_grl['mail'] ?>">
              </div>
          </div>
            

                 </div> 
             </div>
        </div>

  <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Domicilio</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
             
             <div class="form-group">
              <label for="">Estado</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado" value="<?php echo $info_grl['estado'] ?>">
              </div>
          </div>

              <div class="form-group">
                  <label for="">Municipio</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio" value="<?php echo $info_grl['municipio'] ?>">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Localidad</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad" value="<?php echo $info_grl['localidad'] ?>">
              </div>
          </div>

                  <div class="form-group">
              <label for="exampleFormControlInput1">Colonia</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia" value="<?php echo $info_grl['colonia'] ?>">
              </div>
          </div>
  
            <div class="form-group">
              <label for="exampleFormControlInput1">Calle</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle" value="<?php echo $info_grl['calle'] ?>">
              </div>
            </div>
                  
            <div class="form-group">
              <label for="">Numero interior</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="numero_int" name="numero_int" placeholder="Numero interior" value="<?php echo $info_grl['num_int'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="">Numero exterior</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="numero_ext" name="numero_ext" placeholder="Numero exterior" value="<?php echo $info_grl['num_ext'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="">CP</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="cp" name="cp" placeholder="CP" value="<?php echo $info_grl['cp'] ?>">
              </div>
            </div>


           </div>
        </div>
       </div>

       <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información de la dependencia</h3></strong><hr>     
             </div>
             <div class="panel-body">

               <div class="form-group">
                 <div class="dom">
                  <label for="">Nombre de la dependencia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre de la dependencia" id="nom_dep" name="nom_dep" value="<?php echo $cedula_inf['dependencia'] ?>">
                   </div>
                </div>
                <div class="form-group">
                      <div class="dom">
                  <label for="">Oficina de adscripción</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="adscripcion" name="adscripcion" value="<?php echo $cedula_inf['ofi_adscripcion'] ?>">
                   </div>
                  </div>
                </div>
                
                <div class="form-group">
                 <div class="dom">
                  <label for="">Actividad</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Actividad" id="actividad" name="actividad" value="<?php echo $cedula_inf['actividad'] ?>">
                   </div>
                </div>
              </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Unidad médica de atención</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Unidad médica de atención" id="uni_atencion" name="uni_med" value="<?php echo $cedula_inf['unidad_medica_aten'] ?>">
                   </div>
                  </div>
                </div>
               <div class="form-group">
                 <div class="dom">
                  <label for="">Ramo</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Ramo de la empresa" id="ramo" name="ramo" value="<?php echo $cedula_inf['ramo'] ?>">
                   </div>
                  </div>
                </div>
                                  
                <div class="form-group">
                 <div class="dom">
                  <label for="">Telefono de oficina</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Telefono de la oficina" id="tel_ofi" name="tel_ofi" value="<?php echo $cedula_inf['tel_oficina'] ?>">
                   </div>
                  </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">Clinica de adscripción</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Clinica de adscripción" id="cli_ads" name="cli_ads" value="<?php echo $cedula_inf['cli_ads'] ?>">
                   </div>
                 </div>
               </div>

                </div>
              </div>
          </div>
          
        


         <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Antecedente de riesgo de trabajo</h3></strong><hr>     
             </div>
             <div class="panel-body">
               

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Ha tenido otros riesgos de trabajo?</label>
                      <div class="col-sm-8">
                        
                        <?php 
                          $otro_ri = $methods_class->scannAntec($cedula_inf['otro_riesgo']);
                         ?>

                        <div class="formulario">
                            <input type="radio" value="si" name="otros_r" id="otros_si" <?php echo  $otro_ri['si_ind']; ?> >
                            <label class="labelx" for="otros_si">SI</label>
                            <input type="radio" value="no" name="otros_r" id="otros_no" <?php echo  $otro_ri['no_ind']; ?>>
                            <label class="labelx" for="otros_no">NO</label>
                        </div>
                       </div>
                      </div>
                  </div>
                  
                 <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se califico como riesgo de trabajo?</label>
                      <div class="col-sm-8">
                         <?php 
                          $cali_ri = $methods_class->scannAntec($cedula_inf['cali_otro_ries']);
                         ?>

                       <div class="formulario">
                            <input type="radio" value="si" name="riesgo" id="riesgo_si" <?php echo  $cali_ri['si_ind']; ?>>
                            <label class="labelx" for="riesgo_si">SI</label>
                            <input type="radio" value="no" name="riesgo" id="riesgo_no" <?php echo  $cali_ri['no_ind']; ?>>
                            <label class="labelx" for="riesgo_no">NO</label>
                        </div>
                        </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se le dictaminarón secuelas valuables?</label>
                      <div class="col-sm-8">
                        <?php 
                          $sec_ri = $methods_class->scannAntec($cedula_inf['secuelas']);
                         ?>
                        <div class="formulario">
                            <input type="radio" value="si" name="secuelas" id="secuelas_si" <?php echo  $sec_ri['si_ind']; ?>>
                            <label class="labelx" for="secuelas_si">SI</label>
                            <input type="radio" value="no" name="secuelas" id="secuelas_no" <?php echo  $sec_ri['no_ind']; ?>>
                            <label class="labelx" for="secuelas_no">NO</label>
                        </div>
                       </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se dio una incapacidad parcial o permanente?</label>

                       <?php 
                          $inc_ri = $methods_class->scannAntec($cedula_inf['incapacidad']);
                         ?>

                      <div class="col-sm-8">
                          <div class="formulario">
                            <input type="radio" value="si" name="parcial" id="parcial_si" <?php echo  $inc_ri['si_ind']; ?>>
                            <label class="labelx" for="parcial_si">SI</label>
                            <input type="radio" value="no" name="parcial" id="parcial_no" <?php echo  $inc_ri['no_ind']; ?>>
                            <label class="labelx" for="parcial_no">NO</label>
                        </div>

                      </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Porcentaje</label>
                      <div class="col-sm-8">
                        
                        <input type="text" class="form-control"  name="porcentaje" id="porcentaje_si" value="<?php echo $cedula_inf['porcentaje'] ?>">
                      </div>
                    </div>
                  </div>



                </div>
              </div>
              

              <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información complementaria</h3></strong><hr>     
             </div>
             <div class="panel-body">

               <div class="form-group">
                 <div class="dom">
                  <label for="">Fecha de realizacion</label>
                   <div class="inputD">
                    <input type="date" class="form-control" placeholder="Nombre de la dependencia" id="fech_realiz" name="fech_realiz" value="<?php echo strftime("%Y-%m-%d") ?>" readonly>
                   </div>
                </div>
                <div class="form-group">
                      <div class="dom">
                  <label for="">Delegación</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="delegacion"
                    value="CLÍNICA HOSPITAL XALAPA" readonly>
                   </div>
                  </div>
                </div>
                
                      

                </div>
              </div>
          </div>
         





            <div class="btn-group col-sm-8 col-lg-offset-6">
              <?php 
                $isFin = $ced_var->is_fin($token);
                if($isFin=="no"){
               ?>
            	<input type="submit" name="regiss" class="btn btn-success" value="Guardar avance">
              <input type="submit" name="fin" class="btn btn-danger" value="Finalizar llenado">
              <?php 
                }else{
                  echo "";
                }
               ?>
           </div> 
         </div>                    
     
           
      	</form>

     </div>
	 	<br><br><br>
