<?php 



/**
* 
*/
class test_controller
{
	
	public function imprimir()
	{
		
			echo "0";
		
	}
	
}
if(isset($_POST['consulta'])){
	$a = new test_controller();
	$a->imprimir();
}