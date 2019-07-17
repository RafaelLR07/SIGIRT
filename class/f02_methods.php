<?php 


/**
* Clase encargada de realizar los metodos referentes a los
procesos en el formato FT02
*/
class f02_methods
{
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