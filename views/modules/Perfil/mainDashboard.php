CREATE DEFINER=`root`@`localhost` PROCEDURE `getIdf02`(in pac_grl INT)
BEGIN
	Declare ID int;
    Declare token_tram VARCHAR(35);
      
	SET ID = (SELECT MAX(id_frt02) from frt_02 WHERE id_pacientes_grl = pac_grl);
    SET token_tram = (SELECT token  from frt_02 WHERE id_frt02 = ID);
	SELECT
		grl.fecha_nac, grl.edad, grl.sexo, grl.tel_particular,
		grl.mail, grl.calle, grl.colonia, grl.localidad, grl.num_int,
		grl.num_ext, grl.municipio, grl.cp, grl.estado,
		ced.dependencia ,ced.ofi_adscripcion ,ced.actividad, 
		ced.unidad_medica_aten, ced.ramo, ced.tel_oficina, ced.otro_riesgo, 
		ced.cali_otro_ries, ced.secuelas, ced.incapacidad, ced.porcentaje,
		ced.cli_ads, ced.fecha_reali,ced.delegacion, ced.token ,ced.id_frt02

	FROM 
		pacientes_grl as grl INNER JOIN cedula_ini as ced 
    WHERE 
		id_frt02 = ID AND 
        token = token_tram AND 
        id_pacientes_grl = pac_grl;
        
        
    
    
    
    
END
<center><h2>Tramite de riesgo de trabajo</h2></center>
<div class="container">
		<div class="perfil">
				<div class="person panel panel-danger">
			      <div class="panel-heading"><h4>Formatos</h4></div>
			      	<div class="panel-body">
			      		<?php 
			      		//si no existe registro previo manda a registro
			      		//si no manda a update o visor
			      			echo $_SESSION['ide'];
			      		 ?>
			      		<!--<a href="content.php?p=cedula&pac=40" class="forms"><h4>CÉDULA INICIAL</h4></a>-->
			      		<h4 class="letter">CÉDULA INICIAL</h4>
						
						<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=cedula&pac=44'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>

			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=formatos&form=2&token=1562869233fcNXAWVQ'">
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>


			      		<!--<a href="content.php?p=rt-01&pac=40" class="forms"><h4>FORMATO RT-01</h4></a>-->
			      		<br><br>
			      		<h4 class="letter">FORMATO RT-01</h4>
						
						<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=rt-01&pac=40'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>

			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=formatos&form=4&token=1563822730DWbLXBaa'">
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>

			      		<!--<a href="" class="forms"><h4>FORMATO RT-03</h4></a>-->
			      		
			      		<br><br>
			      		<h4 class="letter">FORMATO RT-03</h4>
						
						<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='content.php?p=rt-03&pac=40'">
            				<span id="icono_ver" class="glyphicon glyphicon-edit"></span>
          				</button>


			      		<button id="boton_actio" type="button" class="btn btn-primary btn-lg" onclick="window.location.href='#'"  <?php echo "disabled";  ?>>
            				<span id="icono_ver" class="glyphicon glyphicon-eye-open"></span>
          				</button>			      	
			      	</div>
			    </div>
	   	</div>
    	<div class="info">
			
				<div class="panel panel-danger">

			      	
					  

				   </div>
			
	      	</div>
      	</div>


	
		<?php include "views/modules/Modals/Form_rt03.php"; ?>  
	

	</div>
	<br><br><br>
 