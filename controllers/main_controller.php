<?php 
	
	/**
	* 
		class dedicated for the activitys primarys 
		of the pagle
	*/
	class main_controller 
	{
		
		//template´s controllers
		public function main_template(){
			include 'views/main_template.php';
		}

		//url´s controllers

		public function urlsController(){
			if(isset($_GET['p'])){
				
				$url_controller = $_GET['p'];

			}
			else{
				$url_controller = "content";
			}

			
			$response = main_model::urlsModel($url_controller);
			include ($response);

		}

















	}


 ?>