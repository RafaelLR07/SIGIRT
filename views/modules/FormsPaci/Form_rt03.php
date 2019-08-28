
<?php 
  include_once "class/f02_methods.php";
  $token = $_GET['token'];
  $action = $_GET['actio'];
  $methods = new f02_methods();


	$docs_rt03 = new f03_controller();
  $tipo = $docs_rt03->getTipo($token);
  $documents = $docs_rt03->getDocuments($tipo);

  
  
  
  if($action == "regis"){
   
    $result_insert = $docs_rt03->registrarF03($token,$tipo);
    if($result_insert == "success" ){
      header("Location: content.php?p=dashboard");
    }
  
  }else if($action == "edit"){
    $result_ups = $docs_rt03->upF03($token);
  }


 ?>
 
<div class="container">
  <div class="title" align="center">
      <strong><h3>Formato RT-03</h3></strong><hr>
  </div>	
  <br><br><br>
          
  <div class="panel panel-success">
             <div class="panel-heading">
             	<strong><h3>Documentación requerida</h3></strong><hr>     
             </div>
             <div class="panel-body">
             
  <form class="" method="POST">
  					        
                    <table class="tabla_doc">                    	
							        <tr>
                          <th><center>No.</center></th>
                          <th><center>Documento</center></th>
                          <th><center>Estado</center></th>
                      </tr>
                      <?php 
                          //echo sizeof($documents);
                          $var_check = "";
                          $contador = 1;
                          foreach ($documents as $key) {
                            
                            $name = $key['nombre'];
                            $alias = $key['alias'];
                            $suple = "white";
                            if($key['grado'] == "SUPLE"){
                                $suple = "beige";
                            }

                            if($key['grado'] == "OBLI"){
                                $suple = "#d4f3d4";
                            }
                            
                            $namex = $docs_rt03->scannDocums($alias,$token);
                            if($namex == "si"){
                              $var_check = "checked";  
                            }else{
                              $var_check = "";
                            }

                            echo "<tr>";
                              echo "<td>$contador.-</td>";
                              echo "<td style = 'background:$suple'>$name</td>";
                              echo "<td class='buttons'>                         
                                    <input type='checkbox' value='$alias' name='grl_doc[]' id='rina' class='form-control' $var_check>
                                    </td>";
                            echo "</tr>";

                            $var_check = "";
                            $contador++;
                          }

                         ?>
                      <!--
                    	<tr>

                    		<td>OFICIO DE SOLICITUD DE CERTIFICACION DE LICENCIAS MEDICAS</td>

                    	  <td class="buttons">                         
		                     	<input type="checkbox" value="OFICIO DE SOLICITUD DE CERTIFICACION DE LICENCIAS MEDICAS" name="padx[]" id="rina" class="form-control">
                        </td>

                    	</tr>

                    	<tr>
                    		<td>OFICIO JUSTIFICANDO FALTA DE CREDENCIAL DE ELECTOR</td>

                    		<td class="buttons">                         
		                     	<input type="checkbox" name="ad" class="form-control">   
		                    </td>
                    	</tr>

                    	<tr>
                    		<td>OFICIO DE SOLICITUD DE CERTIFICACION DE LICENCIAS MEDICAS</td>

                    		<td class="buttons">                         
		                     	<input type="checkbox" name="ad" class="form-control">   
		                    </td>
                    	</tr> -->

                    </table>
      
       
		      <div>
           <div class="btn-group col-sm-8 col-lg-offset-9">
            <?php 
              if($action == "regis"){

               echo '<input type="submit" name="regiss" class="btn btn-success" value="Registrar">';
              
              }else if($action == "edit"){
               echo '<input type="submit" name="ups" class="btn btn-success" value="Actualizar">';
              }

             ?>
            
           </div> 
         </div>                    
      </div> 
      
      	</form>

     </div>
	 	<br><br><br>
  

