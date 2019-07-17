<?php

	/**
	* 
	*/

	/*git remote add origin https://github.com/RafaelLR07/SIGIRT.git					  
	git push -u origin master*/
	require_once "DBconexion.php";

	class datos_f01 extends Connection
	{
		public function regist_f01($table,$dates,$token){

			$kuery="INSERT INTO $table(
			ramo, calle, colonia, cp, numero, municipio, telefono_dep,
			puesto_jefe, no_empleado_jef, fecha_entera_jef, nom_jef,
			ape_pat_jef, ape_mat_jef, ape_pat_repre_dep, ape_mat_repre_dep,
			nom_repre_dep, token_tram) VALUES 
			(:ramo, :calle, :colonia, :cp, :numero, :municipio, :telefono_dep,
			:puesto_jefe, :no_empleado_jef, :fecha_entera_jef, :nom_jef,
			:ape_pat_jef, :ape_mat_jef, :ape_pat_repre_dep, :ape_mat_repre_dep,
			:nom_repre_dep, :token_tram)";
			
			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":ramo",$dates['ramo'], PDO::PARAM_STR);
			$stmt->bindParam(":calle",$dates['calle'], PDO::PARAM_STR);
			$stmt->bindParam(":colonia",$dates['colonia'], PDO::PARAM_STR);
			$stmt->bindParam(":cp",$dates['cp'], PDO::PARAM_STR);
			$stmt->bindParam(":numero",$dates['numero'], PDO::PARAM_STR);
			$stmt->bindParam(":municipio",$dates['municipio'], PDO::PARAM_STR);
			$stmt->bindParam(":telefono_dep",$dates['telefono_dep'], PDO::PARAM_STR);
			$stmt->bindParam(":puesto_jefe",$dates['puesto_jefe'], PDO::PARAM_STR);
			$stmt->bindParam(":no_empleado_jef",$dates['no_empleado_jef'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_entera_jef",$dates['fecha_entera_jef'], PDO::PARAM_STR);
			$stmt->bindParam(":nom_jef",$dates['nom_jef'], PDO::PARAM_STR);

			$stmt->bindParam(":ape_pat_jef",$dates['ape_pat_jef'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_jef",$dates['ape_mat_jef'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_repre_dep",$dates['ape_pat_repre_dep'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_repre_dep",$dates['ape_mat_repre_dep'], PDO::PARAM_STR);

			$stmt->bindParam(":nom_repre_dep",$dates['nom_repre_dep'], PDO::PARAM_STR);

			$stmt->bindParam(":token_tram",$token, PDO::PARAM_STR);



			if($stmt->execute()){
				return $token;
			}else{
				return "error";
			}

		}

		public function regist_pacDep($table, $info_lab,$token_tra){

			$kuery="INSERT INTO $table(
			no_empleado, puesto, fecha_ing_laboral, descripcion_actividades,
			fecha_pri_cotizacion, turno, hora_entra, hora_sali,id_pacientes_grl) VALUES 
			(:no_empleado, :puesto, :fecha_ing_laboral, :descripcion_actividades,
			:fecha_pri_cotizacion, :turno,:hora_entra, :hora_sali,:id_pacientes_grl)";
						
			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":no_empleado",$dates['no_empleado'], PDO::PARAM_STR);
			$stmt->bindParam(":puesto",$dates['puesto'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_ing_laboral",$dates['fecha_ing_laboral'], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_actividades",$dates['descripcion_actividades'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_pri_cotizacion",$dates['fecha_pri_cotizacion'], PDO::PARAM_STR);
			$stmt->bindParam(":turno",$dates['turno'], PDO::PARAM_STR);
			$stmt->bindParam(":hora_entra",$dates['hora_entra'], PDO::PARAM_STR);
			$stmt->bindParam(":hora_sali",$dates['hora_sali'], PDO::PARAM_STR);
			$stmt->bindParam(":id_pacientes_grl",$id_pac_grl, PDO::PARAM_STR);


			if($stmt->execute()){
				return $token_tra;
			}else{
				return "error";
			}

		}

		public function getToken_tramite($id_pac){
			$kuery = "SELECT token from frt_02 WHERE id_frt02 = (SELECT MAX(id_frt02) FROM frt_02 WHERE id_pacientes_grl = :id_pac)";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":id_pac",$id_pac, PDO::PARAM_STR);

			$stmt->execute();
			$id_paciente = $stmt->fetchAll();
			$idd = implode($id_paciente[0]);
			return $idd;
		}



	}





