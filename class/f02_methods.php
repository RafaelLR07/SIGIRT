<?php 


/**
* Clase encargada de realizar los metodos referentes a los
procesos en el formato FT02
*/
class f02_methods

{	
	public function scannSizeDocs($array)
	{
		$tamano = sizeof($array)+1;
		for ($i=1; $i < $tamano; $i++) { 
			if($array["docum".$i]==""){
				return $i;
			}
		}
		return $tamano;
	}

	public function scannDocs($valor,$array)
	{
		$tamano = sizeof($array)+1;
		for ($i=01; $i < $tamano; $i++) { 
			if($valor == $array["docum".$i]){
				return "X";
			}
		}
		return "";

	}

	public function scannAntec($value)
	{	
		$resp = array('si_ind' => '', 'no_ind'=>'');
		if($value == 'si'){
			$resp['si_ind'] = 'checked';
			
		}else if($value == 'no'){
			$resp['no_ind'] = 'checked';
		}
		return $resp;
	}

	public function scannNaturaF01($natu_riesg)
	{
		$natu = array('A' =>'', 'B-T'=>'', 'B-D'=>'',
						 'A-T'=>'','C' =>'');
	
		switch ($natu_riesg) {
			case 'A':
				$natu['A'] = "selected";
				break;

			case 'B-T':
				$natu['B-T'] = "selected";
				break;

			case 'B-D':
				$natu['B-D'] = "selected";
				break;

			case 'A-T':
				$natu['A-T'] = "selected";
				break;

			case 'C':
				$natu['C'] = "selected";
				break;

			default:
				# code...
				break;
		}
		return $natu;
	}
	
	public function turnoScann($turno)
	{	
		$turnos = array('vespertino' =>'', 'nocturno'=>'', 'matutino'=>'',
						 'mixto'=>'','jornada_acumulada' =>'');
		
		switch ($turno) {
			case 'vespertino':
				$turnos['vespertino'] = "selected";
				break;

			case 'nocturno':
				$turnos['nocturno'] = "selected";
				break;

			case 'matutino':
				$turnos['matutino'] = "selected";
				break;

			case 'mixto':
				$turnos['mixto'] = "selected";
				break;

			case 'jornada_acumulada':
				$turnos['jornada_acumulada'] = "selected";
				break;

			default:
				# code...
				break;
		}
		return $turnos;
	}

	public function padxScann($array)
	{
		  $padX = array('rina' => '','aliento' => '','lesion' => '','tox' => '','ebrio' =>'','drog' => '','medico' => '');
                    
             for ($i=1; $i < 8; $i++) { 
                      
                switch ($array['pad'.$i]) {
                    case 'RIÑA':
                      $padX['rina'] = "checked";
                     break;
                            
                    case 'ALIENTO ALCOHOLICO':
                       $padX['aliento'] = "checked";
                     break;

                    case 'INTENCIONALIDAD DE LA LESIÓN':
                       $padX['lesion'] = "checked";
                      break;
                            
                    case 'TÓXICOS':
                      $padX['tox'] = "checked";
                      break;
                            
                    case 'ESTADO DE EBRIEDAD':
                       $padX['ebrio'] = "checked";
                      break;
                            
                    case 'BAJO EFECTO DE DROGAS':
                       $padX['drog'] = "checked";
                      break;
                            
                    case 'POR PRESCRIPCIÓN MEDICA':
                       $padX['medico'] = "checked";
                      break;
                            
                    default:
                      # code...
                      break;
                   }
             }
         return $padX;
	}

	public function llenaInputDatetime($fecha)
	{
		$arre_date = $this->divDatetime($fecha);
		$datetime_conver = $arre_date['anio'].'-'.$arre_date['mes'].'-'.$arre_date['dia'].'T'.$arre_date['horas'].':'.$arre_date['mins'];
		return $datetime_conver;

	}

	public function obtener_fecha2($date){
            list($anio, $mess, $dia) = explode("-", $date);
            $dias = array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo");
            $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $fecha = $dia ." de ".$mes[$mess-1] ." del ". $anio;
            return $fecha;

        }    
        
	public function comp_SIorNO($comparador)
	{
		$valor_comp = array('afirm' => '',
							'negat' => '' );
		if ($comparador == "si") {
			$valor_comp['afirm'] = "X";
			$valor_comp['negati'] = "";

		}else{
			$valor_comp['afirm'] = "";
			$valor_comp['negati'] = "X";
		}
		return $valor_comp;

	}

	public function compPadX($arre){
		$arrayPad = array(
					'RIÑA',
					'ALIENTO ALCOHOLICO',
					'INTENCIONALIDAD DE LA LESIÓN',
					'TÓXICOS',
					'ESTADO DE EBRIEDAD',
					'BAJO EFECTO DE DROGAS',
					'POR PRESCRIPCIÓN MEDICA' );
		
		for ($i=0; $i < count($arrayPad); $i++) { 
			$arrayPad[i];
		}

	}

	public function char_divDatetime($fecha){
		$fecha_arre = $this->divDatetime($fecha);
		$anio = str_split($fecha_arre['anio']);
		$mes = str_split($fecha_arre['mes']);
		$dia = str_split($fecha_arre['dia']);
		$horas = str_split($fecha_arre['horas']);
		$mins = str_split($fecha_arre['mins']);
		$fe = array('anio_1' => $anio[2], 
						'anio_2' => $anio[3], 
						'mes_1'=> $mes[0],
						'mes_2'=> $mes[1],
						'dia_1'=> $dia[0],
						'dia_2'=> $dia[1],
						'horas_1' => $horas[0], 
						'horas_2' => $horas[1], 
						'mins_1'=> $mins[0],
						'mins_2'=> $mins[1]);

		return $fe;
	}

	//division de la fecha a datetime
	public function divDatetime($fecha){

        	$fechaDiv = array('anio' => '', 'mes'=>'','dia'=>'','horas' => '', 'mins'=>'');
        	$diaTime = array('dia' => '', 'tiempo'=>'','meridiano'=>'');
			
			if($fecha == null){
	 			return $fechaDiv;
	 		
	 		}else{

	 		
            list($fechaDiv['anio'], $fechaDiv['mes'], $fechaDiv['dia']) = explode("-", $fecha);

           	if($fechaDiv['anio']=='0000'|| $fechaDiv['mes']=='00'|| $fechaDiv['dia']=='00'){
           		$fechaNull = array('anio' => '', 'mes'=>'','dia'=>'','horas'=>'','mins'=>'' );
           		return $fechaNull;
           	}else{
           		list($diaTime['dia'], $diaTime['tiempo']) = explode(" ", $fechaDiv['dia']);
           		$fechaDiv['dia'] = $diaTime['dia'];

           		list($fechaDiv['horas'], $fechaDiv['mins']) = explode(":",  $diaTime['tiempo']);
           		
           		if(((int)$fechaDiv['horas'])>=12){
           			$fechaDiv['meridiano']='PM';
           		}else{
           			$fechaDiv['meridiano']='AM';
           		}
            	return $fechaDiv;
           		
           	}

           }
        }

	 //divisor de fecha en dia mes año	
	 public function divDate($fecha){
	 		
        	$fechaDiv = array('anio' => '', 'mes'=>'','dia'=>'' );
            list($fechaDiv['anio'], $fechaDiv['mes'], $fechaDiv['dia']) = explode("-", $fecha);
           	if($fechaDiv['anio']=='0000'|| $fechaDiv['mes']=='00'|| $fechaDiv['dia']=='00'){
           		$fechaNull = array('anio' => '', 'mes'=>'','dia'=>'' );
           		return $fechaNull;
           	}else{

            	return $fechaDiv;
           		
           	}
        
        }


	//funcion para decidir la naturaleza de riesgo
	// MArca la X en el formato F02
	public function getNat($riesVal){
		$naturaleza = array('centro' =>  '',
						'comi' =>  '',
						'trayecto' =>  '',
						'enferme' =>  '');
		switch ($riesVal) {
			case 1:
				$naturaleza['centro'] = 'X';
				break;

			case 2:
				$naturaleza['comi'] = 'X';
				break;

			case 3:
				$naturaleza['trayecto'] = 'X';
				break;

			case 4:
				$naturaleza['enferme'] = 'X';
				break;
			
			default:
				# code...
				break;
		}

		return $naturaleza;

	}















	
}