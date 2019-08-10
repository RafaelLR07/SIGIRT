<?php 

/**
* 
*/
require_once "../controllers/pacientes_controller.php";
require_once "../models/f02_model.php";
session_start();
class async 
{
	public $valor;
	public $valor_pend;
	public $status;
	public $status_pend;

	public $status_med;
	public $filtro_med;
	public $is_med;
	public $id_medico;


	function activosQuery_f()
	{	
		if ($this->status =='ACTIVO'){
			$stat = $this->status;
			$val = $this->valor;
			$resp = control_f02::activosQuery_f_controller($stat,$val);
			echo $resp;
		}
		
	
	}

	function activosQuery_unf()
	{
		 if ($this->status =='ACTIVO') {
			
			$stat = $this->status;
			$res = control_f02::activosQuery_unf_controller($stat);
			echo $res;
		}
		
		
	}

	function pendiQuery_f()
	{	
		if ($this->status_pend =='PEND' && $this->valor_pend!==null){
			$stat = $this->status_pend;
			$val = $this->valor_pend;
			$resp_pend = control_f02::activosQuery_f_controller($stat,$val);
			echo $resp_pend;
		}
		
	
	}

	function pendiQuery_unf()
	{
		 if ($this->status_pend =='PEND'){
			$stat = $this->status_pend;
			$resp_pend = control_f02::activosQuery_unf_controller($stat);
			echo $resp_pend;
		}
		
		
	}

	function queryMedic_pac()
	{	
		if ($this->status_med =='ACTIVO'){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$resp_med = control_f02::queryMedics_paci($stat,"",$medico);
				echo $resp_med;
			}	
	}

	function queryMedic_pacFill()
	{	
		if ($this->status_med =='ACTIVO' && $this->filtro_med!=null){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$fill = $this->filtro_med;
				$resp_med_fil = control_f02::queryMedics_paci($stat,$fill,$medico);
				echo $resp_med_fil;
			}
	}

	function queryMedic_pacPen()
	{	
		if ($this->status_med =='PEND'){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$resp_med = control_f02::queryMedics_paci($stat,"",$medico);
				echo $resp_med;
			}	
	}

	function queryMedic_pacPenFill()
	{	
		if ($this->status_med =='PEND' && $this->filtro_med!=null){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$fill = $this->filtro_med;
				$resp_med_fil = control_f02::queryMedics_paci($stat,$fill,$medico);
				echo $resp_med_fil;
			}
	}

	function queryMedic_pacRec()
	{	
		if ($this->status_med =='RECHA'){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$resp_med = control_f02::queryMedics_paci($stat,"",$medico);
				echo $resp_med;
			}	
	}

	function queryMedic_pacRecFill()
	{	
		if ($this->status_med =='RECHA' && $this->filtro_med!=null){
				$stat = $this->status_med;
				$medico = $this->id_medico;
				$fill = $this->filtro_med;
				$resp_med_fil = control_f02::queryMedics_paci($stat,$fill,$medico);
				echo $resp_med_fil;
			}
	}


			
}


# Busqueda en tiempo real con filtro y generalizada de pacientes pendientes 
# Con tramite esperando revision de oficina del trabajo 
if(isset($_POST['consulta_pend'])){
	if ($_POST['status'] == "PEND") {
	$d = new async();
	$d->valor_pend =  $_POST['consulta_pend'];
	$d->status_pend = "PEND";
	$d->pendiQuery_f();
}
	
}else {
	if ($_POST['status'] == "PEND") {
	$e = new async();
	$e->status_pend = "PEND";
	$e->pendiQuery_unf();
 }
}


# Busqueda en tiempo real con filtro y generalizada de pacientes activos 
# Con tramite en proceso
if(isset($_POST['consulta'])){
	if ($_POST['status'] == "ACTIVO") {
	$a = new async();
	$a->valor =  $_POST['consulta'];
	$a->status = "ACTIVO";
	$a->activosQuery_f();

	}
	
	
}else{
	if ($_POST['status'] == "ACTIVO") {
	$b = new async();
	$b->status = "ACTIVO";
	$b->activosQuery_unf();
	
	}
}

if($_SESSION['tipoUsuario']=="Medico"){
	

	if(isset($_POST['but_med'])){
		if($_POST['status']=="ACTIVO_med"){
			$medic_query = new async();
			$medic_query->status_med = "ACTIVO";
			$medic_query->filtro_med = $_POST['but_med'];
			$medic_query->id_medico = $_SESSION['ide'];
			echo $medic_query->queryMedic_pacFill();	
		
		}				
	}else{
		if($_POST['status']=="ACTIVO_med"){
			$medic_query = new async();
			$medic_query->status_med = "ACTIVO";
			$medic_query->id_medico = $_SESSION['ide'];
			echo $medic_query->queryMedic_pac();	
		
		}
		
	}


	if(isset($_POST['pend_med'])){
		if($_POST['status']=="PEND_med"){
			$medic_query_pend = new async();
			$medic_query_pend->status_med = "PEND";
			$medic_query_pend->filtro_med = $_POST['pend_med'];
			$medic_query_pend->id_medico = $_SESSION['ide'];
			echo $medic_query_pend->queryMedic_pacPenFill();	
		
		}				
	}else{
		if($_POST['status']=="PEND_med"){
			$medic_query_pend = new async();
			$medic_query_pend->status_med = "PEND";
			$medic_query_pend->id_medico = $_SESSION['ide'];
			echo $medic_query_pend->queryMedic_pacPen();	
		
		}
		
	}

	if(isset($_POST['recha_med'])){
		if($_POST['status']=="RECHA_med"){
			$medic_query_recha = new async();
			$medic_query_recha->status_med = "RECHA";
			$medic_query_recha->filtro_med = $_POST['recha_med'];
			$medic_query_recha->id_medico = $_SESSION['ide'];
			echo $medic_query_recha->queryMedic_pacRecFill();	
		
		}				
	}else{
		if($_POST['status']=="RECHA_med"){
			$medic_query_recha = new async();
			$medic_query_recha->status_med = "RECHA";
			$medic_query_recha->id_medico = $_SESSION['ide'];
			echo $medic_query_recha->queryMedic_pacRec();	
		
		}
		
	}


}
			
			