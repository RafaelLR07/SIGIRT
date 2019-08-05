<?php 

/**
* 
*/
require_once "DBconexion.php";

class log_model extends Connection
{

	public function getProfile_infoM($id,$tipo_user)
	{	$kuery="";
		switch ($tipo_user) {
			case 'Paciente':
				//consulta cuando son pacientes
				$kuery = "CALL profilePaci(:identificador)";
				break;

			case 'Usuario':
				//consulta cuando son usuarios de oficina 
				$kuery = "SELECT nombre, email FROM usuarios WHERE id_usuario = :identificador";
				break;

			case 'Admin':
				//consulta cuando son usuarios admin
				$kuery = "SELECT nombre, email FROM usuarios WHERE id_usuario = :identificador";
				break;

			case 'Medico':

				//consulta cuando son medicos
				$kuery = "CALL profileMedic(:identificador)";
				break;
			
			default:
				return "error";
				break;
		}
		
		
		$stmt = Connection::open()->prepare($kuery);
		$stmt->bindParam(":identificador",$id, PDO::PARAM_STR);
	
	
		if($stmt->execute()){
			 $datos = $stmt->fetch();	
			if($datos){
				return $datos;
			}else{
				return "error";
			}
		}else{
			return "error";
		}
		
		
		$stmt->close();
		
	}
	
	public function logUser($table, $dat_log)
	{
		$kuery = "SELECT * FROM usuarios WHERE nombre = :usuario AND passwordU = :contra ";

		$stmt = Connection::open()->prepare($kuery);
		$stmt->bindParam(":usuario",$dat_log["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":contra",$dat_log["contra"], PDO::PARAM_STR);
	
		if($stmt->execute()){
			$datos = $stmt->fetch();	
			if($datos){
				return $datos;
			}else{
				return "error";
			}
		}else{
			return "error";
		}
		
		
		$stmt->close();
		
	}


	


}