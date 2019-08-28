<?php 
	
	/**
	* 
	*/

	require_once "DBconexion.php";

	class datos_f02 extends Connection
	{

				

	   public function upFrt02AdminUser($token,$id_rt02, $status,$action)
	   {
	   	$query = "UPDATE frt_02 SET status_t = :status_ad WHERE token = :token
	   	AND id_frt02 = :id_r02";
	   	$stmt = Connection::open()->prepare($query);
    	$stmt->bindParam(':token',$token,PDO::PARAM_STR);
    	$stmt->bindParam(':id_r02',$id_rt02,PDO::PARAM_STR);
    	$stmt->bindParam(':status_ad',$status,PDO::PARAM_STR);
    	if($stmt->execute()){
    		return $action;
    	}else{
    		return "error";
    	}


	   }
	   public function upFrt02($token,$id_pac_grl,$arre_grl, $arre_padx, $arre_f02)
	   {
	   	$query = "CALL up_Frt02(
	   		:pater,:mater, :nom ,:curp_p,:rfc_p , :id_grl, :token_p,
	   		:pad_1, :pad_2,:pad_3, :pad_4, :pad_5, :pad_6, 
    		:pad_7,
    		:fecha_def1, :unidad_med_ini1, :fecha_atencion1,
    		:fecha_urgencias1,:pad_actual1, :exploracion_fisica1 , 
    		:lab_gabinete1, :diag_nosologico1,:diag_etiologico1, 
    		:diag_anatomo1, :pronostico1, :fecha_ini_lic_med1, 
    		:fecha_fin_lic_med1, :dias_lic1, :id_medicos1, :id_nat_riesgo1, :estatus)";

    	$stmt = Connection::open()->prepare($query);
    		$stmt->bindParam(':pater',$arre_grl['ap_pater'],PDO::PARAM_STR);
    		$stmt->bindParam(':mater',$arre_grl['ap_mater'],PDO::PARAM_STR);
    		$stmt->bindParam(':nom',$arre_grl['nombre'],PDO::PARAM_STR);
    		$stmt->bindParam(':curp_p',$arre_grl['curp'],PDO::PARAM_STR);
    		$stmt->bindParam(':rfc_p',$arre_grl['rfc'],PDO::PARAM_STR);
    		$stmt->bindParam(':id_grl',$id_pac_grl,PDO::PARAM_STR);
    		$stmt->bindParam(':token_p',$token,PDO::PARAM_STR);

    		$stmt->bindParam(':pad_1',$arre_padx['pad1'],PDO::PARAM_STR);
    		$stmt->bindParam(':pad_2',$arre_padx['pad2'],PDO::PARAM_STR);
    		$stmt->bindParam(':pad_3',$arre_padx['pad3'],PDO::PARAM_STR);
    		$stmt->bindParam(':pad_4',$arre_padx['pad4'],PDO::PARAM_STR);
    		$stmt->bindParam(':pad_5',$arre_padx['pad5'],PDO::PARAM_STR);
    		$stmt->bindParam(':pad_6',$arre_padx['pad6'],PDO::PARAM_STR);
		    $stmt->bindParam(':pad_7',$arre_padx['pad7'],PDO::PARAM_STR);

		   

   			$stmt->bindParam(':fecha_def1',$arre_f02['fecha_def'],PDO::PARAM_STR);
            $stmt->bindParam(':unidad_med_ini1',$arre_f02['uni_med'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':fecha_atencion1',$arre_f02['first_at_med'],PDO::PARAM_STR);
            $stmt->bindParam(':fecha_urgencias1',$arre_f02['fech_urgencias'],PDO::PARAM_STR);
    	  	$stmt->bindParam(':pad_actual1',$arre_f02['pad_actual'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':exploracion_fisica1',$arre_f02['exp_fisica'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':lab_gabinete1',$arre_f02['labo'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':diag_nosologico1',$arre_f02['diag_noso'],PDO::PARAM_STR);
    	  	$stmt->bindParam(':diag_etiologico1',$arre_f02['diag_etio'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':diag_anatomo1',$arre_f02['diag_ana'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':pronostico1',$arre_f02['pronostico'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':fecha_ini_lic_med1',$arre_f02['fech_ini'],PDO::PARAM_STR);
    	  	$stmt->bindParam(':fecha_fin_lic_med1',$arre_f02['fech_fin'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':dias_lic1',$arre_f02['dias_lic'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':id_medicos1',$arre_f02['medico'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':id_nat_riesgo1',$arre_f02['naturaleza'],PDO::PARAM_STR);
    	 	$stmt->bindParam(':estatus',$arre_f02['status_t'],PDO::PARAM_STR);

							

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
	   }
		
	   public function regis_rt_02($table,$dates,$id_pac,$id_pad_x,$token){
		$stmt = Connection::open()->prepare("INSERT INTO $table(
				fecha_def, unidad_med_ini, fecha_atencion, fecha_urgencias,	pad_actual,
				exploracion_fisica, lab_gabinete, diag_nosologico, diag_etiologico, diag_anatomo, pronostico, fecha_ini_lic_med, fecha_fin_lic_med, status_t, dias_lic, token, id_medicos, id_nat_riesgo, id_pacientes_grl, id_pad_x)
				VALUES(
				:fecha_def, :unidad_med_ini,:fecha_atencion,:fecha_urgencias,:pad_actual,
				:exploracion_fisica,:lab_gabinete,:diag_nosologico,:diag_etiologico,
				:diag_anatomo, :pronostico, :fecha_ini_lic_med, :fecha_fin_lic_med, :status_t, :dias_lic, :token, :id_medicos, :id_nat_riesgo, :id_pacientes_grl, :id_pad_x)");
		
			$stmt->bindParam(":fecha_def",$dates['fecha_def'], PDO::PARAM_STR);
			$stmt->bindParam(":unidad_med_ini",$dates['uni_med'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_atencion",$dates['first_at_med'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_urgencias",$dates['fech_urgencias'], PDO::PARAM_STR);
			$stmt->bindParam(":pad_actual",$dates['pad_actual'], PDO::PARAM_STR);
			$stmt->bindParam(":exploracion_fisica",$dates['exp_fisica'], PDO::PARAM_STR);
			$stmt->bindParam(":lab_gabinete",$dates['labo'], PDO::PARAM_STR);
			$stmt->bindParam(":diag_nosologico",$dates['diag_noso'], PDO::PARAM_STR);
			$stmt->bindParam(":diag_etiologico",$dates['diag_etio'], PDO::PARAM_STR);
			$stmt->bindParam(":diag_anatomo",$dates['diag_ana'], PDO::PARAM_STR);
			$stmt->bindParam(":pronostico",$dates['pronostico'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_ini_lic_med",$dates['fech_ini'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_fin_lic_med",$dates['fech_fin'], PDO::PARAM_STR);
			$stmt->bindParam(":status_t",$dates['status'], PDO::PARAM_STR);
			$stmt->bindParam(":dias_lic",$dates['dias_lic'], PDO::PARAM_STR);
			$stmt->bindParam(":token",$token, PDO::PARAM_STR);
			$stmt->bindParam(":id_medicos",$dates['medico'], PDO::PARAM_STR);
			$stmt->bindParam(":id_nat_riesgo",$dates['naturaleza'], PDO::PARAM_STR);
			$stmt->bindParam(":id_pacientes_grl",$id_pac, PDO::PARAM_STR);
			$stmt->bindParam(":id_pad_x",$id_pad_x, PDO::PARAM_STR);



			if($stmt->execute()){
				return $token;
			}else{
				return "error";
			}

	}


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

	}

	public function regist_f02($dates,$table){
		
	}

	public function regis_checkx_model($id,$datos_mod, $table,$token){
		
		$stmt = Connection::open()->prepare("INSERT INTO $table(pad1,pad2,pad3,pad4,pad5,pad6,pad7,token,id_pacientes_grl)
			VALUES (:pad1,:pad2,:pad3,:pad4,:pad5,:pad6,:pad7,:token,:id_pacientes_grl)");
		$stmt->bindParam(":pad1", $datos_mod['pad1'],PDO::PARAM_STR);
		$stmt->bindParam(":pad2", $datos_mod['pad2'],PDO::PARAM_STR);
		$stmt->bindParam(":pad3", $datos_mod['pad3'],PDO::PARAM_STR);
		$stmt->bindParam(":pad4", $datos_mod['pad4'],PDO::PARAM_STR);
		$stmt->bindParam(":pad5", $datos_mod['pad5'],PDO::PARAM_STR);
		$stmt->bindParam(":pad6", $datos_mod['pad6'],PDO::PARAM_STR);
		$stmt->bindParam(":pad7", $datos_mod['pad7'],PDO::PARAM_STR);
		$stmt->bindParam(":token", $token,PDO::PARAM_STR);
		$stmt->bindParam(":id_pacientes_grl", $id ,PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

	//obtiene el id del ultimo paciente registrado
	public function getIdpac(){
		$pacientes_grl = "pacientes_grl";
		$stmt = Connection::open()->prepare("SELECT MAX(id_pacientes_grl) AS id FROM ".$pacientes_grl);
		$stmt->execute();
		$id_paciente = $stmt->fetchAll();
		$idd = implode($id_paciente[0]);
		return $idd;
	}
	//obtiene el id del ultimo padecimiento registrado
	public function getIdpadX(){
		$pacientes_x = "padecimientos_x";
		$stmt = Connection::open()->prepare("SELECT MAX(id_pad_x) AS id FROM ".$pacientes_x);
		$stmt->execute();
		$id_pad_x = $stmt->fetchAll();
		$idd = implode($id_pad_x[0]);
		return $idd;
	}




	//pack(format)c pendientes vista
	public function pacAct_model($status,$filtro){
		
		$query = "CALL getPacientes_act(:filtro,:status)";
		$stmt = Connection::open()->prepare($query);

		$stmt->bindParam(":filtro", $filtro, PDO::PARAM_STR);
		$stmt->bindParam(":status", $status, PDO::PARAM_STR);
		if($stmt->execute()){
			return $stmt->fetchAll();
		}else{
			return "error";
		}

		$stmt->close();

	
	}

	public function consulta_grl_model($table,$status){
		$filtro="";
		$query = "CALL getPacientes_act(:filtro,:status)";
		$stmt = Connection::open()->prepare($query);
		$stmt->bindParam(":filtro", $filtro, PDO::PARAM_STR);
		$stmt->bindParam(":status", $status, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();


	}

	public function query_medics_pac($status,$filtro,$medico){
		$query = "CALL queryMedi_pac(:status, :filtro, :medico)";
		$stmt = Connection::open()->prepare($query);
		$fill = "";

		if($filtro!=null){
			$fill = $filtro;
		}
		$stmt->bindParam(":filtro", $fill, PDO::PARAM_STR);
		$stmt->bindParam(":status", $status, PDO::PARAM_STR);
		$stmt->bindParam(":medico", $medico, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();


	}

	public function llenadoF02($token){
		$query = "CALL llenadoF02_update(:token)";
		$stmt = Connection::open()->prepare($query);
		
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);
		
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

	public function consulta_padesFill($table,$filtro){

		$kuery = "SELECT tipo_riesgo FROM $table WHERE id_nat_riesgo = :filtro";

		$stmt = Connection::open()->prepare($kuery);
		$stmt->bindParam(":filtro", $filtro, PDO::PARAM_STR);
			
		if($stmt->execute()){
			return $stmt->fetchAll();	
			
		}else{
			return "error";
		}
		
		
		$stmt->close();
	}

	public function consulta_pades($table){

		$kuery = "SELECT * FROM $table";

		$stmt = Connection::open()->prepare($kuery);
			
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

	public function consulta_medics($table){
		$stmt = Connection::open()->prepare("SELECT * FROM ".$table);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}
	
	public function verForm_f02($table,$token){
		$stmt = Connection::open()->prepare("SELECT * FROM $table WHERE token =:token");
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}

	public function verMediForm_f02($table,$id_med){
		$stmt = Connection::open()->prepare("SELECT * FROM $table WHERE id_medicos =:id");
		$stmt->bindParam(":id", $id_med, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}

	public function verRiesForm_f02($table,$id_ries){
		$stmt = Connection::open()->prepare("SELECT * FROM $table WHERE id_nat_riesgo =:id");
		$stmt->bindParam(":id", $id_ries, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}
	

	public function padecimientos_x($table,$id_pac_grl){
		$stmt = Connection::open()->prepare("SELECT * FROM $table WHERE id_pad_x =:id");
		$stmt->bindParam(":id", $id_pac_grl, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}

	public function getId_grl($token)
	{
		$stmt = Connection::open()->prepare("SELECT id_pacientes_grl FROM frt_02 WHERE token =:token");
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();	
	}

	public function getPac_grl($table,$id_pac_grl){
		$stmt = Connection::open()->prepare("SELECT * FROM $table WHERE id_pacientes_grl =:id");
		$stmt->bindParam(":id", $id_pac_grl, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}

	public function getToken_dash($id_pac_grl){
		$stmt = Connection::open()->prepare("CALL get_token_dashboard(:id_pac)");
		$stmt->bindParam(":id_pac", $id_pac_grl, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();		
	}

	public function cedExist($token){
		$stmt = Connection::open()->prepare("SELECT id_cedula_ini FROM cedula_ini WHERE token = :token_t");
		$stmt->bindParam(":token_t", $token, PDO::PARAM_STR);

		$stmt->execute();
		return $valor = $stmt->rowCount();
			
		$stmt->close();	
	}

	public function f01Exist($token){
		$stmt = Connection::open()->prepare("SELECT id_rt01 FROM frt_01 WHERE token_tramite = :token_t");
		$stmt->bindParam(":token_t", $token, PDO::PARAM_STR);
		
		$stmt->execute();
		return $valor = $stmt->rowCount();
			
		$stmt->close();	
	}

	public function f03Exist($token){
		$stmt = Connection::open()->prepare("SELECT id_documentacion FROM docu_paciente WHERE token = :token_t");
		$stmt->bindParam(":token_t", $token, PDO::PARAM_STR);
		
		$stmt->execute();
		return $valor = $stmt->rowCount();
			
		$stmt->close();	
	}


}



 ?>