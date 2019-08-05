<?php 

/**
* 
*/
class log_controller
{
	
	public function logApp()
	{
		if(isset($_POST['log'])){
			$dat_log = array('usuario' =>$_POST['usuario'] ,
							 'contra' =>$_POST['contra'] 	 );

			$respuesta = log_model::logUser('usuarios',$dat_log);  

			if ($respuesta == "error") {
				
				return $respuesta;

			}else{

				switch ($respuesta['tipo_user']) {
					case 'Admin':
						$nom_user = $respuesta["nombre"];
						session_start();
						//$_SESSION["ide"]= true;
						$_SESSION["nom_usuario"] =$nombreUsuario;
						$_SESSION["tipoUsuario"] = 'Admin';
						$_SESSION['validar'] = true;	
						$_SESSION['email'] = $respuesta['email'];		
						$_SESSION['ide'] = $respuesta['id_usuario'];	
						header("location:content.php?p=content");
						break;

					case 'Usuario':
						$nom_user = $respuesta["nombre"];
						session_start();
						$_SESSION['validar'] = true;	
						$_SESSION["nom_usuario"] =$nombreUsuario;
						$_SESSION["tipoUsuario"] = 'Usuario';	
						$_SESSION['email'] = $respuesta['email'];			
						$_SESSION['ide'] = $respuesta['id_usuario'];
						header("location:content.php?p=content");
						break;

					case 'Paciente':
						$nom_user = $respuesta["nombre"];
						session_start();
						//$_SESSION["ide"]= true;
						$_SESSION["nom_usuario"] =$nombreUsuario;
						$_SESSION["tipoUsuario"] = 'Paciente';
						$_SESSION['validar'] = true;		
						$_SESSION['email'] = $respuesta['email'];			
						$_SESSION['ide'] = $respuesta['identificador'];
						header("location:content.php?p=content");
						break;
						break;

					case 'Medico':
						$nom_user = $respuesta["nombre"];
						session_start();
						//$_SESSION["ide"]= true;
						$_SESSION["nom_usuario"] =$nombreUsuario;
						$_SESSION['validar'] = true;
						$_SESSION["tipoUsuario"] = 'Medico';
						$_SESSION['email'] = $respuesta['email'];
						$_SESSION['ide'] = $respuesta['identificador'];
						header("location:content.php?p=content");
						break;
						break;
					
					default:
						# code...
						break;
					}
			}
			 


		}
	}
	


}