<?php 

	/**
	* 
	*/

	require_once "DBconexion.php";

	class usuarios_model extends Connection
	{
		public function llenadoUpgrl($id)
		{
			$query = "CALL get_users_inf(:ide)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":ide",$id, PDO::PARAM_STR);
	
					
			if($stmt->execute()){
				return $stmt->fetchAll();	
			  }else{
				  return "error";
				}
		}

		public function query_usua($fill,$action)
		{
			$query = "CALL query_users(:filtro, :accion)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":filtro",$fill, PDO::PARAM_STR);
			$stmt->bindParam(":accion",$action, PDO::PARAM_STR);
		
			
		
			if($stmt->execute()){
				return $stmt->fetchAll();	
			  }else{
				  return "error";
				}
		}
			public function upss2($id,$user_params,$specials)
		{	
		
			$query = "CALL update_usuarios_grl(:ides,:nombre_usu, :passwordU, :email, :tipo_user, :apellido_pat, :apellido_mat,:nombre,:clave,:cedula,:action_1)";
			
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":ides",$id, PDO::PARAM_STR);
			$stmt->bindParam(":nombre_usu",$user_params['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":passwordU",$user_params['pass'], PDO::PARAM_STR);
			$stmt->bindParam(":email",$user_params['email'], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_user",$user_params['tipo'], PDO::PARAM_STR);

			$stmt->bindParam(":apellido_pat",$specials['ape_pat'], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_mat",$specials['ape_mater'], PDO::PARAM_STR);
			$stmt->bindParam(":nombre",$specials['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":clave",$specials['clave'], PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$specials['cedula_med'], PDO::PARAM_STR);
			$stmt->bindParam(":action_1",$actions, PDO::PARAM_STR);
			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}
		public function upss($id,$user_params)
		{	
			$query = "CALL update_usuario(:nombre_usu, :passwordU, :email, :tipo_user,:ide)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":nombre_usu",$user_params['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":passwordU",$user_params['pass'], PDO::PARAM_STR);
			$stmt->bindParam(":email",$user_params['email'], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_user",$user_params['tipo'], PDO::PARAM_STR);
			$stmt->bindParam(":ide",$id, PDO::PARAM_STR);
		
			if($stmt->execute()){
				return "successPac";
			}else{
				return "error";
			}
		}

		public function registrar_usua($user_params,$specials,$actions)
		{
			$query = "CALL register_usuarios_grl(:nombre_usu, :passwordU, :email, :tipo_user, :apellido_pat, :apellido_mat,:nombre,:clave,:cedula,:action_1)";

			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":nombre_usu",$user_params['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":passwordU",$user_params['pass'], PDO::PARAM_STR);
			$stmt->bindParam(":email",$user_params['email'], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_user",$user_params['tipo'], PDO::PARAM_STR);

			$stmt->bindParam(":apellido_pat",$specials['ape_pat'], PDO::PARAM_STR);
			$stmt->bindParam(":apellido_mat",$specials['ape_mater'], PDO::PARAM_STR);
			$stmt->bindParam(":nombre",$specials['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":clave",$specials['clave'], PDO::PARAM_STR);
			$stmt->bindParam(":cedula",$specials['cedula_med'], PDO::PARAM_STR);
			$stmt->bindParam(":action_1",$actions, PDO::PARAM_STR);

	




			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}


			
		}

		public function regir_usua($id, $array_inf)
		{

			
			$query = "INSERT INTO usuarios(nombre,passwordU,email,tipo_user,identificador,statuss) 
					   VALUES (:nombre, :passwordU, :email, :tipo_user, :identificador, :estatus)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":nombre",$array_inf['nombre'], PDO::PARAM_STR);
			$stmt->bindParam(":passwordU",$array_inf['pass'], PDO::PARAM_STR);
			$stmt->bindParam(":email",$array_inf['email'], PDO::PARAM_STR);
			$stmt->bindParam(":tipo_user",$array_inf['tipo'], PDO::PARAM_STR);
			$stmt->bindParam(":identificador",$id, PDO::PARAM_STR);
			$stmt->bindParam(":estatus",$array_inf['status'], PDO::PARAM_STR);

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
		}

		
	}