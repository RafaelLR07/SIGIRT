
	<div class="container">
  <div class="title" align="center">
      <strong><h3>Cedula de identificación inicial(Edición y alta)</h3></strong><hr>
  </div>	
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
                <strong><h3>Información personal</h3></strong><hr>     
             </div>
             <div class="panel-body">
                 
  <form class="formulario" action="" method="POST"> 
        <div class="info_personal">
         
          <div class="form-group">
              <label for="">Nombre</label>
              <div class="input">
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
              </div>
          </div>
          <div class="form-group">
               <label for="">Apellido Paterno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_pater" placeholder="Apellido Paterno" name="ap_pater">
              </div>
          </div>

          <div class="form-group">
              <label for="">Apellido Materno</label>
              <div class="input">
                  <input type="text" class="form-control" id="ap_mater" placeholder="Apellido materno" name="ap_mater">
              </div>
          </div>
          

            <div class="form-group">
              <label for="">CURP</label>
              <div class="input">
                  <input type="text" class="form-control" id="curp" placeholder="CURP" name="curp">
              </div>
          </div>
                
           <div class="form-group">
              <label for="">RFC</label>
              <div class="input">
                  <input type="text" class="form-control" id="rfc" placeholder="RFC" name="rfc">
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
                            <option value="">Accidente en centro de trabajo</option>
                            <option value="">Camino </option>
                            <option value="">Otro</option>
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
                  <input type="text" class="form-control" id="uni_med" name="uni_med" placeholder="Unidad medica">
              </div>
          </div>

                  <div class="form-group">
              <label for="">Fecha de primer atención medica</label>
              <div class="inputD">
                  <input type="date" class="form-control" id="first_at_med" name="first_at_med">
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
                  <input type="date" class="form-control" id="fech_urgencias">
              </div>
          </div>

              <div class="form-group">
                  <label for="exampleFormControlInput1">Relación con el padecimiento actual</label>
                  <div class="inputD">
                     <select class="form-control" name="rel_pad_actual" id="rel_pad_actual">
                            <option value="">Riña</option>
                            <option value="">Intencional </option>
                            <option value="">Toxico</option>
                          </select>
                      </div>
                  </div>
              </div>

              <div class="form-group">
              <label for="">Padecimiento actual</label>
              <div class="inputD">
                  <textarea name="pad_actual" onkeyup="mayus(this)" type="text" class="form-control" id="pad_actual" placeholder="Padecimiento actual"></textarea>
              </div>
          </div>
            
            <div class="form-group">
              <label for="">Exploración fisica</label>
              <div class="inputD">
                  <textarea name="exp_fisica" onkeyup="mayus(this)" type="text" class="form-control" id="exp_fisica" placeholder="Exploracion fisica"></textarea>
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
                  <textarea class="form-control" name="" id="" cols="30" rows="4"></textarea>
              </div>
          </div>
              
              <div class="form-group">
                  <label for="exampleFormControlInput1">Diagnostico nosologico</label>
                  <div class="inputD">
                     <textarea name="diag_noso" onkeyup="mayus(this)" type="text" class="form-control" id="diag_noso" placeholder="Diagnostico nosologico"></textarea>
                      </div>
                  </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlInput1">Diagnostico etiologico</label>
              <div class="inputD">
                  <textarea name="diag_etio" onkeyup="mayus(this)" type="text" class="form-control" id="diag_etio" placeholder="Diagnostico etiologico"></textarea>
              </div>
          </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Diagnostico anatomo</label>
              <div class="inputD">
                  <textarea name="diag_ana" onkeyup="mayus(this)" type="text" class="form-control" id="diag_ana" placeholder="Diagnostico anatomo"></textarea>
                </div>
              </div>
              
              <div class="form-group">
              <label for="exampleFormControlInput1">Pronostico</label>
              <div class="inputD">
                  <textarea name="pronostico" onkeyup="mayus(this)" type="text" class="form-control" id="pronostico" placeholder="Pronostico"></textarea>
                </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlInput1">Dias de licencia medica otorgads</label>
              <div class="inputD">
                   <input type="number" class="form-control" name="dias_lic" id="dias_lic">
                </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlInput1">Fecha inicial</label>
              <div class="inputD">
                  <input type="date" class="form-control" name="fech_ini" id="fech_ini">
                </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlInput1">Fecha final</label>
              <div class="inputD">
                  <input type="date" class="form-control" name="fech_fin" id="fech_fin">
                </div>
              </div>

              <div class="form-group">
              <label for="exampleFormControlInput1">Nombre del medico</label>
              <div class="inputD">
                   <input type="text" class="form-control" name="medic" id="medic">
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

<?php 
  
  $f02_var = new control_f02();
  $f02_var->registro_f02_Controller();
  //$f02_var->saludo();


 ?>


