
<?php 
	$docs_rt03 = new f03_controller();
  	$documents = $docs_rt03->getDocuments();

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
  					<?php 
  						echo var_dump($documents);
  					 ?>
                    <table class="tabla_doc">                    	
							
                    	<tr>

                    		<td>OFICIO DE SOLICITUD DE CERTIFICACION DE LICENCIAS MEDICAS</td>

                    		<td class="buttons">                         
		                     	<input type="checkbox" name="ad" class="form-control">   
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
                    	</tr>
                    </table>
                  
            		<!--
                      <div class="avances">
                      	<span id="icono" class="glyphicon glyphicon-plus"></span>
					  	<label class="docums" for="drug">OFICIO DE NOTIFICACION ANTE EL ISSSTE</label>
					  	<input type="checkbox" value="1" name="name" id="docu" class="">
						<br>
						<span id="icono" class="glyphicon glyphicon-plus"></span>
					  	<label class="docums" for="drug">OFICIO DE NOTIFICACION ANTE EL ISSSTE</label>
					  	<input type="checkbox" value="1" name="name" id="docu" class="">
						<br><span id="icono" class="glyphicon glyphicon-plus"></span>
					  	<label class="docums" for="drug">OFICIO DE NOTIFICACION ANTE EL ISSSTE</label>
					  	<input type="checkbox" value="1" name="name" id="docu" class="">
						<br>
						
                        
						</div>
						<br> <br><br>  <br>		

						<table border="0">
							<tr>
								<td width="500" border="1">
					  	<label class="docums" for="drug">OFICIO DE NOTIFICACION ANTE EL ISSSTE
</label></td>
								<td width="200" align="center"><input type="checkbox" value="1" name="name" id="docu" class=""></td>
							</tr>
						</table>
                
             
       
		<div>
           <div class="btn-group col-sm-8 col-lg-offset-9">
            	<input type="submit" name="regiss" class="btn btn-success" value="Registrar">
           </div> 
         </div>                    
      </div> 
           -->
      	</form>

     </div>
	 	<br><br><br>
  

