<?php 



/**
* 
*/
class test_controller
{
	public function nullo()
	{
			$respuesta = datos_f02::consulta_grl_model("pacientes_grl");
			$cadena="";
			$cadena.="<table class='table table-striped' id='tabla_resultado' style='position:relative'>
			
				<tr class='table-bordered'>
					<th >NOMBRE</th>
					<th >APELLIDO PATERNO</th>
					<th >APELLIDO MATERNO</th>
				
					
				</tr>
			";
			$cadena.= "string";'<div class="alert alert-danger">Sin resultados</div>';	
			echo $cadena;
	}
	
	public function imprimir()
	{
			$respuesta = datos_f02::pacAct_controller("pacientes_grl",$valor);
			
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

			echo  $cadena;

		
	}
	public function im($value)
	{
		$respuesta = control_f02::pacAct_controller("pacientes_grl");
	}
	
}

if(isset($_POST['consulta'])){

	$valor = $_POST['consulta'];
	$a = new test_controller();
	$a->im($valor);
	
}else{
	$b = new test_controller();
	$b->nullo();
	
}