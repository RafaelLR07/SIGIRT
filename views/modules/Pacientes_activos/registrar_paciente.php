<?php 
  
  $f02_var = new control_f02();
  $valor = $f02_var->registro_f02_Controller();
  if($valor!="error" && $valor!=""){
     header("Location: content.php?p=formatos&form=1&token=$valor");
  }else if ($valor=="error") {
     echo "error";
  }
  


 ?>

	<div class="container">
  <div class="title" align="center">
      <strong><h3>Registro de formato RT-02</h3></strong><hr>
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
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" onkeyup="mayus(this)">
              </div>
          </div>
          <div class="form-group">
               <label for="">Apellido Paterno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_pater" placeholder="Apellido Paterno" name="ap_pater" onkeyup="mayus(this)">
              </div>
          </div>

          <div class="form-group">
              <label for="">Apellido Materno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_mater" placeholder="Apellido materno" name="ap_mater" onkeyup="mayus(this)">
              </div>
          </div>
          

            <div class="form-group">
              <label for="">CURP</label>
              <div class="input">
                  <input type="text" class="form-control" id="curp" placeholder="CURP" name="curp" onkeyup="mayus(this)">
              </div>
          </div>
                
           <div class="form-group">
              <label for="">RFC</label>
              <div class="input">
                  <input type="text" class="form-control" id="rfc" placeholder="RFC" name="rfc" onkeyup="mayus(this)">
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
                  <select class="form-control" name="naturaleza_ries" id="naturaleza_ries">
                  <option value="seleccione">Seleccione una naturaleza</option>
                 <?php 

                    $opciones = $f02_var->verPade_controller();
                    echo $opciones;

                  ?>
                            
                    </select>
              </div>
          </div>

              <div class="form-group">
                  <label for="">Fecha defunción</label>
                  <div class="inputD">
                    <input type="date" class="form-control" id="fecha_def"
                    name="fecha_def">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Unidad médica</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="uni_med" name="uni_med" placeholder="Unidad medica" onkeyup="mayus(this)">
              </div>
          </div>

                  <div class="form-group">
              <label for="">Fecha de primer atención medica</label>
              <div class="inputD">
                  <input type="datetime-local" class="form-control" id="first_at_med" name="first_at_med">
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
                  <input type="datetime-local" class="form-control" id="fech_urgencias" name="fech_urgencias">
              </div>
            </div>
          </div>

              <div class="form-group">
              <div class="dom">
                <div class="form-group">
                <label for="">Relación con el padecimiento actual</label>
                <div class="formulario">
                        <input type="checkbox" value="RIÑA" name="padx[]" id="rina">
                        <label class="labelx" for="rina">RIÑA</label><br>

                        <input type="checkbox" value="ALIENTO ALCOHOLICO" name="padx[]" id="alcol">
                        <label class="labelx" for="alcol">ALIENTO ALCOHOLICO</label><br>

                        <input type="checkbox" value="INTENCIONALIDAD DE LA LESIÓN" name="padx[]" id="inte">
                        <label class="labelx" for="inte">INTENCIONALIDAD DE LA LESIÓN</label><br>

                        <input type="checkbox" value="TÓXICOS" name="padx[]" id="toxic">
                        <label class="labelx" for="toxic">TÓXICOS</label><br>

                        <input type="checkbox" value="ESTADO DE EBRIEDAD" name="padx[]" id="ebrio">
                        <label class="labelx" for="ebrio">ESTADO DE EBRIEDAD</label><br>

                        <input type="checkbox" value="BAJO EFECTO DE DROGAS" name="padx[]" id="drug">
                        <label class="labelx" for="drug">BAJO EFECTO DE DROGAS</label><br>

                        <input type="checkbox" value="POR PRESCRIPCIÓN MEDICA" name="padx[]" id="desc">
                        <label class="labelx" for="desc">POR PRESCRIPCIÓN MEDICA</label><br>
                        
                  </div>
                </div>
              </div>
            </div>
              

              <div class="form-group">
                <div class="dom">
                <label for="">Padecimiento actual</label>
                <div class="inputD">
                    <textarea name="pad_actual" onkeyup="mayus(this)" type="text" class="form-control" id="pad_actual" placeholder="Padecimiento actual" onkeyup="mayus(this)"></textarea>
                </div>
                </div>
            </div>
            
            <div class="form-group">
              <div class="dom">
              <label for="">Exploración fisica</label>
              <div class="inputD">
                  <textarea name="exp_fisica" onkeyup="mayus(this)" type="text" class="form-control" id="exp_fisica" placeholder="Exploracion fisica" onkeyup="mayus(this)"></textarea>
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
                  <textarea class="form-control" name="labo" id="labo" cols="30" rows="4" placeholder="Laboratorio y gabinete" onkeyup="mayus(this)"></textarea>
              </div>
          </div>
              
              <div class="form-group">
                  <label for="">Diagnostico nosologico</label>
                  <div class="inputD">
                     <textarea name="diag_noso" onkeyup="mayus(this)" type="text" class="form-control" id="diag_noso" placeholder="Diagnostico nosologico" onkeyup="mayus(this)"></textarea>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                <div class="dom">
                  <label for="">Diagnostico etiologico</label>
                  <div class="inputD">
                      <textarea name="diag_etio" onkeyup="mayus(this)" type="text" class="form-control" id="diag_etio" placeholder="Diagnostico etiologico" onkeyup="mayus(this)"></textarea>
                  </div>
                </div>
          </div>

            <div class="form-group">
              <div class="dom">
              <label for="">Diagnostico anatomo</label>
              <div class="inputD">
                  <textarea name="diag_ana" onkeyup="mayus(this)" type="text" class="form-control" id="diag_ana" placeholder="Diagnostico anatomo" onkeyup="mayus(this)"></textarea>
                </div>
              </div>
            </div>
              
            <div class="form-group">
              <div class="dom">
                <label for="">Pronostico</label>
                <div class="inputD">
                    <textarea name="pronostico" onkeyup="mayus(this)" type="text" class="form-control" id="pronostico" placeholder="Pronostico" onkeyup="mayus(this)"></textarea>
                </div>
              </div>
            </div>

              
              <div class="form-group">
                <div class="dom">
                <label for="">Fecha inicial</label>
                <div class="inputD">
                    <input type="date" class="form-control" name="fech_ini" id="fech_ini" >
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="dom">
                  <label for="">Fecha final</label>
                  <div class="inputD">
                    <input type="date" class="form-control" name="fech_fin" id="fech_fin" >
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="dom">
                <label for="">Dias de licencia medica otorgads</label>
                <div class="inputD">
                     <input type="number" class="form-control" name="dias_lic" id="dias_lic">
                  </div>
                </div>
              </div>

              <div class="form-group">
              <div class="dom">
                <label for="">Nombre del medico</label>
                <div class="inputD">
                    <select class="form-control" name="medico" id="medico">
                           <?php 

                              $medicos = $f02_var->verMedic_controller();
                              echo $medicos;

                            ?>
                    </select>
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



