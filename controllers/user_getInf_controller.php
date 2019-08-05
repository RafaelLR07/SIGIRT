<?php 

/**
* 
*/
class user_get_Inf
{
	public function getProfile_infoM($id)
	{
		$respuesta = log_model::getProfile_infoM('medicos',$id);  

	}
		
}