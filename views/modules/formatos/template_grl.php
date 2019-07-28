<center><h2>Expedicion de formato</h2></center>



<?php 
	
	$var_form = $_GET['form'];
	$tokenPac = $_GET['token'];
	$pdfSelected = "";
	if($var_form==1){
		echo "<center><h2>Formato de RT-02</h2></center>";
		echo "<center><iframe src='views/modules/formatos/form_rt-02.php?token=$tokenPac' class='formato'></iframe></center>"	;
	}
	if($var_form==2){
		echo "<center><h2>Formato de Cédula inicial</h2></center>";
		echo "<center><iframe src='views/modules/formatos/cedula_ini.php?token=$tokenPac' class='formato'></iframe></center>";
	}
	//RT 03 A
	if($var_form==4){
		echo "<center><h2>Formato de RT-01 </h2></center>";
		echo "<center><iframe src='views/modules/formatos/FORMATOS RT-01.php?token=$tokenPac' class='formato'></iframe></center>";
	}
	//RT 03 B
	if($var_form==32){
		echo "<center><h2>Formato de RT-03 B</h2></center>";
		echo '<center><iframe src="views/modules/formatos/frt03_b.php" class="formato"></iframe></center>'	;
	}
	//RT 03 C
	if($var_form==33){
		echo "<center><h2>Formato de RT-03 C</h2></center>";
		echo '<center><iframe src="views/modules/formatos/frt03_c.php" class="formato"></iframe></center>'	;
	}



 ?>

 









 <br>
 <br>
 <br>
 <br>
	








 <linea para joder el codigo de rafa, holi rafa :v>