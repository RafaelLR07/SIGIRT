<?php 

/**
* 
*/
class f01_controller
{
	public function getToken($id_pac_grl)
	{
	 $respuesta = datos_f01::getToken_tramite($id_pac_grl);  
	 return $respuesta;
	
	}
	public function registro_f01_Controller($id_pac_grl,$token){
	
			if(isset($_POST['regiss'])){

				$info_dep = array(
					'ramo' =>$_POST['ramo'],
					'calle' =>$_POST['calle_dep'],
					'colonia' =>$_POST['col_dep'],
					'cp' =>$_POST['cp_dep'],
					'numero' =>$_POST['num_dep'],
					'municipio' =>$_POST['muni_dep'],
					'telefono_dep' =>$_POST['tel_dep'],
					'puesto_jefe' =>$_POST['puesto_jef'],
					'no_empleado_jef' =>$_POST['no_empleado_jef'],
					'fecha_entera_jef' =>$_POST['fech_riesgo'], 
					'nom_jef' =>$_POST['nom_jef'],
					'ape_pat_jef' =>$_POST['ape_pater_jef'],
					'ape_mat_jef' =>$_POST['ape_mater_jef'],
					'ape_pat_repre_dep' =>$_POST['ape_pater_rep'],
					'ape_mat_repre_dep' =>$_POST['ape_mater_rep'],
					'nom_repre_dep' =>$_POST['nombre_rep']);


				$info_lab = array(
					'no_empleado' => $_POST['no_empleado'],
					'puesto' => $_POST['puesto'],
					'fecha_ing_laboral' => $_POST['fecha_in'],
					'descripcion_actividades' => $_POST['desc_act'],
					'fecha_pri_cotizacion' => $_POST['fecha_cotiza'],
					'turno'=> $_POST['turno_tra'],
					'hora_entra' => $_POST['hor_entr'],
					'hora_sali' => $_POST['hor_salid']);
			
				
				$datos_control = array(
					'nom_subdelg' => $_POST['nom_sub'],
					'ape_pat_subdel' => $_POST['ape_pat_sub'],
					'ape_mat_subdel' => $_POST['ape_mat_sub'],
					'nom_fam' => $_POST['nom_fam'],
					'ape_pat_fam' => $_POST['apep_fam'],
					'ape_mat_fam' => $_POST['apem_fam'],
					'parenteso' => $_POST['parentesco'],
					'fecha_accidente' => $_POST['fech_acc'],
					'descripcion_rt' => $_POST['desc_rt'],
					'circuns' => $_POST['circuns']
				);
			
				
							
				 
			$respuesta = datos_f01::registDep_info('dependencia_info', $info_dep, $token);  
			
			//pacientes dependencias
			$respuesta = datos_f01::regist_pacDep('paciente_dep', $info_lab,$token,$id_pac_grl);  

			//Registro de f01	
			
			$depend = datos_f01::getId_dependencia($token);
			$pac_depend = datos_f01::getId_pac_dependencia($token);
			
			$respuesta = datos_f01::regist_f01('frt_01', $datos_control,$depend,$pac_depend,$token);  
			
			return $respuesta;
				
			}
			

		}
	







}
