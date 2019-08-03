<?php 

	/**
	* 
	*/
	class f03_controller
	{
		
		public function getDocuments()
		{
			$respuesta=  datos_f03::getDocs_inf('A');
			
			return $respuesta;
		}




	}