<?php 

/**
* 
*/
require_once "../controllers/usuarios_controller.php";
require_once "../models/usuarios_model.php";
session_start();
class async 
{
	public $filtro;


	function usuariosquery()
	{	
		if ($this->filtro != ''){
			$fill = $this->filtro;
			$resp = usuarios_controller::usuarios_query($fill);
		
		}else {
			$fill = "";
			$resp = usuarios_controller::usuarios_query($fill);
			
		}
		
		return $resp;
	}



}

if(isset($_POST['users'])){
	
	$d = new async();
	$d->filtro =  $_POST['users'];
	$result = $d->usuariosquery();
	echo $result;

}
	
else {
	$e = new async();
	$result = $e->usuariosquery();
	echo $result;
}