<?php 

/**
* 
*/
class usuarios_controller
{	

	public function usuarios_query($filtro)
	{
		if($filtro != ""){
			$respuesta = usuarios_model::query_usua($filtro,"grl");
		
		}else{
			$respuesta = usuarios_model::query_usua($filtro,"grl");
		}

		$cadena="";
			
			$cadena.="<table class='table table-striped' id='tabla_resultado' style='position:relative'>
			
				<tr class='table-bordered'>
					<th >NOMBRE USUARIO</th>
					<th >EMAIL</th>
					<th >TIPO USUARIO</th>
					<th >ACCIÓN</th>
					
				</tr>
			";
			if($respuesta==null){
				$cadena.='<div class="alert alert-danger">Sin resultados</div>';
				 return $cadena;
			}
			
			foreach ($respuesta as $valor) {
				$var_del_link = "#delete_".$valor['id_usuario'];
				$var_del_ever = "<a  href=".$var_del_link."
				class='btn btn-danger btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-trash'></span>"."</a>";

				$var_up_link = "content.php?p=editarUsuario&valor=".$valor['id_usuario']."&tipo=".$valor['tipo_user'];
				$var_editar="<a  href=".$var_up_link."
				class='btn btn-success btn-sm' data-toggle='modal'
				>"."<span class='glyphicon glyphicon-edit'></span>"."</a>";
				$cadena.='<tr> 
							<td>'.$valor['nombre'].'</td>
							<td>'.$valor['email'].'</td>
							<td>'.$valor['tipo_user'].'</td>
							<td>'.$var_editar.'</td>';

				include("../views/modules/Modals/down_usu_grl.php");

				$cadena.='</tr>';
			}
			$cadena.="</table";

			return $cadena;

	}

	public function llenadoUpgrl($id)
	{
		$respuesta = usuarios_model::llenadoUpgrl($id);
		foreach ($respuesta as $key);
			
		return $key;
	}

	public function Upgrl_usu($id)
	{
		if(isset($_POST['regis_usua'])){

			$user_params = array('nombre' => $_POST['nombre'],
								'email' => $_POST['email'],
								'pass' => $_POST['pass'],
								'tipo' => $_POST['tipo']);
			if($user_params['tipo'] == "Medico"){

				$special_params = array('nombre' => $_POST['nombre_med'],
									 'ape_pat' => $_POST['ape_patermed'],
									 'ape_mater' => $_POST['ape_matermed'],
									 'clave' => $_POST['clave'],
									 'cedula_med' => $_POST['cedula']);
				$respuesta = usuarios_model::upss2($id,$user_params,$special_params);	
			}else 
				if ($user_params['tipo'] == "Usuario"||$user_params['tipo'] == "Admin") {
				$special_params = array('nombre' => $_POST['nombre_per'],
									 'ape_pat' => $_POST['ape_pater'],
									 'ape_mater' => $_POST['ape_mater'],
									 'clave' => $_POST['no_empleado'],
									 'cedula_med' => '');
				$respuesta = usuarios_model::upss2($id,$user_params,$special_params);	
			

			}else if ($user_params['tipo'] == "Paciente") {
					$special_params = "";
					$respuesta = usuarios_model::upss($id,$user_params);	
			}
			/*
			echo var_dump($user_params);
			echo "<br>";
			echo var_dump($special_params);
			echo "fooas";*/
				
			return $respuesta;
		}

	}

	public function regis_usuarios_grl()
	{
		if(isset($_POST['regis_usua'])){
			$user_params = array('nombre' => $_POST['nombre'],
								'email' => $_POST['email'],
								'pass' => $_POST['pass'],
								'tipo' => $_POST['tipo']);
			if($user_params['tipo'] == "Medico"){
				$special_params = array('nombre' => $_POST['nombre_med'],
									 'ape_pat' => $_POST['ape_patermed'],
									 'ape_mater' => $_POST['ape_matermed'],
									 'clave' => $_POST['clave'],
									 'cedula_med' => $_POST['cedula']);
			
			}else 
				if ($user_params['tipo'] == "Usuario"||$user_params['tipo'] == "Admin") {
				$special_params = array('nombre' => $_POST['nombre_per'],
									 'ape_pat' => $_POST['ape_pater'],
									 'ape_mater' => $_POST['ape_mater'],
									 'clave' => $_POST['no_empleado'],
									 'cedula_med' => '');
				
			}
			$respuesta = usuarios_model::registrar_usua($user_params,$special_params,'IN');
			
			return $respuesta;
		}

	}

	public function regis_usua($id)
	{
		if(isset($_POST['regis_usua'])){
			$array_inf = array('nombre' => $_POST['nombre'],
								'email' => $_POST['email'],
								'pass' => $_POST['pass'],
								'tipo' => 'Paciente',
								'status' => 'ACTIVO');
			
			$respuesta =  usuarios_model::regir_usua($id,$array_inf);
			
			return $respuesta;
		}
	}
}