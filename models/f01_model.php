<?php

	/**
	* 
	*/

	/*git remote add origin https://github.com/RafaelLR07/SIGIRT.git					  
	git push -u origin master*/
	require_once "DBconexion.php";

	class datos_f01 extends Connection
	{
		public function isFin($token)
		{
			$query = "SELECT tram_avan FROM frt_01 WHERE token_tramite = :tok";
			$stmt = Connection::open()->prepare($query);

		   	$stmt->bindParam(':tok',$token, PDO::PARAM_STR);
	 
	     	$stmt->execute();
			return $stmt->fetchAll();
					
			$stmt->close();
		}

		public function fin_cedula($token,$stado)
		{
			$query = "UPDATE frt_01 SET tram_avan = :estado WHERE token_tramite = :tok";

			$stmt = Connection::open()->prepare($query);

		   	$stmt->bindParam(':tok',$token, PDO::PARAM_STR);
	     	$stmt->bindParam(':estado',$stado, PDO::PARAM_STR);
	     	if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
	     	
		}

		public function update_f01($inf_controller,$token)
		{
			$query = "CALL update_f01(			
						:token_param,:ramo1,:calle1,:colonia1,:cp1,
						:numero1,:municipio1,:telefono_dep1,
						:puesto_jefe1,:no_empleado_jef1,:fecha_entera_jef1,
						:nom_jef1,:ape_pat_jef1,:ape_mat_jef1,:ape_pat_repre_dep1,
						:ape_mat_repre_dep1,:nom_repre_dep1,

						:no_empleado1,:puesto1,:fecha_ing_laboral1,:descripcion_actividades1,
						:fecha_pri_cotizacion1,	:turno1,:hora_entra1,:hora_sali1,
            
			            :nom_subdelg1,:ape_pat_subdel1,:ape_mat_subdel1,:nom_fam1,
						:ape_pat_fam1,:ape_mat_fam1,:parentesco1,:fecha_accidente1,
						:descripcion_rt1,:circuns1)";


			$stmt = Connection::open()->prepare($query);						


			$stmt->bindParam(":token_param",$token,PDO::PARAM_STR);
            $stmt->bindParam(":ramo1",$inf_controller['ramo'],PDO::PARAM_STR);
			$stmt->bindParam(":calle1",$inf_controller['calle'],PDO::PARAM_STR);
			$stmt->bindParam(":colonia1",$inf_controller['colonia'],PDO::PARAM_STR);
			$stmt->bindParam(":cp1",$inf_controller['cp'],PDO::PARAM_STR);
			$stmt->bindParam(":numero1",$inf_controller['numero'],PDO::PARAM_STR);
			$stmt->bindParam(":municipio1",$inf_controller['municipio'],PDO::PARAM_STR);
			$stmt->bindParam(":telefono_dep1",$inf_controller['telefono_dep'],PDO::PARAM_STR);
			$stmt->bindParam(":puesto_jefe1",$inf_controller['puesto_jefe'],PDO::PARAM_STR);
			$stmt->bindParam(":no_empleado_jef1",$inf_controller['no_empleado_jef'],PDO::PARAM_STR);
			$stmt->bindParam(":fecha_entera_jef1",$inf_controller['fecha_entera_jef'],PDO::PARAM_STR);
			$stmt->bindParam(":nom_jef1",$inf_controller['nom_jef'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_jef1",$inf_controller['ape_pat_jef'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_jef1",$inf_controller['ape_mat_jef'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_repre_dep1",$inf_controller['ape_pat_repre_dep'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_repre_dep1",$inf_controller['ape_mat_repre_dep'],PDO::PARAM_STR);
			$stmt->bindParam(":nom_repre_dep1",$inf_controller['nom_repre_dep'],PDO::PARAM_STR);
            

            $stmt->bindParam(":no_empleado1",$inf_controller['no_empleado'],PDO::PARAM_STR);
			$stmt->bindParam(":puesto1",$inf_controller['puesto'],PDO::PARAM_STR);
			$stmt->bindParam(":fecha_ing_laboral1",$inf_controller['fecha_ing_laboral'],PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_actividades1",$inf_controller['descripcion_actividades'],PDO::PARAM_STR);
			$stmt->bindParam(":fecha_pri_cotizacion1",$inf_controller['fecha_pri_cotizacion'],PDO::PARAM_STR);
			$stmt->bindParam(":turno1",$inf_controller['turno'],PDO::PARAM_STR);
			$stmt->bindParam(":hora_entra1",$inf_controller['hora_entra'],PDO::PARAM_STR);
			$stmt->bindParam(":hora_sali1",$inf_controller['hora_sali'],PDO::PARAM_STR);
            
            $stmt->bindParam(":nom_subdelg1",$inf_controller['nom_subdelg'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_subdel1",$inf_controller['ape_pat_subdel'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_subdel1",$inf_controller['ape_mat_subdel'],PDO::PARAM_STR);
			$stmt->bindParam(":nom_fam1",$inf_controller['nom_fam'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_fam1",$inf_controller['ape_pat_fam'],PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_fam1",$inf_controller['ape_mat_fam'],PDO::PARAM_STR);
			$stmt->bindParam(":parentesco1",$inf_controller['parenteso'],PDO::PARAM_STR);
			$stmt->bindParam(":fecha_accidente1",$inf_controller['fecha_accidente'],PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_rt1",$inf_controller['descripcion_rt'],PDO::PARAM_STR);
			$stmt->bindParam(":circuns1",$inf_controller['circuns'],PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public function getF02_circ($token)
		{
			$kuery = "SELECT id_nat_riesgo FROM frt_02 WHERE token=:token";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);

			$stmt->execute();
			$id_paciente = $stmt->fetchAll();
			$idd = implode($id_paciente[0]);
			return $idd;
		}

		public function registDep_info($table,$dates,$token){

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

		public function regist_pacDep($table, $dates,$token_tra,$id_pac_grl){

			$kuery="INSERT INTO $table(
			no_empleado, puesto, fecha_ing_laboral, descripcion_actividades,
			fecha_pri_cotizacion, turno, hora_entra, hora_sali, token_tramite ,id_pacientes_grl) VALUES 
			(:no_empleado, :puesto, :fecha_ing_laboral, :descripcion_actividades,
			:fecha_pri_cotizacion, :turno,:hora_entra, :hora_sali, :token_tramite,:id_pacientes_grl)";
						
			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":no_empleado",$dates['no_empleado'], PDO::PARAM_STR);
			$stmt->bindParam(":puesto",$dates['puesto'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_ing_laboral",$dates['fecha_ing_laboral'], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_actividades",$dates['descripcion_actividades'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_pri_cotizacion",$dates['fecha_pri_cotizacion'], PDO::PARAM_STR);
			$stmt->bindParam(":turno",$dates['turno'], PDO::PARAM_STR);
			$stmt->bindParam(":hora_entra",$dates['hora_entra'], PDO::PARAM_STR);
			$stmt->bindParam(":hora_sali",$dates['hora_sali'], PDO::PARAM_STR);
			$stmt->bindParam(":token_tramite",$token_tra, PDO::PARAM_STR);
			$stmt->bindParam(":id_pacientes_grl",$id_pac_grl, PDO::PARAM_STR);


			if($stmt->execute()){
				return $token_tra;
			}else{
				return "error";
			}

		}

		public function regist_f01($table, $dates,$id_depen,$id_pac_dep, $token){

			$kuery="INSERT INTO $table(
			nom_subdelg, ape_pat_subdel, ape_mat_subdel, nom_fam, ape_pat_fam,
			ape_mat_fam, parentesco, fecha_accidente, descripcion_rt, circuns, token_tramite,
			id_dependencia_info, id_paciente_dep) VALUES 
			(:nom_subdelg, :ape_pat_subdel, :ape_mat_subdel, :nom_fam, :ape_pat_fam,
			:ape_mat_fam, :parentesco, :fecha_accidente, :descripcion_rt, :circuns, :token_tramite, :id_dependencia_info, :id_paciente_dep)";
						
			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":nom_subdelg",$dates['nom_subdelg'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_subdel",$dates['ape_pat_subdel'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_subdel",$dates['ape_mat_subdel'], PDO::PARAM_STR);
			$stmt->bindParam(":nom_fam",$dates['nom_fam'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_pat_fam",$dates['ape_pat_fam'], PDO::PARAM_STR);
			$stmt->bindParam(":ape_mat_fam",$dates['ape_mat_fam'], PDO::PARAM_STR);
			$stmt->bindParam(":parentesco",$dates['parenteso'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_accidente",$dates['fecha_accidente'], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion_rt",$dates['descripcion_rt'], PDO::PARAM_STR);
			$stmt->bindParam(":circuns",$dates['circuns'], PDO::PARAM_STR);
			$stmt->bindParam(":token_tramite",$token, PDO::PARAM_STR);
			$stmt->bindParam(":id_dependencia_info",$id_depen, PDO::PARAM_STR);
			$stmt->bindParam(":id_paciente_dep",$id_pac_dep, PDO::PARAM_STR);

			
			if($stmt->execute()){
				return $token;
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

		public function getId_dependencia($token){
			$kuery = "SELECT MAX(id_dependencia_info) from dependencia_info WHERE token_tram = :token";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);

			$stmt->execute();
			$id_paciente = $stmt->fetchAll();
			$idd = implode($id_paciente[0]);
			return $idd;
		}

		public function getId_pac_dependencia($token){
			$kuery = "SELECT MAX(id_paciente_dep) from paciente_dep WHERE token_tramite = :token";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);

			$stmt->execute();
			$id_paciente = $stmt->fetchAll();
			$idd = implode($id_paciente[0]);
			return $idd;
		}

		public function getF01_inf($token){
			$kuery = "CALL f01_infor_db(:token)";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);

			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();


		}

		public function llenadoF01_up($token){
			$kuery = "CALL getF01_up(:token)";

			$stmt = Connection::open()->prepare($kuery);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);

			if($stmt->execute()){
			$datos = $stmt->fetchAll();	
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





