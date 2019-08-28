
<?php 
	include_once "class/f02_methods.php";
	
	$methods = new f02_methods();

	$f02_inf = new Pacientes_activos();
	$val = $f02_inf->getToken_dash($_SESSION['ide']);

	$docs_rt03 = new f03_controller();
  	$tok = $val['token'];
  	$tipo = $docs_rt03->getTipo($tok);

  	$ced = new cedula_controller();
  	$f01 = new f01_controller();
	$is_fin_ced = "";
	$is_fin_f01 = "";
	$avan = 25;
 	$var_ddis = "disabled";

//	$f01 = new f01_controller();
//	$is_fin_f01 = $f01->is_fin($tok);

 ?>
<center><h2>Tramite de riesgo de trabajo</h2></center>
<div class="container">
		<div class="perfil">
				<div class="person panel panel-danger">
			      <div class="panel-heading"><h4>Formatos</h4></div>
			      	<div class="panel-body">
			      		<?php 
			      		//si no existe registro previo manda a registro

			      		//si no manda a update o visor


			      		 ?>
			      		<!--<a href="content.php?p=cedula&pac=40" class="forms"><h4>CÉDULA INICIAL</h4></a>-->
			      		
			      		<h4 class="letter">CÉDULA INICIAL</h4>
			      		<?php 
			      			$is_ced = $f02_inf->cedExist($tok);
			      			if($is_ced){
			      				$is_fin_ced = $ced->is_fin($tok);
			      			?>
			      			<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=cedulaup&pac=<?php echo $_SESSION['ide'] ?>&token=<?php echo $tok?>'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
	          				</button>
						<?php 
			      			}else{
			      			?>
							<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=cedula&pac=<?php echo $_SESSION['ide'] ?>&token=<?php echo $tok?>'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
	          				</button>
			      		<?php
			      			}
			      		 	?>
						<?php 
							$var_en_ced = "disabled";
							if($is_fin_ced=="si"){
								$var_en_ced = "enabled";
								$var_ddis = "enabled";
								$avan = $avan+25;
							}else{
								$var_en_ced = "disabled";
							}
						?>
						
			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=formatos&form=2&token=<?php echo $tok?>'" <?php echo $var_en_ced; ?>>
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>


			      		<!--<a href="content.php?p=rt-01&pac=40" class="forms"><h4>FORMATO RT-01</h4></a>-->
			      		<br><br>
			      		<h4 class="letter">FORMATO RT-01</h4>
			      		<?php 
			      		     $is_r1 = $f02_inf->f01Exist($tok);
			      		     
			      		     if($is_r1){
			      		     
								$is_fin_f01 = $f01->is_fin($tok);
			      		    ?>
			      		    <button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=rt01Edit&pac=<?php echo $_SESSION['ide'] ?>&token=<?php echo $tok ?>'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>
						<?php
			      		     }else{
			      		     	

			      		     ?>
			      		     <button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=rt-01&pac=<?php echo $_SESSION['ide'] ?>&token=<?php echo $tok?>'" <?php echo $var_ddis ?>>
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>
			      		<?php
			      		     }
			      		 ?>
						<?php 

							$var_en_f01 = "disabled";
							if($is_fin_f01=="si"){
								$var_en_f01 = "enabled";
								$avan = $avan+25;
							}else{
								$var_en_f01 = "disabled";
							}
					

						 ?>
					
			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=formatos&form=4&token=<?php echo $tok ?>'" <?php echo $var_en_f01 ?>>
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>

			      		<!--<a href="" class="forms"><h4>FORMATO RT-03</h4></a>-->
			      		
			      		<br><br>
			      		<h4 class="letter">FORMATO RT-03</h4>
						<?php 
							$is_r03 = $f02_inf->f03_exist($tok);
							$actio = "";
							if($is_r03){
								$actio = "edit";
								$docs_rt03 = new f03_controller();
							}else{
								$actio = "regis";
							}

						 ?>
						<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=rt-03&pac=<?php echo $_SESSION['ide'] ?>&token=<?php echo $tok?>&actio=<?php echo $actio ?>'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>
						
						<?php 
							$tip_form = 0;
							switch ($tipo) {
								case 'A':
									$tip_form=31;
									break;

								case 'B':
									$tip_form=32;
									break;

								case 'C':
									$tip_form=33;
									break;
								
								default:
									# code...
									break;
							}


						 ?>

			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=formatos&form=<?php echo $tip_form ?>&token=<?php echo $tok?>'"  <?php echo "enabled";  ?>>
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>			      	
			      	</div>
			    </div>
	   	</div>
    	   	<div class="info">
			
				<div class="panel panel-danger">

			      	<div class="panel-heading"><h4>Avance</h4></div>
			      	<div class="panel-body">
					 <center>
					  <div class="avances">
					  	<div class="title_avan">
					  	
					  	 <h4 class="title_a">Avance de tramite</h4>	
						 <h4 class="subtitle"></h4>
						 
						</div><br>
						<div class="grafica-avan">
						<?php 
						if($actio == "edit"){

							$arreF03 = $docs_rt03->getSizeDoc($tok);
							$total = $methods->scannSizeDocs($arreF03);
							if($total>9){
								$avan = $avan+25;
							}
						}

						 ?>
						 <input type="text" value="<?php echo $avan ?>" class="dial">
						</div>	
					 </center>		
					  </div>	
					  

				   </div>
			
	      	</div>';
      	</div>


	
		<?php include "views/modules/Modals/Form_rt03.php"; ?>  
	

	</div>
	<br><br><br>
 