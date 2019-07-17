<?php 

	/**
	* 
	*/
	class Pacientes_activos
	{	//posible funcion de busqueda
		/*
		function SearchpacAct_controller($paci){
			if($paci==""){
				echo "no se encontro";
			}else{

				echo "buscando".$paci;
			}
		}*/



		function pacAct_controller(){
		
			$respuesta=  datos_f02::pacAct_model("pacientes_grl");
			$cadena="";
			$cadena.="<table class='table table-striped' id='tabla_resultado'>
			<thead>
				<tr class='table-bordered'>
					<td >NOMBRE</td>
					<td >APELLIDO PATERNO</td>
					<td >APELLIDO MATERNO</td>
				
					
				</tr>
			</thead>
			<tbody>";
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

				$cadena.='<tr>';
			}
			$cadena.="</tbody";
			$cadena.="</table";

			echo $cadena;

			
		  
		}
	











	}



 ?>