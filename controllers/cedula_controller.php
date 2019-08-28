<?php 

	/**
	* 
	*/
	class cedula_controller 
	{	
		public function is_fin($token)
		{	
			$resp = "";
			$respuesta_grl = cedula_model::isFin($token);
			foreach ($respuesta_grl as $key);
			if($key['tramite_avan']!=""){
				$resp = "si";
			}else{
				$resp = "no";
			}
			return $resp;
		}
		public function fina_ced($token)
		{
			if(isset($_POST['fin'])){
				$respuesta_grl = cedula_model::fin_cedula($token,'FIN');
				return $respuesta_grl;
			}
		}
		public function udpateCedu($token)
		{
			if(isset($_POST['regiss'])){
			
			    $dates_up = array(
			    	'fecha_nac' => $_POST['fecha_nac'],
			    	'edad' => $_POST['edad'],
					'sexo' => $_POST['sexo'],
					'tel_par' => $_POST['tel_part'],
					'mail' => $_POST['email'],
					'calle' => $_POST['calle'],
					'colonia' => $_POST['colonia'],
					'localidad' => $_POST['localidad'],
					'num_int' => $_POST['numero_int'],
					'num_ext' => $_POST['numero_ext'],
					'municipio' => $_POST['municipio'],
					'cp' => $_POST['cp'],
					'estado' => $_POST['estado'],

					'nom_dep' => $_POST['nom_dep'],
					'adscripcion' => $_POST['adscripcion'],
					'actividad' => $_POST['actividad'],
					'uni_med'=> $_POST['uni_med'],
					'ramo' => $_POST['ramo'],
					'tel_ofi' => $_POST['tel_ofi'],
					'cli_ads' => $_POST['cli_ads'],
					'otros_r' => $_POST['otros_r'],
					'riesgo' => $_POST['riesgo'],
					'secuelas' => $_POST['secuelas'],
					'parcial' => $_POST['parcial'],
					'porcentaje' => $_POST['porcentaje'],
					'fecha_reali' => $_POST['fech_realiz'],
					'delegacion' => $_POST['delegacion']
						);
				
				
			$respuesta_grl = cedula_model::update_cedula($dates_up,$token);
			return $respuesta_grl;

			}

		}

		public function llenadoCedula_up($token)
		{
			$respuesta = cedula_model::getInf_ced($token);
			foreach ($respuesta as $key);
			return $key;
		}

		public function llenadoGrl_up($token)
		{
			$respuesta = cedula_model::getInf_grl($token);
			foreach ($respuesta as $key);
			return $key;
		}
		public function getAnt_F02($id){

			$respuesta = cedula_model::getAnt_F02("frt_02",$id);
			
			if($respuesta == null){
				return "null";
			}else{
				foreach ($respuesta as $valor);
				return $valor;
			}

				
			

			
			
		}

		public function getDatos_pac($id){

			$respuesta = cedula_model::getPac_grl("pacientes_grl",$id);
			foreach ($respuesta as $valor);

			return $valor;
			
			
		}

		public function getDatos_f02($token){

			$respuesta = cedula_model::getDatos_f02("frt_02",$token);
			foreach ($respuesta as $valor);

			return $valor;

		}

		public function getDatos_ced($token){

			$respuesta = cedula_model::getDatos_ced("cedula_ini",$token);
			foreach ($respuesta as $valor);
			return $valor;

		}

		public function getTokenF02($id_pac){

			$respuesta = cedula_model::getTokenF02("frt_02",$id_pac);
			foreach ($respuesta as $valor);

			return $valor;

		}

		public function regCedula($id_pacGrl,$token){
			if(isset($_POST['regiss'])){
			
			    $pacGrl_arre = array(
			    	'fecha_nac' => $_POST['fecha_nac'],
			    	'edad' => $_POST['edad'],
					'sexo' => $_POST['sexo'],
					'tel_par' => $_POST['tel_part'],
					'mail' => $_POST['email'],
					'calle' => $_POST['calle'],
					'colonia' => $_POST['colonia'],
					'localidad' => $_POST['localidad'],
					'num_int' => $_POST['numero_int'],
					'num_ext' => $_POST['numero_ext'],
					'municipio' => $_POST['municipio'],
					'cp' => $_POST['cp'],
					'estado' => $_POST['estado']);


				$cedula_arre = array('nom_dep' => $_POST['nom_dep'],
							'adscripcion' => $_POST['adscripcion'],
							'actividad' => $_POST['actividad'],
							'uni_med'=> $_POST['uni_med'],
							'ramo' => $_POST['ramo'],
							'tel_ofi' => $_POST['tel_ofi'],
							'cli_ads' => $_POST['cli_ads'],
							'otros_r' => $_POST['otros_r'],
							'riesgo' => $_POST['riesgo'],
							'secuelas' => $_POST['secuelas'],
							'parcial' => $_POST['parcial'],
							'porcentaje' => $_POST['porcentaje'],
							'fecha_reali' => $_POST['fech_realiz'],
							'delegacion' => $_POST['delegacion']
						);
				
				
			$respuesta_grl = cedula_model::regist_cedula_pacGrl("pacientes_grl",$pacGrl_arre, $id_pacGrl);

			$id_f02 = cedula_model::serch_f02ID("frt_02", $id_pacGrl);
			
			$respuesta = cedula_model::regist_cedula_inicial("cedula_ini",$cedula_arre, $id_f02,$token);

			if($respuesta_grl && $respuesta){

				return $token;
			}

				

				
			}
			
		
		}

	}