
<?php


class Connection{
 
	
	
 	
	public function open(){
		 $server = "mysql:host=localhost;dbname=mydb";
	 	 $username = "root";
	 	 $password = "";
 		$options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\'');
			$link = new PDO($server,$username, $password,$options);
 		return($link);
    }
	
 
}
 
/*$a = new Connection();
$a -> open();*/


 ?>