<?php 
	//salidas de las vistas del usuario
	include_once "controllers/main_controller.php";
	include_once "controllers/pacientes_controller.php";
	include_once "controllers/pac_activos_controller.php";
	include_once "controllers/cedula_controller.php";
	include_once "controllers/f01_controller.php";
	include_once "controllers/f03_controller.php";
	include_once "controllers/user_getInf_controller.php";
	
	include_once "models/main_model.php";
	include_once "models/f02_model.php";
	include_once "models/f01_model.php";
	include_once "models/f03_model.php";
	include_once "models/cedula_model.php";
	include_once "models/log_model.php";
	//include_once "models/pac_pendientes_model.php";

	$main_controller = new main_controller();
	$main_controller->main_template();
	
	//$main_controller = new f02();
	//$main_controller->registro_f02_Controller();


 ?>