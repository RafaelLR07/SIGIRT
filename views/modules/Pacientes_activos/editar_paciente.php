<?php 
  
  //consulta de 
  include_once "class/f02_methods.php";
  $f02_var = new control_f02();
  $valor = $f02_var->llenadoEdicion();
  if($valor!="error" && $valor!=""){
    //$valor = $f02_var->updateF02($valor['token']);
  }else if ($valor=="error") {
     header("Location: content.php?p=pendientes");
  }
  


 ?>

  <div class="container">
  <div class="title" align="center">
      <strong><h3>Revisión de formato RT-02</h3></strong><hr>
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
              <label for="">Nombre</label>
              <div class="input">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" value = <?php echo $valor['nombre']; ?>>
              </div>
          </div>
          <div class="form-group">
               <label for="">Apellido Paterno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_pater" placeholder="Apellido Paterno" name="ap_pater" value = <?php echo $valor['ape_pater']; ?>>
              </div>
          </div>

          <div class="form-group">
              <label for="">Apellido Materno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_mater" placeholder="Apellido materno" name="ap_mater" value = <?php echo $valor['ape_mater']; ?>>
              </div>
          </div>
          

            <div class="form-group">
              <label for="">CURP</label>
              <div class="input">
                  <input type="text" class="form-control" id="curp" placeholder="CURP" name="curp" value = "<?php echo $valor['curp']; ?>">
              </div>
          </div>
                
           <div class="form-group">
              <label for="">RFC</label>
              <div class="input">
                  <input type="text" class="form-control" id="rfc" placeholder="RFC" name="rfc" value = "<?php echo $valor['rfc']; ?>">
              </div>
          </div>
                              

                 </div> 
             </div>
        </div>

  <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información de riesgo</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
             
             <div class="form-group">
              <label for="">Naturaleza de riesgo</label>
              <div class="inputD">
                
                <?php 
                    $naturaleza = $f02_var->consultaNat($valor['id_nat_riesgo']);
                    $tipo_r = $naturaleza['tipo_riesgo'];
                  
                 ?>
                 <input type="hidden" class="form-control" id="naturaleza_ries"  name="naturaleza_ries" value = <?php echo $valor['id_nat_riesgo']; ?>>

                  
                 <input type="text" class="form-control" id="" placeholder="" name="" value = "<?php echo  $tipo_r ?>">

              </div>
          </div>

              <div class="form-group">
                  <label for="">Fecha defunción</label>
                  <div class="inputD">
                    <input type="date" class="form-control" id="fecha_def"
                    name="fecha_def" value="<?php echo $valor['fecha_def'] ?>">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Unidad médica</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="uni_med" name="uni_med" placeholder="Unidad medica" value="<?php echo $valor['unidad_med_ini'] ?>">
              </div>
          </div>

              <div class="form-group">
              <label for="">Fecha de primer atención medica</label>
              <div class="inputD">
                <?php 
                    $class_methods = new f02_methods();
                    $fech_aten = $class_methods->llenaInputDatetime($valor['fecha_atencion']);
                   
                   ?>
                  <input type="datetime-local" class="form-control" id="first_at_med" name="first_at_med" value="<?php echo $fech_aten ?>">
  
                  
              </div>
          </div>

                </div>

              </div>
        </div>
     
    
     <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Sección de antecedentes</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
             <div class="form-group">
              <label for="">Fecha en que se recibió al paciente(Urgencias)</label>
              <div class="inputD">
                <?php 
                  $fech_urg = $class_methods->llenaInputDatetime($valor['fecha_urgencias']);
                 ?>
                  <input type="datetime-local" class="form-control" id="fech_urgencias" name="fech_urgencias" value="<?php echo$fech_urg ?>">
              </div>
            </div>
          </div>

              <div class="form-group">
              <div class="dom">
                <div class="form-group">
                <label for="">Relación con el padecimiento actual</label>
                <div class="formulario">
                  <?php 
                      $id_pad_x = $valor['id_pad_x'];
                      $pade_inf = $f02_var->getPadeX_pac($id_pad_x);
                      $padX = $class_methods->padxScann($pade_inf);
                    

                   ?>

                        <input type="checkbox" value="RIÑA" name="padx[]" id="rina" <?php echo  $padX['rina'] ?> >
                        <label class="labelx" for="rina">RIÑA</label><br>

                        <input type="checkbox" value="ALIENTO ALCOHOLICO" name="padx[]" id="alcol" <?php echo  $padX['aliento'] ?>>
                        <label class="labelx" for="alcol">ALIENTO ALCOHOLICO</label><br>

                        <input type="checkbox" value="INTENCIONALIDAD DE LA LESIÓN" name="padx[]" id="inte" <?php echo  $padX['lesion'] ?>>
                        <label class="labelx" for="inte">INTENCIONALIDAD DE LA LESIÓN</label><br>

                        <input type="checkbox" value="TÓXICOS" name="padx[]" id="toxic" <?php echo  $padX['tox'] ?>>
                        <label class="labelx" for="toxic">TÓXICOS</label><br>

                        <input type="checkbox" value="ESTADO DE EBRIEDAD" name="padx[]" id="ebrio" <?php echo  $padX['ebrio'] ?>>
                        <label class="labelx" for="ebrio">ESTADO DE EBRIEDAD</label><br>

                        <input type="checkbox" value="BAJO EFECTO DE DROGAS" name="padx[]" id="drug" <?php echo  $padX['drog'] ?>>
                        <label class="labelx" for="drug">BAJO EFECTO DE DROGAS</label><br>

                        <input type="checkbox" value="POR PRESCRIPCIÓN MEDICA" name="padx[]" id="desc" <?php echo  $padX['medico'] ?>>
                        <label class="labelx" for="desc">POR PRESCRIPCIÓN MEDICA</label><br>
                        
                  </div>
                </div>
              </div>
            </div>
              

              <div class="form-group">
                <div class="dom">
                <label for="">Padecimiento actual</label>
                <div class="inputD">
                    <textarea name="pad_actual" onkeyup="mayus(this)" type="text" class="form-control" id="pad_actual" placeholder="Padecimiento actual" onkeyup="mayus(this)"><?php echo $valor['pad_actual'] ?></textarea>
                </div>
                </div>
            </div>
            
            <div class="form-group">
              <div class="dom">
              <label for="">Exploración fisica</label>
              <div class="inputD">
                  <textarea name="exp_fisica" onkeyup="mayus(this)" type="text" class="form-control" id="exp_fisica" placeholder="Exploracion fisica" onkeyup="mayus(this)"><?php echo $valor['exploracion_fisica'] ?></textarea>
                </div>
                </div>
              </div>

           </div>

        </div>
        
                 
        <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Sección de antecedentes</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
             
             <div class="form-group">
              <label for="">Laboratorio y gabinete</label>
              <div class="inputD">
                  <textarea class="form-control" name="labo" id="labo" cols="30" rows="4" placeholder="Laboratorio y gabinete" onkeyup="mayus(this)"><?php echo $valor['lab_gabinete'] ?></textarea>
              </div>
          </div>
              
              <div class="form-group">
                  <label for="">Diagnostico nosologico</label>
                  <div class="inputD">
                     <textarea name="diag_noso" onkeyup="mayus(this)" type="text" class="form-control" id="diag_noso" placeholder="Diagnostico nosologico" onkeyup="mayus(this)"><?php echo $valor['diag_nosologico'] ?>
                    </textarea>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                <div class="dom">
                  <label for="">Diagnostico etiologico</label>
                  <div class="inputD">
                      <textarea name="diag_etio" onkeyup="mayus(this)" type="text" class="form-control" id="diag_etio" placeholder="Diagnostico etiologico" onkeyup="mayus(this)"><?php echo $valor['diag_etiologico'] ?></textarea>
                  </div>
                </div>
          </div>

            <div class="form-group">
              <div class="dom">
              <label for="">Diagnostico anatomo</label>
              <div class="inputD">
                  <textarea name="diag_ana" onkeyup="mayus(this)" type="text" class="form-control" id="diag_ana" placeholder="Diagnostico anatomo" onkeyup="mayus(this)"><?php echo $valor['diag_anatomo'] ?></textarea>
                </div>
              </div>
            </div>
              
            <div class="form-group">
              <div class="dom">
                <label for="">Pronostico</label>
                <div class="inputD">
                    <textarea name="pronostico" onkeyup="mayus(this)" type="text" class="form-control" id="pronostico" placeholder="Pronostico" onkeyup="mayus(this)"><?php echo $valor['pronostico'] ?></textarea>
                </div>
              </div>
            </div>

              
              <div class="form-group">
                <div class="dom">
                <label for="">Fecha inicial</label>
                <div class="inputD">
                    <input type="date" class="form-control" name="fech_ini" id="fech_ini" value="<?php echo $valor['fecha_ini_lic_med'] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="dom">
                  <label for="">Fecha final</label>
                  <div class="inputD">
                    <input type="date" class="form-control" name="fech_fin" id="fech_fin" value="<?php echo $valor['fecha_fin_lic_med'] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="dom">
                <label for="">Dias de licencia medica otorgads</label>
                <div class="inputD">
                     <input type="number" class="form-control" name="dias_lic" id="dias_lic" value="<?php echo $valor['dias_lic'] ?>">
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="dom">
                <label for="">Nombre del medico</label>
                <div class="inputD">
                  <?php 
                    $medico = $f02_var->verMed_f02($valor['id_medicos']);
                    $nombre = $medico['apellido_pat']." ".$medico['apellido_mat']." ".$medico['nombre'];
                  
                 ?>
                 <input type="hidden" class="form-control" id="medico"  name="medico" value = <?php echo $valor['id_medicos']; ?>>

                  
                 <input type="text" class="form-control" id="" placeholder="" name="" value = "<?php echo  $nombre ?>">
                   
                  </div>
                </div>
              </div>


           </div>

        </div>
            <div class="btn-group col-sm-8 col-lg-offset-9">
              <button type="submint" class="btn btn-success">Registrar</button>
           </div> 
         </div>                    
     
           
        </form>

     </div>
    <br><br><br>



