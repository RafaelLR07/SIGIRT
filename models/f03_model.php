<?php 
	
	/**
	* 
	*/

	require_once "DBconexion.php";

	class datos_f03 extends Connection
	{	
		
		public function getDocs_form($token)
		{
			$query = "SELECT docum1,docum2,docum3,docum4,docum5,docum6, 
		docum7,docum8,docum9,docum10,docum11, docum12,
		docum13,docum14,docum15,docum16,docum17,docum18,
		docum19,docum20,docum21,docum22,docum23,docum24, 
		docum25,docum26,docum27,docum28,docum29,docum30,
		docum31,docum32,docum33,docum34,docum35 FROM docu_paciente WHERE token = :token";
		    $stmt = Connection::open()->prepare($query);

			$stmt->bindParam(":token",$token ,PDO::PARAM_STR);
			
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();
		}
		public function getInf($token)
		{
			$query = "CALL getF03_inf_doc(:token)";
		    $stmt = Connection::open()->prepare($query);

			$stmt->bindParam(":token",$token ,PDO::PARAM_STR);
			
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();
		}

		public function getTipo($token){

			$query = "CALL getTipo_for_doc(:token)";
		    $stmt = Connection::open()->prepare($query);

			$stmt->bindParam(":token",$token ,PDO::PARAM_STR);
			
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();


		}

		public function getDoc($alias,$token)
		{
			$query = "call getDoc(:document, :token)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":document", $alias,PDO::PARAM_STR);
			$stmt->bindParam(":token", $token,PDO::PARAM_STR);

			if($stmt->execute()){
				return $stmt->fetchAll();	
				
			}else{
				return "error";
				}
		
			$stmt->close();
		}


		public function ups_docs($token,$array_docus)
		{
			$query = "CALL upsF03(
				:docum1, :docum2,:docum3,:docum4,:docum5,:docum6, 
				:docum7,:docum8,:docum9,:docum10,:docum11,:docum12, 
				:docum13,:docum14,:docum15,:docum16,:docum17,:docum18, 
				:docum19,:docum20,:docum21,:docum22,:docum23,:docum24, 
				:docum25,:docum26,:docum27,:docum28,:docum29,:docum30, 
				:docum31,:docum32,:docum33,:docum34,:docum35,:token

    		)";
    		$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":docum1", $array_docus['docum1'],PDO::PARAM_STR);
			$stmt->bindParam(":docum2", $array_docus['docum2'],PDO::PARAM_STR);
			$stmt->bindParam(":docum3", $array_docus['docum3'],PDO::PARAM_STR);
			$stmt->bindParam(":docum4", $array_docus['docum4'],PDO::PARAM_STR);
			$stmt->bindParam(":docum5", $array_docus['docum5'],PDO::PARAM_STR);
			$stmt->bindParam(":docum6", $array_docus['docum6'],PDO::PARAM_STR);
			$stmt->bindParam(":docum7", $array_docus['docum7'],PDO::PARAM_STR);
			$stmt->bindParam(":docum8", $array_docus['docum8'],PDO::PARAM_STR);
			$stmt->bindParam(":docum9", $array_docus['docum9'],PDO::PARAM_STR);
			$stmt->bindParam(":docum10", $array_docus['docum10'],PDO::PARAM_STR);
			$stmt->bindParam(":docum11", $array_docus['docum11'],PDO::PARAM_STR);
			$stmt->bindParam(":docum12", $array_docus['docum12'],PDO::PARAM_STR);
			$stmt->bindParam(":docum13", $array_docus['docum13'],PDO::PARAM_STR);
			$stmt->bindParam(":docum14", $array_docus['docum14'],PDO::PARAM_STR);
			$stmt->bindParam(":docum15", $array_docus['docum15'],PDO::PARAM_STR);
			$stmt->bindParam(":docum16", $array_docus['docum16'],PDO::PARAM_STR);
			$stmt->bindParam(":docum17", $array_docus['docum17'],PDO::PARAM_STR);
			$stmt->bindParam(":docum18", $array_docus['docum18'],PDO::PARAM_STR);
			$stmt->bindParam(":docum19", $array_docus['docum19'],PDO::PARAM_STR);
			$stmt->bindParam(":docum20", $array_docus['docum20'],PDO::PARAM_STR);
			$stmt->bindParam(":docum21", $array_docus['docum21'],PDO::PARAM_STR);
			$stmt->bindParam(":docum22", $array_docus['docum22'],PDO::PARAM_STR);
			$stmt->bindParam(":docum23", $array_docus['docum23'],PDO::PARAM_STR);
			$stmt->bindParam(":docum24", $array_docus['docum24'],PDO::PARAM_STR);
			$stmt->bindParam(":docum25", $array_docus['docum25'],PDO::PARAM_STR);
			$stmt->bindParam(":docum26", $array_docus['docum26'],PDO::PARAM_STR);
			$stmt->bindParam(":docum27", $array_docus['docum27'],PDO::PARAM_STR);
			$stmt->bindParam(":docum28", $array_docus['docum28'],PDO::PARAM_STR);
			$stmt->bindParam(":docum29", $array_docus['docum29'],PDO::PARAM_STR);
			$stmt->bindParam(":docum30", $array_docus['docum30'],PDO::PARAM_STR);
			$stmt->bindParam(":docum31", $array_docus['docum31'],PDO::PARAM_STR);
			$stmt->bindParam(":docum32", $array_docus['docum32'],PDO::PARAM_STR);
			$stmt->bindParam(":docum33", $array_docus['docum33'],PDO::PARAM_STR);
			$stmt->bindParam(":docum34", $array_docus['docum34'],PDO::PARAM_STR);
			$stmt->bindParam(":docum35", $array_docus['docum35'],PDO::PARAM_STR);
			$stmt->bindParam(":token", $token,PDO::PARAM_STR);
			
			
			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}
				

		public function regis_docs($tipo,$token,$array_docus)
		{

		$query = "INSERT INTO docu_paciente(
				tipo, docum1, docum2,docum3,docum4,docum5,docum6, 
				docum7,docum8,docum9,docum10,docum11,docum12, 
				docum13,docum14,docum15,docum16,docum17,docum18, 
				docum19,docum20,docum21,docum22,docum23,docum24, 
				docum25,docum26,docum27,docum28,docum29,docum30, 
				docum31,docum32,docum33,docum34,docum35,token)

			VALUES
				(
				:tipo, :docum1, :docum2,:docum3,:docum4,:docum5,:docum6, 
				:docum7,:docum8,:docum9,:docum10,:docum11,:docum12, 
				:docum13,:docum14,:docum15,:docum16,:docum17,:docum18, 
				:docum19,:docum20,:docum21,:docum22,:docum23,:docum24, 
				:docum25,:docum26,:docum27,:docum28,:docum29,:docum30, 
				:docum31,:docum32,:docum33,:docum34,:docum35,:token

    		)";
			$stmt = Connection::open()->prepare($query);
			$stmt->bindParam(":tipo", $tipo,PDO::PARAM_STR);
			$stmt->bindParam(":docum1", $array_docus['docum1'],PDO::PARAM_STR);
			$stmt->bindParam(":docum2", $array_docus['docum2'],PDO::PARAM_STR);
			$stmt->bindParam(":docum3", $array_docus['docum3'],PDO::PARAM_STR);
			$stmt->bindParam(":docum4", $array_docus['docum4'],PDO::PARAM_STR);
			$stmt->bindParam(":docum5", $array_docus['docum5'],PDO::PARAM_STR);
			$stmt->bindParam(":docum6", $array_docus['docum6'],PDO::PARAM_STR);
			$stmt->bindParam(":docum7", $array_docus['docum7'],PDO::PARAM_STR);
			$stmt->bindParam(":docum8", $array_docus['docum8'],PDO::PARAM_STR);
			$stmt->bindParam(":docum9", $array_docus['docum9'],PDO::PARAM_STR);
			$stmt->bindParam(":docum10", $array_docus['docum10'],PDO::PARAM_STR);
			$stmt->bindParam(":docum11", $array_docus['docum11'],PDO::PARAM_STR);
			$stmt->bindParam(":docum12", $array_docus['docum12'],PDO::PARAM_STR);
			$stmt->bindParam(":docum13", $array_docus['docum13'],PDO::PARAM_STR);
			$stmt->bindParam(":docum14", $array_docus['docum14'],PDO::PARAM_STR);
			$stmt->bindParam(":docum15", $array_docus['docum15'],PDO::PARAM_STR);
			$stmt->bindParam(":docum16", $array_docus['docum16'],PDO::PARAM_STR);
			$stmt->bindParam(":docum17", $array_docus['docum17'],PDO::PARAM_STR);
			$stmt->bindParam(":docum18", $array_docus['docum18'],PDO::PARAM_STR);
			$stmt->bindParam(":docum19", $array_docus['docum19'],PDO::PARAM_STR);
			$stmt->bindParam(":docum20", $array_docus['docum20'],PDO::PARAM_STR);
			$stmt->bindParam(":docum21", $array_docus['docum21'],PDO::PARAM_STR);
			$stmt->bindParam(":docum22", $array_docus['docum22'],PDO::PARAM_STR);
			$stmt->bindParam(":docum23", $array_docus['docum23'],PDO::PARAM_STR);
			$stmt->bindParam(":docum24", $array_docus['docum24'],PDO::PARAM_STR);
			$stmt->bindParam(":docum25", $array_docus['docum25'],PDO::PARAM_STR);
			$stmt->bindParam(":docum26", $array_docus['docum26'],PDO::PARAM_STR);
			$stmt->bindParam(":docum27", $array_docus['docum27'],PDO::PARAM_STR);
			$stmt->bindParam(":docum28", $array_docus['docum28'],PDO::PARAM_STR);
			$stmt->bindParam(":docum29", $array_docus['docum29'],PDO::PARAM_STR);
			$stmt->bindParam(":docum30", $array_docus['docum30'],PDO::PARAM_STR);
			$stmt->bindParam(":docum31", $array_docus['docum31'],PDO::PARAM_STR);
			$stmt->bindParam(":docum32", $array_docus['docum32'],PDO::PARAM_STR);
			$stmt->bindParam(":docum33", $array_docus['docum33'],PDO::PARAM_STR);
			$stmt->bindParam(":docum34", $array_docus['docum34'],PDO::PARAM_STR);
			$stmt->bindParam(":docum35", $array_docus['docum35'],PDO::PARAM_STR);
			$stmt->bindParam(":token", $token,PDO::PARAM_STR);
			
			
			
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}
	
		public function getDocs_inf($tipo){

		    $stmt = Connection::open()->prepare("CALL getDocs(:tipo)");

			$stmt->bindParam(":tipo",$tipo ,PDO::PARAM_STR);
			
			$stmt->execute();
			return $stmt->fetchAll();

			$stmt->close();


		}
	/*
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

	}*/







	}
