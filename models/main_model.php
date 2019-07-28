<?php 
	
	/**
	* 
	*/
	class main_model
	{
		
		//function for router of the main pagle
		public function urlsModel($url_model){
			if($url_model=="content"){
				
				$module_url = "views/modules/inicio.php";				

			}else if($url_model=="inicio"||
			   $url_model=="fr02"){
			   $module_url = "views/modules/".$url_model.".php";

			}else if($url_model=="dashboard"||
			   $url_model=="fr02"){
			   $module_url = "views/modules/Perfil/mainDashboard.php";

			}else if($url_model=="cedula"||
			   $url_model=="fr02"){
			   $module_url = "views/modules/FormsPaci/Form_cedula.php";

			}
			else if($url_model=="rt-01"||
			   $url_model=="fr02"){
			   $module_url = "views/modules/FormsPaci/Form_rt01.php";

			}

			else if($url_model=="rt-03"||
			   $url_model=="fr02"){
			   $module_url = "views/modules/FormsPaci/Form_rt03.php";

			}
			else if($url_model=="activos"||$url_model=="pendientes"){
				$module_url = "views/modules/Pacientes_".$url_model."/".$url_model.".php";				
			}

			else if($url_model=="profile"){
				$module_url = "views/modules/Perfil/".$url_model."_user.php";				
			}

			else if($url_model=="usuarios"){
				$module_url = "views/modules/usuarios/".$url_model.".php";				
			}

			else if($url_model=="nuevo_paciente"){
				$module_url = "views/modules/Pacientes_activos/registrar_paciente.php";				
			}
			else if($url_model=="editarPaciente"){
				$module_url = "views/modules/Pacientes_activos/editar_paciente.php";				
			}

			else if($url_model=="formatos"){
				$module_url = "views/modules/formatos/template_grl.php";				
			}

			else if($url_model=="rt-02"){
				$module_url = "views/modules/formatos/form_rt-02.php";				
			}

			else if($url_model=="navv"){
				$module_url = "views/modules/Pacientes_activos/nav_tipos.php";				
			}


			else{
				$module_url = "views/modules/404_pagle.php";
			}

			return $module_url;

		}
		
	}


 ?>