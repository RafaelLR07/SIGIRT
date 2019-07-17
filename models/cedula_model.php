<?php 

	/**
	* 
	*/
	require_once "DBconexion.php";
	class cedula_model extends Connection
	{	

		public function getAnt_F02($table, $id){
			$kuery = "SELECT id_frt02, fecha_atencion  FROM frt_02 WHERE id_pacientes_grl = :id_grl  ORDER BY id_frt02 DESC LIMIT 1,1";
			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":id_grl",$id, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
					
			$stmt->close();
			
		}


		public function getPac_grl($table, $id){
			$stmt = Connection::open()->prepare("SELECT * FROM ".$table." WHERE id_pacientes_grl = :id");
			$stmt->bindParam(":id",$id, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();
			
		}

		public function getDatos_f02($tabla,$token){
			$stmt = Connection::open()->prepare("SELECT * FROM ".$tabla." WHERE token = :token");
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

		public function getDatos_ced($tabla,$token){
			$stmt = Connection::open()->prepare("SELECT * FROM ".$tabla." WHERE token = :token");
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

		}

		public function getTokenF02($table, $id_pac){
			
			$query = "SELECT * FROM $table WHERE 
					 id_frt02 = (SELECT MAX(id_frt02) AS id FROM frt_02 WHERE id_pacientes_grl = :id)";

			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":id",$id_pac, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetchAll();
			
			
		}

		public function serch_f02ID($table, $id_pac){
			$query = "SELECT MAX(id_frt02) AS id FROM $table WHERE 					  id_pacientes_grl = :id";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":id",$id_pac, PDO::PARAM_STR);
			$stmt->execute();
			$id_f02 = $stmt->fetchAll();
			$idd = implode($id_f02[0]);
			return $idd;
		}
		

		public function regist_cedula_inicial($tabla,$datos,$id_f02,$token){
			$stmt = Connection::open()->prepare("INSERT INTO cedula_ini(
					dependencia ,ofi_adscripcion ,actividad, 
					unidad_medica_aten, ramo, tel_oficina, otro_riesgo, 
					cali_otro_ries, secuelas, incapacidad, porcentaje,
					cli_ads, fecha_reali, delegacion, token ,id_frt02) 
							VALUES (
								:dependencia, :ofi_adscripcion, 
								:actividad, :unidad_medica_aten, :ramo, 
								:tel_oficina, :otro_riesgo, :cali_otro_ries, 
								:secuelas, :incapacidad, :porcentaje,
								:cli_ads, :fecha_reali, :delegacion,:token, :id_frt02)");


			$stmt->bindParam(":dependencia",$datos['nom_dep'], PDO::PARAM_STR);
			$stmt->bindParam(":ofi_adscripcion",$datos['adscripcion'], PDO::PARAM_STR);
			$stmt->bindParam(":actividad",$datos['actividad'], PDO::PARAM_STR);
			$stmt->bindParam(":unidad_medica_aten",$datos['uni_med'], PDO::PARAM_STR);
			$stmt->bindParam(":ramo",$datos['ramo'], PDO::PARAM_STR);
			$stmt->bindParam(":tel_oficina",$datos['tel_ofi'], PDO::PARAM_STR);
			$stmt->bindParam(":otro_riesgo",$datos['otros_r'], PDO::PARAM_STR);
			$stmt->bindParam(":cali_otro_ries",$datos['riesgo'], PDO::PARAM_STR);
			$stmt->bindParam(":secuelas",$datos['secuelas'], PDO::PARAM_STR);
			$stmt->bindParam(":incapacidad",$datos['parcial'], PDO::PARAM_STR);
			$stmt->bindParam(":porcentaje",$datos['porcentaje'], PDO::PARAM_STR);
			$stmt->bindParam(":cli_ads",$datos['cli_ads'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_reali",$datos['fecha_reali'], PDO::PARAM_STR);
			$stmt->bindParam(":delegacion",$datos['delegacion'], PDO::PARAM_STR);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);
			$stmt->bindParam(":id_frt02",$id_f02, PDO::PARAM_STR);
			

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}
		
		public function regist_cedula_pacGrl($tabla, $datos,$id_pac){
			$stmt = Connection::open()->prepare("UPDATE $tabla SET
						fecha_nac = :fecha_nac, 
						edad=:edad, 
						sexo=:sexo, 
						tel_particular = :tel_particular,
						mail = :mail,
						calle = :calle,
						colonia = :colonia, 
						localidad = :localidad, 
						num_int = :num_int, 
						num_ext = :num_ext, 
						municipio = :municipio, 
						cp = :cp, 
						estado = :estado 
						WHERE id_pacientes_grl = :id_pac");

			$stmt->bindParam(":fecha_nac",$datos['fecha_nac'], PDO::PARAM_STR);
			$stmt->bindParam(":edad",$datos['edad'], PDO::PARAM_STR);
			$stmt->bindParam(":sexo",$datos['sexo'], PDO::PARAM_STR);
			$stmt->bindParam(":tel_particular",$datos['tel_par'], PDO::PARAM_STR);
			$stmt->bindParam(":mail",$datos['mail'], PDO::PARAM_STR);
			$stmt->bindParam(":calle",$datos['calle'], PDO::PARAM_STR);
			$stmt->bindParam(":colonia",$datos['colonia'], PDO::PARAM_STR);
			$stmt->bindParam(":localidad",$datos['localidad'], PDO::PARAM_STR);
			$stmt->bindParam(":num_int",$datos['num_int'], PDO::PARAM_STR);
			$stmt->bindParam(":num_ext",$datos['num_ext'], PDO::PARAM_STR);
			$stmt->bindParam(":municipio",$datos['municipio'], PDO::PARAM_STR);
			$stmt->bindParam(":cp",$datos['cp'], PDO::PARAM_STR);
			$stmt->bindParam(":estado",$datos['estado'], PDO::PARAM_STR);

			$stmt->bindParam(":id_pac",$id_pac, PDO::PARAM_STR);


			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}

		}



	}