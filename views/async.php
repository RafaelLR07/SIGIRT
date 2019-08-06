<?php 

/**
* 
*/
require_once "../controllers/pacientes_controller.php";
require_once "../models/f02_model.php";

class async 
{
	public $valor;
	function imprimir()
	{
		$val = $this->valor;
		$res = control_f02::imprimir($val);
		echo $res;
	}

	function imprimir2()
	{
		$val = $this->valor;
		$res = control_f02::pacAct_controller();
		echo $res;
	}
}

if(isset($_POST['consulta'])){

	$a = new async();
	$a->valor =  $_POST['consulta'];
	$a->imprimir();
	
}else{
	$b = new async();
	$b->imprimir2();
}