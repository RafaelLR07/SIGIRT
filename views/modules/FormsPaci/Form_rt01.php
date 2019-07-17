<?php 
  date_default_timezone_set('America/Mexico_City');
  $fecha_hoy = strftime("%Y-%m-%d");
  $id_pac = $_GET['pac'];

  //buscar el token del f02 mayor
  
  $ced_var = new f01_controller();
  $token = $ced_var->getToken($id_pac);
  $val = $ced_var->registro_f01_Controller($id_pac,$token);
  
  /*
  if($valor!="error" && $valor!=""){
     header("Location: content.php?p=formatos&form=2&token=$valor");
  }else if ($valor=="error") {
     echo "error";
  }*/

  
  
 ?>

  
  
	<div class="container">
  <div class="title" align="center">
      <strong><h3>Formato RT-01</h3></strong><hr>
  </div>	
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
                <strong><h3>Nombre de familiar</h3></strong><hr>     
             </div>
             <div class="panel-body">
                 
  <form class="formulario" method="POST">
        <div class="info_personal">
          <div class="form-group">
              <label for="">Apellido paterno </label>
              <div class="input">
                  <input type="text" class="form-control" id="fecha_nac" name="apep_fam" placeholder="Apellido partno">
              </div>
          </div>
          
          <div class="form-group">
              <label for="">Apellido materno</label>
              <div class="input">
                  <input type="text" class="form-control" id="edad" placeholder="Apellido materno" name="apem_fam">
              </div>
          </div>

          <div class="form-group">
              <label for="">Nombre</label>
              <div class="input">
                  <input type="text" class="form-control" name="nom_fam" id="fecha_nac" placeholder="Nombre">
              </div>
          </div>
          

          <div class="form-group">
              <label for="">Parentesco</label>
              <div class="input">
                    <input type="text" class="form-control" id="estado" name="parentesco" placeholder="Parentesco">
              </div>
          </div>
         

                 </div> 
             </div>
        </div>

  <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información laboral</h3></strong><hr>     
             </div>
             <div class="panel-body">
             <div class="dom">
             
             <div class="form-group">
              <label for="">No.Empleado</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="no_empleado" name="no_empleado" placeholder="Numero de empleado">
              </div>
          </div>

              <div class="form-group">
                  <label for="">Puesto</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto laboral">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Fecha de ingreso laboral</label>
              <div class="inputD">
                  <input type="date" class="form-control" id="fecha_in" name="fecha_in">
              </div>
          </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Descripción de actividades</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="desc_act" name="desc_act" placeholder="Descripcion de actividades">
              </div>
          </div>
  
            <div class="form-group">
              <label for="exampleFormControlInput1">Fecha de primera cotización</label>
              <div class="inputD">
                  <input type="date" class="form-control" id="fecha_cotiza" name="fecha_cotiza" >
              </div>
            </div>
                  
            <div class="form-group">
              <label for="">Turno de trabajo</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="turno_tra" name="turno_tra" placeholder="Turno de trabajo">
              </div>
            </div>

            <div class="form-group">
              <label for="">Hora de entrada</label>
              <div class="inputD">
                  <input type="time" class="form-control" id="hor_entr" name="hor_entr">
              </div>
            </div>

            <div class="form-group">
              <label for="">Hora de salida</label>
              <div class="inputD">
                  <input type="time" class="form-control" id="hor_salid" name="hor_salid">
              </div>
            </div>


           </div>
        </div>
       </div>

       <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Información del accidente</h3></strong><hr>     
             </div>
             <div class="panel-body">

               <div class="form-group">
                 <div class="dom">
                  <label for="">Fecha y hora del accidente o probable inicio de la enfermedad</label>
                   <div class="inputD">
                    <input type="datetime-local" class="form-control" id="fech_acc" name="fech_acc">
                   </div>
                </div>
                <div class="form-group">
                      <div class="dom">
                  <label for="">Descripcion detallada del accidente de trabajo</label>
                   <div class="inputD">
                    <textarea name="desc_rt" onkeyup="mayus(this)" type="text" class="form-control" id="desc_rt" placeholder="Descripcion detallada del accidente" onkeyup="mayus(this)"></textarea>
                   </div>
                  </div>
                </div>

                 <div class="form-group">
                  <div class="dom">
                  <label for="">Circunstancias en las kue ocurrio el accidente</label>
                  <div class="inputD">
                    <select name="circuns" class="form-control" id="circuns">
                      <option value="A">Dependencia</option>  
                      <option value="B">Trayecto a trabajo</option>    
                      <option value="B">Trayecto a domicilio</option>    
                      <option value="A">Tiempo extra</option>      
                      <option value="C">Comision</option>      
                      </select>
                  </div>
                  </div>
                </div>
                
               
                </div>
              </div>
          </div>
          
        


         <div class="panel panel-success">
            <div class="panel-heading">
                <strong><h3>Informacion de la dependencia</h3></strong><hr>     
             </div>
             <div class="panel-body">
               
               <div class="form-group">
                 <div class="dom">
                  <label for="">Dependencia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero de ramo" value="<?php echo "Dependencia_cedula"  ?>" readonly >
                   </div>
                 </div>
               </div>


               <div class="form-group">
                 <div class="dom">
                  <label for="">Numero de ramo</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero de ramo" id="ramo" name="ramo">
                   </div>
                 </div>
               </div>
              
               <div class="title">
                <div class="dom">
                  <h4><strong>Nombre del representante legal de la dependencia</strong></h4><hr>
                </div>
               </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido paterno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido paterno del representante" id="ape_pater_rep" name="ape_pater_rep">
                   </div>
                 </div>
               </div>
               
               <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido materno del representante" id="ape_mater_rep" name="ape_mater_rep">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Nombre</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre del representante de la empresa" id="nombre_rep" name="nombre_rep">
                   </div>
                 </div>
               </div>
              
               <div class="title">
                <div class="dom">
                  <h4><strong>Domicilio de la dependencia</strong></h4><hr>
                </div>
               </div>  

               <div class="form-group">
                 <div class="dom">
                  <label for="">Calle</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Calle" id="calle_dep" name="calle_dep">
                   </div>
                 </div>
               </div>
               
               <div class="form-group">
                 <div class="dom">
                  <label for="">Numero</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero" id="num_dep" name="num_dep">
                   </div>
                 </div>
               </div>          

               <div class="form-group">
                 <div class="dom">
                  <label for="">Colonia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Colonia" id="col_dep" name="col_dep">
                   </div>
                 </div>
               </div>       

                <div class="form-group">
                 <div class="dom">
                  <label for="">Delegacion o municipio</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Delegacion o municipio" id="muni_dep" name="muni_dep">
                   </div>
                 </div>
               </div> 

               <div class="form-group">
                 <div class="dom">
                  <label for="">CP</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Codigo postal" id="cp_dep" name="cp_dep">
                   </div>
                 </div>
               </div>
                
                <div class="form-group">
                 <div class="dom">
                  <label for="">Telefono de la dependencia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Telefono de la dependencia" id="tel_dep" name="tel_dep">
                   </div>
                 </div>
               </div>
               
               <div class="title">
                <div class="dom">
                  <h4><strong>Informacion de jefe inmediato</strong></h4>
                </div>
               </div>  

                <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido paterno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido paterno del jefe inmediato" id="ape_pater_jef" name="ape_pater_jef">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido paterno del jefe inmediato" id="ape_mater_jef" name="ape_mater_jef">
                   </div>
                 </div>
               </div>                   

               <div class="form-group">
                 <div class="dom">
                  <label for="">Nombre(s)</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre del jefe inmediato" id="nom_jef" name="nom_jef">
                   </div>
                 </div>
                </div>                   

                <div class="form-group">
                 <div class="dom">
                  <label for="">Puesto que desempeña el jefe</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Puesto del jefe inmediato" id="puesto_jef" name="puesto_jef">
                   </div>
                 </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">No. empleado</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero de empleado del jefe" id="no_empleado_jef" name="no_empleado_jef">
                   </div>
                 </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">Fecha y hora de comunicacion del riesgo de trabajo</label>
                   <div class="inputD">
                    <input type="date" class="form-control" id="fech_riesgo" name="fech_riesgo">
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
                  <label for="">Fecha(La de impresion de la cedula)</label>
                   <div class="inputD">
                    <input type="date" class="form-control" placeholder="Nombre de la dependencia" id="fech_realiz" name="fech_realiz" value=<?php echo $fecha_hoy;  ?> readonly>
                   </div>
                </div>
                <div class="form-group">
                      <div class="title">
                <div class="dom">
                  <h4><strong>Nombre de subdelegado de prestaciones del ISSSTE</strong></h4><hr>
                </div>
               </div>  

                <div class="dom">
                  <label for="">Apellido paterno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="ape_pat_sub"
                    value="">
                   </div>
                  </div>
                </div>

                <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="ape_mat_sub"
                    value="">
                   </div>
                  </div>
                </div>

                <div class="dom">
                  <label for="">Nombre</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="nom_sub"
                    value="">
                   </div>
                  </div>
                </div>
                
                      

                </div>
              </div>
          </div>
         

           <div class="btn-group col-sm-8 col-lg-offset-9">
            	<input type="submit" name="regiss" class="btn btn-success" value="Registrar">
           </div> 
         </div>                    
     
           
      	</form>

     </div>
	 	<br><br><br>
