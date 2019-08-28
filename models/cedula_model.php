<?php 

	/**
	* 
	*/
	require_once "DBconexion.php";
	class cedula_model extends Connection
	{	
		public function isFin($token)
		{
			$query = "SELECT tramite_avan FROM cedula_ini WHERE token = :tok";
			$stmt = Connection::open()->prepare($query);

		   	$stmt->bindParam(':tok',$token, PDO::PARAM_STR);
	 
	     	$stmt->execute();
			return $stmt->fetchAll();
					
			$stmt->close();
		}

		public function fin_cedula($token,$stado)
		{
			$query = "UPDATE cedula_ini SET tramite_avan = :estado WHERE token = :tok";

			$stmt = Connection::open()->prepare($query);

		   	$stmt->bindParam(':tok',$token, PDO::PARAM_STR);
	     	$stmt->bindParam(':estado',$stado, PDO::PARAM_STR);
	     	if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
	     	
		}

		public function update_cedula($array_inf,$token)
		{
			$query = "CALL update_cedula(:token_param,:fecha_nac1,:edad1,:sexo1,:tel_particular1,
	 				:mail1,:calle1,:colonia1,:localidad1,:num_int1,:num_ext1,
	 				:municipio1,:cp1,:estado1,
	 				:dependencia1,:ofi_adscripcion1,:actividad1,:unidad_medica_aten1,
	 				:ramo1,:tel_oficina1,:otro_riesgo1,:cali_otro_ries1,:secuelas1,
	 				:incapacidad1,:porcentaje1,:cli_ads1,:fecha_reali1,:delegacion1)";

		$stmt = Connection::open()->prepare($query);

	   	$stmt->bindParam(':token_param',$token, PDO::PARAM_STR);
     	$stmt->bindParam(':fecha_nac1',$array_inf['fecha_nac'], PDO::PARAM_STR);
     	$stmt->bindParam(':edad1',$array_inf['edad'], PDO::PARAM_STR);
     	$stmt->bindParam(':sexo1',$array_inf['sexo'], PDO::PARAM_STR);
     	$stmt->bindParam(':tel_particular1',$array_inf['tel_par'], PDO::PARAM_STR);
     	$stmt->bindParam(':mail1',$array_inf['mail'], PDO::PARAM_STR);
     	$stmt->bindParam(':calle1',$array_inf['calle'], PDO::PARAM_STR);
     	$stmt->bindParam(':colonia1',$array_inf['colonia'], PDO::PARAM_STR);
     	$stmt->bindParam(':localidad1',$array_inf['localidad'], PDO::PARAM_STR);
     	$stmt->bindParam(':num_int1',$array_inf['num_int'], PDO::PARAM_STR);
     	$stmt->bindParam(':num_ext1',$array_inf['num_ext'], PDO::PARAM_STR);
     	$stmt->bindParam(':municipio1',$array_inf['municipio'], PDO::PARAM_STR);
     	$stmt->bindParam(':cp1',$array_inf['cp'], PDO::PARAM_STR);
     	$stmt->bindParam(':estado1',$array_inf['estado'], PDO::PARAM_STR);


     	$stmt->bindParam(':dependencia1',$array_inf['nom_dep'], PDO::PARAM_STR);
     	$stmt->bindParam(':ofi_adscripcion1',$array_inf['adscripcion'], PDO::PARAM_STR);
     	$stmt->bindParam(':actividad1',$array_inf['actividad'], PDO::PARAM_STR);
     	$stmt->bindParam(':unidad_medica_aten1',$array_inf['uni_med'], PDO::PARAM_STR);
     	$stmt->bindParam(':ramo1',$array_inf['ramo'], PDO::PARAM_STR);
     	$stmt->bindParam(':tel_oficina1',$array_inf['tel_ofi'], PDO::PARAM_STR);
     	$stmt->bindParam(':otro_riesgo1',$array_inf['otros_r'], PDO::PARAM_STR);
     	$stmt->bindParam(':cali_otro_ries1',$array_inf['riesgo'], PDO::PARAM_STR);
     	$stmt->bindParam(':secuelas1',$array_inf['secuelas'], PDO::PARAM_STR);
     	$stmt->bindParam(':incapacidad1',$array_inf['parcial'], PDO::PARAM_STR);
     	$stmt->bindParam(':porcentaje1',$array_inf['porcentaje'], PDO::PARAM_STR);
     	$stmt->bindParam(':cli_ads1',$array_inf['cli_ads'], PDO::PARAM_STR);
     	$stmt->bindParam(':fecha_reali1',$array_inf['fecha_reali'], PDO::PARAM_STR);
     	$stmt->bindParam(':delegacion1',$array_inf['delegacion'], PDO::PARAM_STR);

     		if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		public function getInf_ced($token)
		{
			$kuery = "CALL getCed_up(:token)";
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
		$stmt->close();;
		}

		public function getInf_grl($token)
		{
			$kuery = "CALL get_infGrl_cedu(:token)";
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