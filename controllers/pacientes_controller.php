<?php 
	
	/**
	* 
	*/
	class control_f02  {
		
	 	public function saludo()
	 	{	
	 		if (isset($_POST['ap_pater'])) {
	 			
	 			echo "definido";
	 		}
	 	}



		function pacAct_controller(){
		
			$respuesta = datos_f02::pacAct_model("pacientes_grl");
			$cadena="";
			$cadena.="<table class='table table-striped' id='tabla_resultado' style='position:relative'>
			
				<tr class='table-bordered'>
					<th >NOMBRE</th>
					<th >APELLIDO PATERNO</th>
					<th >APELLIDO MATERNO</th>
				
					
				</tr>
			";
			foreach ($respuesta as $valor) {
				$var_del_link = "#delete_".$valor['id_pacientes_grl'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";

				$var_up_link = "content.php?p=editarPaciente";
				$var_editar="<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				$cadena.='<tr>
							<td>'.$valor['nombre'].'</td>
							<td>'.$valor['ape_pater'].'</td>
							<td>'.$valor['ape_mater'].'</td>
							<td>'.$var_del_ever.$var_editar.'</td>';

				include("views/modules/Modals/down_pac.php");

				$cadena.='</tr>';
			}
			$cadena.="</table";

			return $cadena;

			
		  
		}
		
		public function getToken(){
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
			srand((double)microtime()*1000000);
			$i=0;
			$pass='';
			
			while($i<=7){
				$num = rand() % 33;
				$tmp = substr($chars, $num, 1);
				$pass = $pass . $tmp;
				$i++;
			}
			return time().$pass;
		}


		public function registro_f02_Controller(){
			
			if(isset($_POST['ap_pater'])){
				
				$datos_control = array(
							'ap_pater' => $_POST['ap_pater'],
							'ap_mater' => $_POST['ap_mater'],
							'nombre' => $_POST['nombre'],
							'curp' => $_POST['curp'],
							'rfc' => $_POST['rfc']);

				if(isset($_POST['padx'])){
					$vaa = $_POST['padx'];

					$contador=1;
					$padx = array("pad1" => "","pad2" => "","pad3" => "",
								  "pad4" => "","pad5" => "","pad6" => "", 
								  "pad7" =>  "" );

					foreach ($vaa as $key => $valor) {
						$padx["pad$contador"] = $valor;
					 	$contador++;
					 }	
				}

				 $datos_f02 = array(
							'naturaleza' => $_POST['naturaleza_ries'],
							'fecha_def' => $_POST['fecha_def'],
							'uni_med' => $_POST['uni_med'],
							'first_at_med' => $_POST['first_at_med'],
							'fech_urgencias' => $_POST['fech_urgencias'],
							'pad_actual' => $_POST['pad_actual'],
							'exp_fisica' => $_POST['exp_fisica'],
							'labo' => $_POST['labo'],
							'diag_noso' => $_POST['diag_noso'],
							'diag_etio' => $_POST['diag_etio'],
							'diag_ana' => $_POST['diag_ana'],
							'pronostico' => $_POST['pronostico'],
							'fech_ini' => $_POST['fech_ini'],
							'fech_fin' => $_POST['fech_fin'],
							'dias_lic' => $_POST['dias_lic'],
							'medico' => $_POST['medico'],
							'status' => 'PEND'

						);

				
				//pacientes_grl saved
				$respuesta = datos_f02::regist_pac_general($datos_control,"pacientes_grl"); 
				//padecimientos x saved
				$id_pac = datos_f02::getIdpac();
				$respuesta = datos_f02::regis_checkx_model($id_pac,$padx,"padecimientos_x"); 

				//se almacena el resto del RT-02
				//get padx
				$id_padX = datos_f02::getIdpadX();
				
				//---$respuesta = 
				//token de frt02
				$token = $this->getToken();
				$respuesta = datos_f02::regis_rt_02('frt_02', $datos_f02, $id_pac, $id_padX,$token);  
				
				return $respuesta;
			}

		}
		//funcion para insertar los datos del checkbox de padecimiento X
	



		//funcion para listar los diferentes tipos de padecimiento
		public function verPade_controller(){

			$respuesta=  datos_f02::consulta_grl_model("cat_nat_riesgo");
			$cadena="";
			foreach ($respuesta as $valor) {
				$id = $valor['id_nat_riesgo'];
				$cadena.="<option value=$id>".$valor['tipo_riesgo']."</option>";

			}
			echo $cadena;

		}
		//funcion de listado de medico, para llenar el select
		public function verMedic_controller(){

			$respuesta=  datos_f02::consulta_medics("medicos");
			$cadena="";
			foreach ($respuesta as $valor) {
				$id = $valor['id_medicos'];
				$cadena.="<option value=$id>".$valor['nombre'].' '.$valor['apellido_pat'].' '.$valor['apellido_mat']."</option>";

			}
			echo $cadena;

		}

		public function verPac_f02($token){

			$respuesta=  datos_f02::verForm_f02("frt_02",$token);
			$cadena="";
			foreach ($respuesta as $valor);
			return $valor;

		}

		public function verMed_f02($id_med){

			$respuesta=  datos_f02::verMediForm_f02("medicos",$id_med);
			$cadena="";
			foreach ($respuesta as $valor);
			return $valor;

		}
		
		public function verRies_f02($id_riesgo){

			$respuesta=  datos_f02::verRiesForm_f02("cat_nat_riesgo",$id_riesgo);
			$cadena="";
			foreach ($respuesta as $valor);
			return $valor;

		}
		

		public function getPadeX_pac($id_paci_grl){

			$respuesta=  datos_f02::padecimientos_x("padecimientos_x",$id_paci_grl);
			$cadena="";
			foreach ($respuesta as $valor);
			return $valor;

		}

		public function getPac_grl($id_paci_grl){

			$respuesta=  datos_f02::getPac_grl("pacientes_grl",$id_paci_grl);
			$cadena="";
			foreach ($respuesta as $valor);
			return $valor;

		}

		
		
		
		

	}


 ?>