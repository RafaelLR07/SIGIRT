<?php

include 'header_ced_ini.php';
include_once "../../../controllers/cedula_controller.php";
include_once "../../../controllers/pacientes_controller.php";
include_once "../../../models/cedula_model.php";
include_once "../../../models/f02_model.php";
include_once "../../../class/f02_methods.php";
date_default_timezone_set('America/Mexico_City');

//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    //consulta frt02
	$contr_f02 = new control_f02();
	$methods = new f02_methods();
	$cedula_info = new cedula_controller();
	$token = $_GET['token'];
	$cedula = $cedula_info->getDatos_ced($token);

	//consulta la informacion del formato 2
	$f02 = $cedula_info->getDatos_f02($token);
	$medic_info = $contr_f02->verMed_f02($f02['id_medicos']);

	//consulta paciente general
	$pacGrl = $cedula_info->getDatos_pac($f02['id_pacientes_grl']);

	$pdf->AliasNbPages();
	$pdf->AddPage("L",array(216,279));
    $pdf->Ln(0.5);

    //crear un array del fill color
//216,279
    //titulo


    $pdf->SetLineWidth(0.5); 
    $pdf->SetFillColor(255, 255, 255);    
	$pdf->Rect(15,5,250,10,'DF');

	$pdf->SetXY(17,7);
    $pdf->Image('images/logo.jpg', 16, 6, 34, 8.5);
	$pdf->SetXY(9,3);
	$pdf->SetFont('ARIAL','B',15);
	$pdf->Ln(2.5);
	$token = $_GET['token'];
	$pdf->Cell(0,10,utf8_decode("CEDULA DE IDENTIFICACIÓN INICIAL"),0,0,'C');

	$pdf->SetFillColor(255, 255, 255);    
	$pdf->Rect(15,15,90,9,'DF');
	
	$pdf->SetXY(16,17);
	$pdf->SetFont('ARIAL','',7.5);	
	$pdf->Cell(22,5,utf8_decode('FECHA'),0,0,'R',true);
	//leyendas
	$pdf->SetXY(45,16);
	$pdf->SetFont('ARIAL','',6);	
	
    //$fecha = strftime("%Y-%m-%d");
	$pdf->Cell(15,1.5,utf8_decode('DIA'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('MES'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('AÑO'),0,0,'C',true);

	
	$pdf->SetXY(45,18);
	//$pdf->SetLineWidth(0.2); 
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,4,utf8_decode(date("d")),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode(date("m")),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode(date("Y")),1,0,'C',true);



	//delegacion
	$pdf->SetFillColor(255, 255, 255);    
	$pdf->Rect(118,15,147,9,'DF');
	$pdf->SetXY(121,16);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(30,7,utf8_decode('DELEGACIÓN'),0,0,'C',true);
	$pdf->SetXY(158,17);
	$pdf->Cell(100,5,utf8_decode($cedula['delegacion']),1,0,'C',true);

	//nombre
	$pdf->SetFillColor(255, 255, 255);    
	$pdf->Rect(15,28,250,12,'DF');
	$pdf->SetFont('ARIAL','',7.5);
	$pdf->SetXY(20,28.5);
	$pdf->Cell(80,3,utf8_decode('APELLIDO PATERNO'),0,0,'C',true);
	$pdf->SetXY(100,28.5);
	$pdf->Cell(80,3,utf8_decode('APELLIDO MATERNO'),0,0,'C',true);
	$pdf->SetXY(185,28.5);
	$pdf->Cell(80,3,utf8_decode('NOMBRE'),0,0,'C',true);
	$pdf->SetXY(20,33);
	$pdf->SetFont('ARIAL','',6);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(77,5,utf8_decode($pacGrl['ape_pater']),1,0,'C',true);
	$pdf->SetXY(102,33);
	$pdf->Cell(77,5,utf8_decode($pacGrl['ape_mater']),1,0,'C',true);
	$pdf->SetXY(184,33);
	$pdf->Cell(77,5,utf8_decode($pacGrl['nombre']),1,0,'C',true);
	/*
	$pdf->Cell(77,5,utf8_decode('APELLIDO MATERNO DE MA'),1,0,'C',true);
	$pdf->Cell(80,5,utf8_decode('NOMBREPATERNOPATERNO'),1,0,'C',true);*/

	$pdf->SetFillColor(255, 255, 255);    
	$pdf->Rect(15,45,250,23,'DF');
	$pdf->SetFont('ARIAL','',7);
	$pdf->SetXY(20,51);
	$pdf->MultiCell(20,5,utf8_decode('DOMICILIO PARTICULAR'),0,'L',false);

	//DEPENDIENDO EL TAMAÑO DE LA CADENA, SERA EL TAMAÑO DE LA FUENTE	
	$pdf->SetFont('ARIAL','',10);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Rect(51,45.1,96,23,'DF');
	$pdf->SetXY(52,46);
	$domicilio = $pacGrl['calle'].', '.$pacGrl['num_int'].', '.$pacGrl['num_ext'].', '.$pacGrl['colonia'].', '.$pacGrl['localidad'].', '.$pacGrl['municipio'].', '.$pacGrl['estado'].', '.$pacGrl['cp'];
	$pdf->SetFillColor(206, 231, 239);

	$pdf->MultiCell(92,5,utf8_decode($domicilio),0,'L',true);

	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(175,45,90,8,'DF');
	$pdf->SetFont('ARIAL','',7);
	$pdf->SetXY(189,47);

	$masculino="";
	$femenino="";
	if($pacGrl['sexo']=="masculino"){
		$masculino="X";
	}else{
		$femenino="X";
	}


	$pdf->Cell(10,4,utf8_decode('SEXO'),0,0,'R',true);
	$pdf->SetXY(208,47);
	$pdf->Cell(10,4,utf8_decode('M'),0,0,'R',true);

	$pdf->SetFillColor(208, 200, 198);
	$pdf->SetXY(221,46);
	 $pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(10,6,utf8_decode($masculino),0,0,'C',true);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetXY(238,47);
	$pdf->Cell(10,4,utf8_decode('F'),0,0,'C',true);
	 $pdf->SetFillColor(206, 231, 239);
	$pdf->SetXY(248,46);
	$pdf->Cell(10,6,utf8_decode($femenino),0,0,'C',true);

	//Telefono
	$pdf->SetXY(167.5,55);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(20,4,utf8_decode('TEL. PARTICULAR'),0,0,'C',false);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->SetXY(198,55);
	$pdf->Cell(60,4,utf8_decode($pacGrl['tel_particular']),1,0,'C',true);

	//email
	$pdf->SetXY(158.5,61);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,4,utf8_decode('EMAIL'),0,0,'C',false);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->SetXY(186,61);
	$pdf->Cell(72,4,utf8_decode($pacGrl['mail']),1,0,'C',true);
	
	//seccion rfc y curp

	//RFC
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(15,68,250,8,'DF');
	$pdf->SetXY(15,68.4);
	$pdf->Cell(30,6,utf8_decode('RFC'),'L',0,'C',true);
	$pdf->SetXY(51,69.1);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(96,5,utf8_decode($pacGrl['rfc']),1,0,'C',true);

	//CURP
	$pdf->SetFillColor(255, 255, 255);
	$pdf->SetXY(163,68.4);
	$pdf->Cell(15,6,utf8_decode('CURP'),0,0,'C',true);
	$curp = str_split($pacGrl['curp']);
	$pdf->SetXY(186,69.1);
	$pdf->SetFillColor(206, 231, 239);
	$var_uidt = 4;
	$var_heigt = 5;
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[0]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[1]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[2]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[3]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[4]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[5]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[6]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[7]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[8]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[9]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[10]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[11]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[12]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[13]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[14]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[15]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[16]),1,0,'C',true);
	$pdf->Cell($var_uidt,$var_heigt,utf8_decode($curp[17]),1,0,'C',true);

	
	//parte de dependencia
	//marco
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(15,81,250,35,'DF');

	$pdf->SetXY(20,84);
	$pdf->Cell(25,5,utf8_decode('DEPENDENCIA'),0,0,'L',true);
	$pdf->SetXY(51,84);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(96,5,utf8_decode($cedula['dependencia']),1,0,'C',true);
	
	$pdf->SetXY(20,92);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('OFICINA DE ADSCRIPCIÓN'),0,0,'L',true);
	$pdf->SetXY(59,92);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(88,5,utf8_decode($cedula['ofi_adscripcion']),1,0,'C',true);

	$pdf->SetXY(20,100);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('ACTIVIDAD'),0,0,'L',true);
	$pdf->SetXY(51,100);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(96,5,utf8_decode($cedula['actividad']),1,0,'C',true);

	$pdf->SetXY(20,108);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('UNIDAD MEDICA DONDE RECIBE ATENCIÓN MÉDICA'),0,0,'L',true);
	$pdf->SetXY(87,108);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(60,5,utf8_decode($cedula['unidad_medica_aten']),1,0,'C',true);

	//subdivision de ramo
	$pdf->SetXY(164,84);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('RAMO'),0,0,'R',true);
	$pdf->SetXY(198,84);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(60,5,utf8_decode($cedula['ramo']),1,0,'C',true);

	$pdf->SetXY(164,92);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('TEL. OFICINA'),0,0,'R',true);
	$pdf->SetXY(198,92);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(60,5,utf8_decode($cedula['tel_oficina']),1,0,'C',true);

	$pdf->SetXY(164,100);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('CLINICA DE ADSCRIPCIÓN'),0,0,'R',true);
	$pdf->SetXY(198,100);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(60,5,utf8_decode($cedula['cli_ads']),1,0,'C',true);

	$pdf->SetXY(156,108);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('MÉDICO TRATANTE'),0,0,'R',true);
	$pdf->SetXY(181,108);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(77,5,utf8_decode($medic_info['apellido_pat'].' '.$medic_info['apellido_mat'].' '.$medic_info['nombre']),1,0,'C',true);


	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(15,120,250,25,'DF');
	$pdf->SetXY(20,121);
	$pdf->Cell(25,5,utf8_decode('¿DESDE QUE FECHA RECIBE ATENCIÓN MEDICA POR ESTE RIESGO DE TRABAJO?'),0,0,'L',true);



	$pdf->Rect(146,120,80,10,'DF');
	$pdf->SetXY(155,122);
	$pdf->SetFont('ARIAL','',7.5);	
	$pdf->Cell(13,5,utf8_decode('FECHA'),0,0,'R',true);
	//leyendas
	$pdf->SetXY(170,121);
	$pdf->SetFont('ARIAL','',6);	
	$fecha_div = $methods->divDatetime($f02['fecha_atencion']);

	$pdf->Cell(15,1.5,utf8_decode('DIA'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('MES'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('AÑO'),0,0,'C',true);

	$pdf->SetFillColor(206, 231, 239);
	
	$pdf->SetXY(170,123);
	$pdf->Cell(15,4,utf8_decode($fecha_div['dia']),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode($fecha_div['mes']),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode($fecha_div['anio']),1,0,'C',true);
	
	$pdf->SetFillColor(255, 255, 255);
	//licencias medicas
	$pdf->SetFont('ARIAL','',7);
	$pdf->SetXY(20,131);
	$pdf->Cell(25,5,utf8_decode('¿RECIBE LICENCIAS MEDICAS?'),0,0,'L',true);	
	
	$var_lic_si="";
	$var_lic_no="";
	if($f02['fecha_ini_lic_med']&
       $f02['fecha_fin_lic_med']&
	   $f02['dias_lic']){
		$var_lic_si="X";
	}else{
		$var_lic_no="X";
	}

	$pdf->SetXY(60,131);
	$pdf->Cell(25,5,utf8_decode('SI'),0,0,'L',true);	
	$pdf->SetXY(70,132);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(10,4,utf8_decode($var_lic_si),1,0,'C',true);

	$pdf->SetXY(90,131);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('NO'),0,0,'L',true);	
	$pdf->SetXY(100,132);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(10,4,utf8_decode($var_lic_no),1,0,'C',true);

	
	$pdf->SetXY(180,132);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('DÍAS AMPARADOS'),0,0,'L',true);	
	$pdf->SetXY(207,132);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(50,4,utf8_decode($f02['dias_lic']),1,0,'C',true);


	$pdf->SetXY(20,138);
	$pdf->SetFillColor(255, 255, 255);

	$pdf->Cell(25,5,utf8_decode('¿DE KUE UNIDAD MEDICA SON LAS LICENCIAS MÉDICAS?'),0,0,'L',true);	
	$pdf->SetXY(90,138);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(90,5,utf8_decode($cedula['unidad_medica_aten']),1,0,'C',true);


	//

	//antecedentes

	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(15,149,250,35,'DF');

	$pdf->SetXY(20,153);
	$pdf->Cell(25,5,utf8_decode('¿HA TENIDO OTROS RIESGOS DE TRABAJO?'),0,0,'L',true);

	$ries_previo = $cedula_info->getAnt_F02($f02['id_pacientes_grl']);
	
	
	$valor_previo_si = "";
	$valor_previo_no = "";
	if($ries_previo!="null"){
		$valor_previo_si="X";
	}else if($ries_previo=="null"){
		$valor_previo_no="X";
	}


	$pdf->SetXY(100,153);
	$pdf->Cell(10,5,utf8_decode('SI'),0,0,'L',true);
	$pdf->SetXY(115,153);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($valor_previo_si),1,0,'C',true);
	
	//no
	$pdf->SetXY(140,153);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('NO'),0,0,'L',true);
	$pdf->SetXY(155,153);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($valor_previo_no),1,0,'C',true);

	
	$pdf->SetXY(20,162);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('¿SE CALIFICO COMO RIESGO DE TRABAJO?'),0,0,'L',true);
	$pdf->SetXY(100,162);
	$cali_ries_si ="";
	$cali_ries_no ="";
	if ($cedula['cali_otro_ries']="si") {
		$cali_ries_si ="X";
	}else{
		$cali_ries_no ="X";
	}
	
	$riesg_tr = $methods->comp_SIorNO($cedula['cali_otro_ries']);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('SI'),0,0,'L',true);
	$pdf->SetXY(115,162);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_tr['afirm']),1,0,'C',true);

	//no
	$pdf->SetXY(140,162);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('NO'),0,0,'L',true);
	$pdf->SetXY(155,162);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_tr['negati']),1,0,'C',true);

	$pdf->SetXY(20,170);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('¿SE LE DICTAMINARON SECUELAS VALUABLES?'),0,0,'L',true);
	$riesg_sec = $methods->comp_SIorNO($cedula['secuelas']);
	$pdf->SetXY(100,170);
	$pdf->Cell(10,5,utf8_decode('SI'),0,0,'L',true);
	$pdf->SetXY(115,170);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_sec['afirm']),1,0,'C',true);

	//no
	$pdf->SetXY(140,170);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('NO'),0,0,'L',true);
	$pdf->SetXY(155,170);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_sec['negati']),1,0,'C',true);

	$pdf->SetXY(20,178);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(25,5,utf8_decode('¿SE DIO UNA INCAPACIDAD PARCIAL PERMANENTE?'),0,0,'L',true);
	$riesg_inc = $methods->comp_SIorNO($cedula['incapacidad']);
	$pdf->SetXY(100,178);
	$pdf->Cell(10,5,utf8_decode('SI'),0,0,'L',true);
	$pdf->SetXY(115,178);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_inc['afirm']),1,0,'C',true);

	//no
	$pdf->SetXY(140,178);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(10,5,utf8_decode('NO'),0,0,'L',true);
	$pdf->SetXY(155,178);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,5,utf8_decode($riesg_inc['negati']),1,0,'C',true);

	//apartado de fecha
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(177,149,80,10,'DF');
	$pdf->SetXY(182,152);
	$pdf->SetFont('ARIAL','',7.5);	
	$pdf->Cell(13,5,utf8_decode('FECHA'),0,0,'R',true);
	//leyendas
	$arrayDate = array('dia' => '','mes' => '','anio' => '', );

	if($ries_previo!="null"){
		$fecha_prec = $methods->divDatetime($ries_previo['fecha_atencion']);
		$arrayDate['dia'] = $ries_previo['dia'];
		$arrayDate['mes'] = $ries_previo['mes'];
		$arrayDate['anio'] = $ries_previo['anio'];
	}
	
	$pdf->SetXY(197,150);
	$pdf->SetFont('ARIAL','',6);
	$pdf->SetFillColor(255, 255, 255);	
	$pdf->Cell(15,1.5,utf8_decode('DIA'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('MES'),0,0,'C',true);
	$pdf->Cell(15,1.5,utf8_decode('AÑO'),0,0,'C',true);

	
	$pdf->SetXY(197,152);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(15,4,utf8_decode($arrayDate['dia']),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode($arrayDate['mes']),1,0,'C',true);
	$pdf->Cell(15,4,utf8_decode($arrayDate['anio']),1,0,'C',true);

	$pdf->SetXY(180,177);
	$pdf->SetFillColor(255, 255, 255);	
	$pdf->Cell(25,5,utf8_decode('PORCENTAJE'),0,0,'L',true);	
	$pdf->SetXY(207,177);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(50,4,utf8_decode($cedula['porcentaje']),1,0,'L',true);
	

	//subdivision de ramo
	$pdf->SetFillColor(255, 255, 255);	
	$pdf->Rect(15,188,250,15,'DF');
	$pdf->SetXY(20,191);

	$pdf->Cell(30,4,utf8_decode('ELABORÓ'),1,0,'L',true);

	$pdf->SetXY(58,191);
	$name = $pacGrl['ape_pater'].' '.$pacGrl['ape_mater'].' '.$pacGrl['nombre'];
	$pdf->Cell(110,4,utf8_decode(''),1,0,'L',true);

	$pdf->Line(58, 198, 168, 198);

	$pdf->SetXY(58,191);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(110,4,utf8_decode($name),1,0,'C',true);

	$pdf->SetXY(170,191);
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(30,4,utf8_decode('FIRMA'),1,0,'L',true);
	$pdf->Line(208, 194, 250, 194);




	//$pdf->Rect(156,55,50,27,'DF');
	//$pdf->Rect(105,55,40,18,'DF');
	//$pdf->SetXY(105,55);




   

$pdf->Output();






?>