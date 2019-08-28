<?php 
  date_default_timezone_set('America/Mexico_City');
  $fecha_hoy = strftime("%Y-%m-%d");
  $id_pac = $_GET['pac'];
  

  //buscar el token del f02 mayor
  

  $ced_var = new cedula_controller();
  $token = $ced_var->getTokenF02($id_pac);
  $valor = $ced_var->regCedula($id_pac,$token['token']);

  if($valor!="error" && $valor!=""){
     header("Location: content.php?p=formatos&form=2&token=$valor");
  }else if ($valor=="error") {
     echo "error";
  }


 ?>

  
  
	<div class="container">
  <div class="title" align="center">
      <strong><h3>Cedula de identificación inicial</h3></strong><hr>
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
                  <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
              </div>
          </div>
          
          <div class="form-group">
              <label for="">Edad</label>
              <div class="input">
                  <input type="text" class="form-control" id="edad" placeholder="Edad" name="edad">
              </div>
          </div>

            <div class="form-group">
              <label for="">Sexo</label>
              <div class="input">
                  <select class="form-control" name="sexo" id="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                  </select>
              </div>
          </div>
                  
            <div class="form-group">
              <label for="">Telefono particular</label>
              <div class="input">
                  <input type="text" class="form-control" name="tel_part" id="fecha_nac" placeholder="Telefono particular">
              </div>
          </div>
           <div class="form-group">
              <label for="">Email</label>
              <div class="input">
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
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
                  <input type="text" class="form-control" id="estado" name="estado" placeholder="Estado">
              </div>
          </div>

              <div class="form-group">
                  <label for="">Municipio</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="municipio" name="municipio" placeholder="Municipio">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Localidad</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="localidad" name="localidad" placeholder="Localidad">
              </div>
          </div>

                  <div class="form-group">
              <label for="exampleFormControlInput1">Colonia</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="colonia" name="colonia" placeholder="Colonia">
              </div>
          </div>
  
            <div class="form-group">
              <label for="exampleFormControlInput1">Calle</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle">
              </div>
            </div>
                  
            <div class="form-group">
              <label for="">Numero interior</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="numero_int" name="numero_int" placeholder="Numero interior">
              </div>
            </div>

            <div class="form-group">
              <label for="">Numero exterior</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="numero_ext" name="numero_ext" placeholder="Numero exterior">
              </div>
            </div>

            <div class="form-group">
              <label for="">CP</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="cp" name="cp" placeholder="CP">
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
                    <input type="text" class="form-control" placeholder="Nombre de la dependencia" id="nom_dep" name="nom_dep">
                   </div>
                </div>
                <div class="form-group">
                      <div class="dom">
                  <label for="">Oficina de adscripción</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="adscripcion" name="adscripcion">
                   </div>
                  </div>
                </div>
                
                <div class="form-group">
                 <div class="dom">
                  <label for="">Actividad</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Actividad" id="actividad" name="actividad">
                   </div>
                </div>
              </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Unidad médica de atención</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Unidad médica de atención" id="uni_atencion" name="uni_med">
                   </div>
                  </div>
                </div>
               <div class="form-group">
                 <div class="dom">
                  <label for="">Ramo</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Ramo de la empresa" id="ramo" name="ramo">
                   </div>
                  </div>
                </div>
                                  
                <div class="form-group">
                 <div class="dom">
                  <label for="">Telefono de oficina</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Telefono de la oficina" id="tel_ofi" name="tel_ofi">
                   </div>
                  </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">Clinica de adscripción</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre de la dependencia" id="nom_dep" name="cli_ads">
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
                         
                        <div class="formulario">
                            <input type="radio" value="si" name="otros_r" id="otros_si">
                            <label class="labelx" for="otros_si">SI</label>
                            <input type="radio" value="no" name="otros_r" id="otros_no">
                            <label class="labelx" for="otros_no">NO</label>
                        </div>
                       </div>
                      </div>
                  </div>
                  
                 <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se califico como riesgo de trabajo?</label>
                      <div class="col-sm-8">


                       <div class="formulario">
                            <input type="radio" value="si" name="riesgo" id="riesgo_si">
                            <label class="labelx" for="riesgo_si">SI</label>
                            <input type="radio" value="no" name="riesgo" id="riesgo_no">
                            <label class="labelx" for="riesgo_no">NO</label>
                        </div>
                        </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se le dictaminarón secuelas valuables?</label>
                      <div class="col-sm-8">
                          
                        <div class="formulario">
                            <input type="radio" value="si" name="secuelas" id="secuelas_si">
                            <label class="labelx" for="secuelas_si">SI</label>
                            <input type="radio" value="no" name="secuelas" id="secuelas_no">
                            <label class="labelx" for="secuelas_no">NO</label>
                        </div>
                       </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">¿Se dio una incapacidad parcial o permanente?</label>
                      <div class="col-sm-8">
                          <div class="formulario">
                            <input type="radio" value="si" name="parcial" id="parcial_si">
                            <label class="labelx" for="parcial_si">SI</label>
                            <input type="radio" value="no" name="parcial" id="parcial_no">
                            <label class="labelx" for="parcial_no">NO</label>
                        </div>

                      </div>
                      </div>
                  </div>

                  <div class="form-group row">
                    <div class="dom">
                      <label for="Materno" class="col-sm-4 col-form-label col-form-label-lg">Porcentaje</label>
                      <div class="col-sm-8">
                        
                        <input type="text" class="form-control"  name="porcentaje" id="porcentaje_si">
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
                    <input type="date" class="form-control" placeholder="Nombre de la dependencia" id="fech_realiz" name="fech_realiz" value=<?php echo $fecha_hoy;  ?> readonly>
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
         





                  <div class="btn-group col-sm-8 col-lg-offset-9">
            	<input type="submit" name="regiss" class="btn btn-success" value="Guardar avance">
           </div> 
         </div>                    
     
           
      	</form>

     </div>
	 	<br><br><br>
