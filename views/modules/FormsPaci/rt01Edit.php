<?php 
  include_once "class/f02_methods.php";
  date_default_timezone_set('America/Mexico_City');
  $fecha_hoy = strftime("%Y-%m-%d");
 // $id_pac = $_GET['pac'];
  $token = $_GET['token'];
  if(isset($_GET['edit'])){
      echo "<div class='alert alert-success alert-dismissible fade in'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Exito! <strong>Actualizado correctamente</strong></div>";
  }  

  //buscar el token del f02 mayor
  $f01_controller = new f01_controller();
  $info_grl = $f01_controller->llenadoF01_up($token);
  if ($info_grl=="error") {
     header("Location: content.php?p=dashboard");
  }

 
  //instancia de la clase general de funciones
  $methods = new f02_methods();

  //finalizacion
  $request_fina = $f01_controller->fina_r01($token);
  if($request_fina=="success"){
     header("Location:content.php?p=dashboard");
 
     }

  //edicion
  $request = $f01_controller->update_f01($token);
  if($request=="success"){
       header("location: content.php?p=rt01Edit&edit=true&token=".$token);

    }else if($request=="Error"){
      echo "<div class='alert alert-danger alert-dismissible fade in'><a href='#'' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error <strong>¡en el usuario ó contraseña invalido!</strong></div>";
    }
 /* if($valor!="error" && $valor!=""){
     header("Location: content.php?p=formatos&form=2&token=$valor");
  }else if ($valor=="error") {
     echo "error";
  }*/
  


 ?>

  
	<div class="container">
  <div class="title" align="center">
      <strong><h3>Formato RT-01 (Avance)</h3></strong><hr>
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
                  <input type="text" class="form-control" id="fecha_nac" name="apep_fam" placeholder="Apellido partno" value="<?php echo $info_grl['ape_pat_fam'] ?>">
              </div>
          </div>
          
          <div class="form-group">
              <label for="">Apellido materno</label>
              <div class="input">
                  <input type="text" class="form-control" id="edad" placeholder="Apellido materno" name="apem_fam" value="<?php echo $info_grl['ape_mat_fam'] ?>">
              </div>
          </div>

          <div class="form-group">
              <label for="">Nombre</label>
              <div class="input">
                  <input type="text" class="form-control" name="nom_fam" id="fecha_nac" placeholder="Nombre" value="<?php echo $info_grl['nom_fam'] ?>">
              </div>
          </div>
          

          <div class="form-group">
              <label for="">Parentesco</label>
              <div class="input">
                    <input type="text" class="form-control" id="estado" name="parentesco" placeholder="Parentesco" value="<?php echo $info_grl['parentesco'] ?>">
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
                  <input type="text" class="form-control" id="no_empleado" name="no_empleado" placeholder="Numero de empleado" value="<?php echo $info_grl['no_empleado'] ?>">
              </div>
          </div>

              <div class="form-group">
                  <label for="">Puesto</label>
                  <div class="inputD">
                    <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto laboral" value="<?php echo $info_grl['puesto'] ?>">
                  </div>
              </div>

              <div class="form-group">
              <label for="">Fecha de ingreso laboral</label>
              <div class="inputD">
                  <input type="date" class="form-control" id="fecha_in" name="fecha_in" value="<?php echo $info_grl['fecha_ing_laboral'] ?>">
              </div>
          </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">Descripción de actividades</label>
              <div class="inputD">
                  <input type="text" class="form-control" id="desc_act" name="desc_act" placeholder="Descripcion de actividades" value="<?php echo $info_grl['descripcion_actividades'] ?>">
              </div>
          </div>
  
            <div class="form-group">
              <label for="exampleFormControlInput1">Fecha de primera cotización</label>
              <div class="inputD">
                  <input type="date" class="form-control" id="fecha_cotiza" name="fecha_cotiza" value="<?php echo $info_grl['fecha_pri_cotizacion']?>">
              </div>
            </div>
                  
            <div class="form-group">
              <label for="">Turno de trabajo</label>
              <div class="inputD">
                  <?php 
                    $turn = $methods->turnoScann($info_grl['turno']);

                  ?>
                  <select name="turno_tra" class="form-control" id="turno_tra">
                      <option value="matutino" <?php echo $turn ['matutino']; ?> >Matutino</option>  
                      <option value="vespertino" <?php echo $turn ['vespertino']; ?> >Vespertino</option>    
                      <option value="nocturno" <?php echo $turn ['nocturno']; ?> >Nocturno</option>    
                      <option value="mixto" <?php echo $turn ['mixto']; ?> >Mixto</option>      
                      <option value="jornada_acumulada" <?php echo $turn ['jornada_acumulada']; ?> >Jornada Acumulada</option>      
                      </select>
              </div>
            </div>

            <div class="form-group">
              <label for="">Hora de entrada</label>
              <div class="inputD">
                  <input type="time" class="form-control" id="hor_entr" name="hor_entr" value="<?php echo $info_grl['hora_entra'] ?>">
              </div>
            </div>

            <div class="form-group">
              <label for="">Hora de salida</label>
              <div class="inputD">
                  <input type="time" class="form-control" id="hor_salid" name="hor_salid" value="<?php echo $info_grl['hora_sali']; ?>">
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
              <?php 
                $fecha_enf = $methods->llenaInputDatetime($info_grl['fecha_accidente']);
               
               ?>
      
               <div class="form-group">
                 
                 <div class="dom">
                  <label for="">Fecha y hora del accidente o probable inicio de la enfermedad</label>
                  <div class="inputD">
                    
                    <input type="datetime-local" class="form-control" id="fech_acc" name="fech_acc" value="<?php echo $fecha_enf ?>" >
                   </div>
                  </div>

              </div>
                <div class="form-group">
                  
                      <div class="dom">
                  <label for="">Descripcion detallada del accidente de trabajo</label>
                   <div class="inputD">
                    <textarea name="desc_rt" onkeyup="mayus(this)" type="text" class="form-control" id="desc_rt" placeholder="Descripcion detallada del accidente" onkeyup="mayus(this)"><?php echo $info_grl['descripcion_rt']; ?></textarea>
                    </div>
                  </div>
                </div>

                 <div class="form-group">
                  <
                  <div class="dom">
                  <label for="">Circunstancias en las kue ocurrio el accidente</label>
                  <div class="inputD">
                    <?php 
                      $select=  $methods->scannNaturaF01($info_grl['circuns']);
                     ?>
                    <select name="circuns" class="form-control" id="circuns">
                      <option value="A" <?php echo $select['A']; ?> >Dependencia</option>  
                      <option value="B-T" <?php echo $select['B-T']; ?>>Trayecto a trabajo</option>    
                      <option value="B-D" <?php echo $select['B-D']; ?>>Trayecto a domicilio</option>    
                      <option value="A-T" <?php echo $select['A-T']; ?>>Tiempo extra</option>      
                      <option value="C" <?php echo $select['C']; ?>>Comision</option>      
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
                    <input type="text" class="form-control" value="<?php echo $info_grl['dependencia']  ?>" readonly >
                   </div>
                 </div>
               </div>


               <div class="form-group">
                
                 <div class="dom">
                  <label for="">Numero de ramo</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero de ramo" id="ramo" name="ramo" value="<?php echo $info_grl['ramo']  ?>">
                   </div>
                 </div>
               </div>
              
               <div class="title">
               
                <div class="dom">
                  <h4><strong>Nombre del representante legal de la dependencia</strong></h4><hr>
                </div>
               </div>
                <br>
                <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido paterno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido paterno del representante" id="ape_pater_rep" name="ape_pater_rep" value="<?php echo $info_grl['ape_pat_repre_dep']  ?>">
                   </div>
                 </div>
               </div>
               
               <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido materno del representante" id="ape_mater_rep" name="ape_mater_rep" value="<?php echo $info_grl['ape_mat_repre_dep']  ?>">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Nombre</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre del representante de la empresa" id="nombre_rep" name="nombre_rep"value="<?php echo $info_grl['nom_repre_dep']  ?>">
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
                    <input type="text" class="form-control" placeholder="Calle" id="calle_dep" name="calle_dep" value="<?php echo $info_grl['calle']  ?>">
                   </div>
                 </div>
               </div>
               
               <div class="form-group">
                 <div class="dom">
                  <label for="">Numero</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero" id="num_dep" name="num_dep" value="<?php echo $info_grl['nomero'];?>">
                   </div>
                 </div>
               </div>          

               <div class="form-group">
                 <div class="dom">
                  <label for="">Colonia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Colonia" id="col_dep" name="col_dep" value="<?php echo $info_grl['colonia']  ?>">
                   </div>
                 </div>
               </div>       

                <div class="form-group">
                 <div class="dom">
                  <label for="">Delegacion o municipio</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Delegacion o municipio" id="muni_dep" name="muni_dep" value="<?php echo $info_grl['municipio']  ?>">
                   </div>
                 </div>
               </div> 

               <div class="form-group">
                 <div class="dom">
                  <label for="">CP</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Codigo postal" id="cp_dep" name="cp_dep" value="<?php echo $info_grl['cp']  ?>">
                   </div>
                 </div>
               </div>
                
                <div class="form-group">
                 <div class="dom">
                  <label for="">Telefono de la dependencia</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Telefono de la dependencia" id="tel_dep" name="tel_dep" value="<?php echo $info_grl['telefono_dep']  ?>">
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
                    <input type="text" class="form-control" placeholder="Apellido paterno del jefe inmediato" id="ape_pater_jef" name="ape_pater_jef" value="<?php echo $info_grl['ape_pat_jef']  ?>">
                   </div>
                 </div>
               </div>

               <div class="form-group">
                 <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Apellido paterno del jefe inmediato" id="ape_mater_jef" name="ape_mater_jef" value="<?php echo $info_grl['ape_mat_jef']  ?>">
                   </div>
                 </div>
               </div>                   

               <div class="form-group">
                 <div class="dom">
                  <label for="">Nombre(s)</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Nombre del jefe inmediato" id="nom_jef" name="nom_jef" value="<?php echo $info_grl['nom_jef']  ?>">
                   </div>
                 </div>
                </div>                   

                <div class="form-group">
                 <div class="dom">
                  <label for="">Puesto que desempeña el jefe</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Puesto del jefe inmediato" id="puesto_jef" name="puesto_jef" value="<?php echo $info_grl['puesto_jefe']  ?>">
                   </div>
                 </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">No. empleado</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Numero de empleado del jefe" id="no_empleado_jef" name="no_empleado_jef" value="<?php echo $info_grl['no_empleado_jef']  ?>">
                   </div>
                 </div>
                </div>

                <div class="form-group">
                 <div class="dom">
                  <label for="">Fecha y hora de comunicacion del riesgo de trabajo</label>
                  <?php 
                    $fecha_ent = $methods->llenaInputDatetime($info_grl['fecha_entera_jef']);
                   ?>
                   <div class="inputD">
                    <input type="datetime-local" class="form-control" id="fech_riesgo" name="fech_riesgo" value="<?php echo $fecha_ent ?>">
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
                    <input type="date" class="form-control" placeholder="Nombre de la dependencia" id="fech_realiz" name="fech_realiz" value=<?php echo $info_grl['fecha_reali'];  ?> readonly>
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
                    value="<?php echo $info_grl['ape_pat_subdel'] ?>">
                   </div>
                  </div>
                </div>

                <div class="dom">
                  <label for="">Apellido materno</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="ape_mat_sub"
                     value="<?php echo $info_grl['ape_mat_subdel'] ?>">
                   </div>
                  </div>
                </div>

                <div class="dom">
                  <label for="">Nombre</label>
                   <div class="inputD">
                    <input type="text" class="form-control" placeholder="Oficina_adscripcion" id="delegacion" name="nom_sub" value="<?php echo $info_grl['nom_subdelg'] ?>">
                   </div>
                  </div>
                </div>
                
                      

                </div>
              </div>
          </div>
       

           <div class="btn-group col-sm-8 col-lg-offset-6">
              <?php 
                $isFin = $f01_controller->is_fin($token);
                if($isFin=="no"){
              ?>
            	<input type="submit" name="regiss" class="btn btn-success" value="Registrar">
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
  
