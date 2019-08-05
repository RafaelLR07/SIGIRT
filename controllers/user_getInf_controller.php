	
<?php 

/**
* 
*/
class user_get_Inf
{
	public function getProfile_info($id,$tipo_user)
	{
		$respuesta = log_model::getProfile_infoM($id,$tipo_user);  
		return $respuesta;
	}
		
}