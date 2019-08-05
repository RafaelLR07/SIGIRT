<?php 

/**
* 
*/
require_once "DBconexion.php";

class log_model extends Connection
{

	public function getProfile_infoM($tabla,$id)
	{
		$kuery = "SELECT cedula, apellido_pat, apellido_mat, nombre, clave 
					FROM $tabla WHERE id_medicos = :identificador";

		$stmt = Connection::open()->prepare($kuery);
		$stmt->bindParam(":identificador",$dat_log["usuario"], PDO::PARAM_STR);
	
	
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