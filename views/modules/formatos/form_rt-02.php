<?php

include 'header_frt02.php';
include_once "../../../controllers/pacientes_controller.php";
include_once "../../../models/f02_model.php";
include_once "../../../class/f02_methods.php";

//nombre rfc, diagnostico y observaciones
$token = $_GET['token'];

$f02_serch = new control_f02();
$valor_f02 = $f02_serch->verPac_f02($token);
$medico = $valor_f02['id_medicos'];
$riesgo = $valor_f02['id_nat_riesgo'];
//consulta de medicos
$valor_medic = $f02_serch->verMed_f02($medico);
//datos de Naturaleza de riesgo
$valor_riesgo = $f02_serch->verRies_f02($riesgo);

//informacion general del paciente
$info_grl = $f02_serch->getPac_grl($valor_f02['id_pacientes_grl']);

$pdf = new PDF();
    
	$pdf->AliasNbPages();
	$pdf->AddPage("P","Legal");
    $pdf->Ln(10);

    //titulo
    $pdf->setY(45);
    $pdf->SetFont('ARIAL','B',16);
    $pdf->Cell(200,10,utf8_decode('CERTIFICADO MÉDICO INICIAL'),0,0,'C');
	
	// encabezado nombre del paciente y curp
	$pdf->Ln(10);    
    $pdf->SetFont('ARIAL','B',8);
    $pdf->SetX(12);
    $pdf->Cell(180,10,utf8_decode('NOMBRE DEL PACIENTE:'),0,0,'j');

    $pdf->SetFillColor(206, 231, 239);

    $azul = [206, 231, 239];
    $nombre_pac = $info_grl['ape_pater'].' '.$info_grl['ape_mater'].' '.$info_grl['nombre'];
   	$pdf->SetX(52);
    $pdf->Cell(82,7,utf8_decode($nombre_pac),'B',0,'L',true);

	$pdf->SetX(134);
    $pdf->Cell(20,7,utf8_decode('RFC ó CURP'),0,0,'L',false);

    $pdf->SetX(154);
    $val_rfc = "";

    	if($info_grl['rfc']!=""){
    		$val_rfc = $info_grl['rfc'];
    	}else{
    		$val_rfc = $info_grl['curp'];
    	}

    $pdf->Cell(44,7,utf8_decode($val_rfc),'B',0,'L',true);

    $pdf->SetXY(140,68);
	$pdf->SetFillColor(227, 232, 234);
	$pdf->MultiCell(64,8,utf8_decode('UNIDAD MEDICA QUE EXPIDE CERTIFICADO MÉDICO INICIAL'),1,'C',true);


	$pdf->Ln(0);
	$pdf->SetX(140);
	//$pdf->SetY(83);
	$pdf->MultiCell(64,8,utf8_decode($valor_f02['unidad_med_ini']),1,'C',false);


    //segunda parte naturaleza del riesgo y clinica
    //tabla de naturaleza de riesgo
    $pdf->SetXY(70,56);
	$pdf->Ln(12);
	$pdf->SetFont('ARIAL','',9);
	$pdf->SetFillColor(227, 232, 234);
	$pdf->Cell(85,16,utf8_decode('NATURALEZA DE RIESGO'),1,0,'C',true);


	//methodo de obtencion de naturaleza de riesgo
	$grlClass = new f02_methods();
	$riesVal = $valor_riesgo['id_nat_riesgo'];
	$naturaleza = $grlClass->getNat($riesVal);
	

	$pdf->Ln(16);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE CENTRO DE TRABAJO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode($naturaleza['centro']),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE EN COMISIÓN'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode($naturaleza['comi']),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE EN TRAYECTO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode($naturaleza['trayecto']),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ENFERMEDAD DE TRABAJO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode($naturaleza['enferme']),1,0,'C',false);

	$defTrue="";
	$defDate = $valor_f02['fecha_def'];
	$fechaDiv_def = $grlClass->divDate($defDate);

	if($fechaDiv_def['anio']!=''){
		$defTrue = "X";
			
	}else{
		$defTrue = "";
		
	}
	
	$pdf->Ln(7);
	$pdf->Cell(24,21,utf8_decode('DEFUNCIÓN'),1,0,'J',false);

	$pdf->SetFillColor(186, 190, 191);
	$pdf->Cell(44,7,utf8_decode('FECHA'),1,0,'C',true);
	//check de el apartado "Defuncion"
	$pdf->Cell(17,21,utf8_decode($defTrue),1,0,'C',false);

	$pdf->ln(7);
	$pdf->SetX(34);
	$pdf->Cell(13,7,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('AÑO'),1,0,'C',false);
	
	$pdf->ln(7);
	$pdf->SetX(34);
	$pdf->Cell(13,7,utf8_decode($fechaDiv_def['dia']),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode($fechaDiv_def['mes']),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode($fechaDiv_def['anio']),1,0,'C',false);

	//minitabla de unidad medica kue expide
	
	$fechAten = $grlClass->divDatetime($valor_f02['fecha_atencion']);

	$pdf->Ln(15);
	$pdf->Cell(125,15,utf8_decode('FECHA EN QUE SE PRESENTÓ POR PRIMERA VEZ A LA ATENCIÓN MÉDICA'),1,0,'L',false);
	$pdf->Cell(13,7,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('AÑO'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('HORA'),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->SetX(135);
	$pdf->Cell(13,8,utf8_decode($fechAten['dia']),1,0,'C',false);
	$pdf->Cell(15,8,utf8_decode($fechAten['mes']),1,0,'C',false);
	$pdf->Cell(16,8,utf8_decode($fechAten['anio']),1,0,'C',false);
	$pdf->Cell(16,8,utf8_decode($fechAten['horas'].':'.$fechAten['mins'].' '.$fechAten['meridiano']),1,0,'C',false);

	$pdf->Ln(10);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(40,14,utf8_decode('ANTECEDENTES'),0,0,'L',false);

	$pdf->Ln(14);
	$pdf->SetFont('ARIAL','',9);
	$pdf->MultiCell(28,5,utf8_decode('FECHA Y HORA EN LA QUE SE RECIBIÓ AL PACIENTE'),1,'L',false);

	//obtencion de la fecha dividida por sergmentos
	$urgeDate = $grlClass->char_divDatetime($valor_f02['fecha_urgencias']);


	$pdf->SetXY(38,172);
    $pdf->Cell(6,11,utf8_decode($urgeDate['dia_1']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['dia_2']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['mes_1']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['mes_2']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['anio_1']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['anio_2']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['horas_1']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['horas_2']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['mins_1']),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode($urgeDate['mins_2']),1,0,'C',false);

	$pdf->Ln(11);
	$pdf->SetX(38);
	$pdf->Cell(12,9,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('AÑO'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('HORA'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('MIN'),1,0,'C',false);

   	
   	$pdf->SetXY(102,172); 
   	$pdf->MultiCell(103,5.5,utf8_decode('MARQUE CON UNA "X", LO QUE SE RELACIONA CON EL PADECIMIENTO ACTUAL'),1,'C',false);

   	//$f02_serch->getPadeX_pac($valor_f02['id_pacientes_grl']);
   	//$padx_arre =  $grlClass->compPadX($f02_serch);
   	

   	$pdf->SetX(102);
   	$pdf->SetFont('ARIAL','',8);
   	$pdf->Cell(8,9,utf8_decode('RIÑA'),1,0,'C',false);
   	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);
	$pdf->MultiCell(24,4.5,utf8_decode('ALIENTO ALCOHOLICO'),1,'C',false);
	$pdf->SetXY(142,183);
	$pdf->SetFont('Symbol','',30);
	$pdf->Cell(8,9,chr(215),1,0,'C',false);

	$pdf->SetFont('ARIAL','',7);
	$pdf->MultiCell(25,4.5,utf8_decode('INTENCIONALIDAD DE LA LESIÓN'),1,'C',false);
	$pdf->SetXY(175,183);
	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);

	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(14,9,utf8_decode('TÓXICOS'),1,0,'C',false);
	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);
	
	$pdf->Ln(9);
	$pdf->SetX(102);
	$pdf->MultiCell(25,4.5,utf8_decode('ESTADO DE EBRIEDAD'),1,'C',false);
	$pdf->SetXY(127,192);
	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);
	
	$pdf->MultiCell(25,4.5,utf8_decode('BAJO EFECTO DE DROGAS'),1,'C',false);
	$pdf->SetXY(160,192);
	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);

	$pdf->SetFont('ARIAL','',7);
	$pdf->MultiCell(29,4.5,utf8_decode('POR PRESCRIPCIÓN MEDICA'),1,'C',false);
	$pdf->SetXY(197,192);
	$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);

	//seccion de las areas grandes
	$pdf->Ln(15);
	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,208, 195, 60,'D');
	$pdf->Cell(0,9,utf8_decode('PADECIMIENTO ACTUAL'),'',0,'L',false);
	$pdf->Ln(9);
	$pdf->SetFont('ARIAL','',10);

	//$cantidad = strlen($var);

	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['pad_actual']),'','J',false);
	
	$pdf->Rect(10,268, 195, 60,'D');
		
	$pdf->SetXY(10,267);
	$pdf->SetFont('ARIAL','',9);
	$pdf->Cell(0,9,utf8_decode('EXPLORACIÓN FÍSICA (LESIONES ANATÓMICAS)'),0,0,'L',false);
	$pdf->SetXY(10,275);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['exploracion_fisica']),0,'J',false);

	$pdf->SetXY(10,326);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(0,9,utf8_decode('ANVERSO'),0,0,'L',false);


	//segunda hoja
	$pdf->AddPage("P","Legal");
	$pdf->Ln(3);
	$pdf->SetFont('ARIAL','',9);

	$pdf->Rect(10,30, 195, 36,'D');
	$pdf->SetXY(10,28);
	$pdf->Cell(0,9,utf8_decode('LABORATORIO Y GABINETE'),0,0,'L',false);
	$pdf->SetXY(10,35);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['lab_gabinete']),0,'J',false);

	
	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,66, 195, 36,'D');
	$pdf->SetXY(10,64);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO NOSOLÓGICO'),0,0,'L',false);
	$pdf->SetXY(10,72);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['diag_nosologico']),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,102, 195, 36,'D');
	$pdf->SetXY(10,100);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO ETIOLÓGICO'),0,0,'L',false);
	$pdf->SetXY(10,108);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['diag_etiologico']),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,138, 195, 36,'D');
	$pdf->SetXY(10,136);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO ANATOMO FUNCIONAL'),0,0,'L',false);
	$pdf->SetXY(10,144);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['diag_anatomo']),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,174, 195, 36,'D');
	$pdf->SetXY(10,172);
	$pdf->Cell(0,9,utf8_decode('PRONÓSTICO'),0,0,'L',false);
	$pdf->SetXY(10,179);
	$pdf->MultiCell(194,4.5,utf8_decode($valor_f02['pronostico']),0,'J',false);


	$pdf->SetXY(10,215);
	$pdf->Cell(80,12,utf8_decode('DÍAS DE LICENCIA MÉDICA OTORGADOS'),1,0,'L',false);
	$pdf->SetXY(100,215);
	$pdf->Cell(10,12,utf8_decode($valor_f02['dias_lic']),1,0,'L',false);
	$pdf->SetXY(120,215);
	$pdf->Cell(10,12,utf8_decode('DE'),1,0,'L',false);
	$pdf->SetFillColor(186, 190, 191);
	$pdf->Cell(10,4,utf8_decode('DIA'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('MES'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('AÑO'),1,0,'L',true);
	$pdf->Cell(10,12,utf8_decode('A'),0,0,'C',false);

	$arre_div = $grlClass->divDate($valor_f02['fecha_ini_lic_med']);
	$arre_div2 = $grlClass->divDate($valor_f02['fecha_fin_lic_med']);

	$pdf->SetXY(130,219);
	$pdf->Cell(10,8,utf8_decode($arre_div['dia']),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode($arre_div['mes']),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode($arre_div['anio']),1,0,'L',false);

	$pdf->SetXY(170,215);
	$pdf->Cell(10,4,utf8_decode('DIA'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('MES'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('AÑO'),1,0,'L',true);
	$pdf->SetXY(170,219);
	$pdf->Cell(10,8,utf8_decode($arre_div2['dia']),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode($arre_div2['mes']),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode($arre_div2['anio']),1,0,'L',false);

	$pdf->SetXY(10,234);
	$pdf->MultiCell(27,4.5,utf8_decode('NOMBRE DEL MÉDICO'),1,'L',false);
	$pdf->SetXY(42,234);
	$pdf->Cell(27,2,utf8_decode($valor_medic['apellido_pat']),0,1,'C',false);
	$pdf->SetXY(97,234);
	$pdf->Cell(27,2,utf8_decode($valor_medic['apellido_mat']),0,1,'C',false);
	$pdf->SetXY(157,234);
	$pdf->Cell(27,2,utf8_decode($valor_medic['nombre']),0,1,'C',false);


	$pdf->Rect(37,237.5, 170, 5.5,'D');
	$pdf->SetXY(37,237);
	$pdf->Cell(50,5.5,utf8_decode('APELLIDO PATERNO'),0,1,'C',false);
	$pdf->SetXY(97,237);
	$pdf->Cell(50,5.5,utf8_decode('APELLIDO MATERNO'),0,1,'C',false);
	$pdf->SetXY(157,237);
	$pdf->Cell(50,5.5,utf8_decode('NOMBRE(S)'),0,1,'C',false);

	$pdf->SetXY(10,250);
	$pdf->MultiCell(27,5,utf8_decode('CEDULA PROFESIONAL'),1,'L',false);
	$pdf->SetXY(37,250);
	$pdf->Cell(50,9.9,utf8_decode($valor_medic['cedula']),1,1,'C',false);
	$pdf->SetXY(130,250);
	$pdf->Cell(0,9.4,utf8_decode(''),'B',1,'C',false);
	$pdf->SetXY(130,260);
	$pdf->Cell(0,9.4,utf8_decode('FIRMA DEL MÉDICO'),0,1,'C',false);

	$pdf->Ln(2);
	$pdf->Cell(35,5,utf8_decode('C.C.P TRABAJADOR'),0,1,'L',false);
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('DEPENDENCIA. PRESENTE'),0,1,'L',false);
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('UNIDADES MÉDICAS. PRESENTE'),0,1,'L',false);
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('SUBDELEGACIÓN MÉDICA. PRESENTE'),0,1,'L',false);
	

	$pdf->Ln(2);
	$pdf->Cell(35,5,utf8_decode('MÉDICA'),0,1,'L',false);
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('SUBDELEGADO DE PRESTACIONES. PRESENTE'),0,1,'L',false);
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('EXPEDIENTE CLÍNICO. MEDICINA FAMILIAR'),0,1,'L',false);
	
	$pdf->Ln(1);
	$pdf->Cell(35,5,utf8_decode('REVERSO'),0,1,'L',false);

	

	
	//$pdf->SetXY(175,183);
	//$pdf->Cell(8,9,utf8_decode(''),1,0,'C',false);
	

	
	
	/*
   	$pdf->SetXY(146,186);
   	$pdf->MultiCell(24,6,utf8_decode('TÓXICOS'),1,'C',false);
	$pdf->Cell(9,9,utf8_decode(''),1,0,'C',false);*/

$pdf->Output();






?>