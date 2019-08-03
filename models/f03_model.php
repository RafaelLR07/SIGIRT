<?php 
	
	/**
	* 
	*/

	require_once "DBconexion.php";

	class datos_f03 extends Connection
	{
	
		public function getDocs_inf($tipo){

		    $stmt = Connection::open()->prepare("CALL mydb.getDocs(:tipo)");

			$stmt->bindParam(":tipo",$tipo ,PDO::PARAM_STR);
			
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();


		}
	/*
	public function regist_pac_general($dates,$table){
		$stmt = Connection::open()->prepare("INSERT INTO $table(ape_pater, ape_mater, nombre, curp, rfc) VALUES (:ap_pater, :ap_mater, :nombre,:curp,:rfc)");

			$stmt->bindParam(":ap_pater", $dates['ap_pater'],PDO::PARAM_STR);
			$stmt->bindParam(":ap_mater", $dates['ap_mater'],PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $dates['nombre'],PDO::PARAM_STR);
			$stmt->bindParam(":curp", $dates['curp'],PDO::PARAM_STR);
			$stmt->bindParam(":rfc", $dates['rfc'],PDO::PARAM_STR);



			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();

	}*/







	}
