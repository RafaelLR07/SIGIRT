<?php 

	/**
	* 
	*/
	class f03_controller
	{	
		public function getSizeDoc($token)
		{	
			$resp = "";
			$tam = 0;
			$respuesta_grl = datos_f03::getDocs_form($token);
			foreach ($respuesta_grl as $key);
			return $key;
		}

		public function getDocs_form($token)
		{
			$respuesta=  datos_f03::getDocs_form($token);
			foreach ($respuesta as $key);
			return $key;
		}
		public function getInf($token)
		{
			$respuesta=  datos_f03::getInf($token);
			foreach ($respuesta as $key);
			return $key;
		}

		public function getTipo($token)
		{
			$respuesta=  datos_f03::getTipo($token);
			foreach ($respuesta as $key);
			$tipo = $key['tip'];
			return $tipo;
		}
		
		public function getDocuments($tipo)
		{
			$respuesta=  datos_f03::getDocs_inf($tipo);
			
			return $respuesta;
		}

		public function scannDocums($alias,$token)
		{
			$respuesta=  datos_f03::getDoc($alias,$token);
			if($respuesta == null){
				return "no";
			}else{
				return "si";
			}
			
			
		}

		public function upF03($token)
		{
			if(isset($_POST['ups'])){
				
				if(isset($_POST['grl_doc'])){
					
					
					$vaa = $_POST['grl_doc'];

					$contador=1;
					$docus = array( 
							"docum1" =>  "","docum2" =>  "","docum3" =>  "",
							"docum4" =>  "","docum5" =>  "","docum6" =>  "",
							"docum7" =>  "","docum8" =>  "","docum9" =>  "",
							"docum10" =>  "","docum11" =>  "","docum12" =>  "",
							"docum13" =>  "","docum14" =>  "","docum15" =>  "",
							"docum16" =>  "","docum17" =>  "","docum18" =>  "",
							"docum19" =>  "","docum20" =>  "","docum21" =>  "",
							"docum22" =>  "","docum23" =>  "","docum24" =>  "",
							"docum25" =>  "","docum26" =>  "","docum27" =>  "",
							"docum28" =>  "","docum29" =>  "","docum30" =>  "",
							"docum31" =>  "","docum32" =>  "","docum33" =>  "",
							"docum34" =>  "","docum35" =>  "");

					foreach ($vaa as $key => $valor) {
						$docus["docum$contador"] = $valor;
					 	$contador++;
					 }

					$tipo = "A";
					$respuesta=  datos_f03::ups_docs($token,$docus);
			
					return $respuesta;

				}

			}
		}

		public function registrarF03($token,$tipo){
			if(isset($_POST['regiss'])){
				
				if(isset($_POST['grl_doc'])){
					//echo var_dump($_POST['grl_doc']);
					$vaa = $_POST['grl_doc'];

					$contador=1;
					$docus = array( 
							"docum1" =>  "","docum2" =>  "","docum3" =>  "",
							"docum4" =>  "","docum5" =>  "","docum6" =>  "",
							"docum7" =>  "","docum8" =>  "","docum9" =>  "",
							"docum10" =>  "","docum11" =>  "","docum12" =>  "",
							"docum13" =>  "","docum14" =>  "","docum15" =>  "",
							"docum16" =>  "","docum17" =>  "","docum18" =>  "",
							"docum19" =>  "","docum20" =>  "","docum21" =>  "",
							"docum22" =>  "","docum23" =>  "","docum24" =>  "",
							"docum25" =>  "","docum26" =>  "","docum27" =>  "",
							"docum28" =>  "","docum29" =>  "","docum30" =>  "",
							"docum31" =>  "","docum32" =>  "","docum33" =>  "",
							"docum34" =>  "","docum35" =>  "");

					foreach ($vaa as $key => $valor) {
						$docus["docum$contador"] = $valor;
					 	$contador++;
					 }

					
					$respuesta=  datos_f03::regis_docs($tipo,$token,$docus);
			
					return $respuesta;

				}

			}
		}




	}