<?php

include 'header_frt02.php';

//nombre rfc, diagnostico y observaciones

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
   	$pdf->SetX(52);
    $pdf->Cell(82,7,utf8_decode('HERNANDEZ COBO MARIA DEL CARMEN'),'B',0,'L',true);

	$pdf->SetX(134);
    $pdf->Cell(20,7,utf8_decode('RFC ó CURP'),0,0,'L',false);

    $pdf->SetX(154);
    $pdf->Cell(44,7,utf8_decode('ROOO135565HVZPYF01'),'B',0,'L',true);

    $pdf->SetXY(140,68);
	$pdf->SetFillColor(227, 232, 234);
	$pdf->MultiCell(64,8,utf8_decode('UNIDAD MEDICA QUE EXPIDE CERTIFICADO MÉDICO INICIAL'),1,'C',true);


	$pdf->Ln(0);
	$pdf->SetX(140);
	//$pdf->SetY(83);
	$pdf->MultiCell(64,8,utf8_decode('CLINICA HOSPITAL XALAPA 98897289'),1,'C',false);


    //segunda parte naturaleza del riesgo y clinica
    //tabla de naturaleza de riesgo
    $pdf->SetXY(70,56);
	$pdf->Ln(12);
	$pdf->SetFont('ARIAL','',9);
	$pdf->SetFillColor(227, 232, 234);
	$pdf->Cell(85,16,utf8_decode('NATURALEZA DE RIESGO'),1,0,'C',true);

	$pdf->Ln(16);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE CENTRO DE TRABAJO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode(''),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE EN COMISIÓN'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode(''),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ACCIDENTE EN TRAYECTO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode(''),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(68,7,utf8_decode('ENFERMEDAD DE TRABAJO'),1,0,'J',false);
	$pdf->Cell(17,7,utf8_decode(''),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->Cell(24,21,utf8_decode('DEFUNCIÓN'),1,0,'J',false);

	$pdf->SetFillColor(186, 190, 191);
	$pdf->Cell(44,7,utf8_decode('FECHA'),1,0,'C',true);
	//check de el apartado "Defuncion"
	$pdf->Cell(17,21,utf8_decode(''),1,0,'C',false);

	$pdf->ln(7);
	$pdf->SetX(34);
	$pdf->Cell(13,7,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('AÑO'),1,0,'C',false);
	
	$pdf->ln(7);
	$pdf->SetX(34);
	$pdf->Cell(13,7,utf8_decode('01'),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode('01'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('0000'),1,0,'C',false);

	//minitabla de unidad medica kue expide
	
	

	$pdf->Ln(15);
	$pdf->Cell(125,15,utf8_decode('FECHA EN QUE SE PRESENTÓ POR PRIMERA VEZ A LA ATENCIÓN MÉDICA'),1,0,'L',false);
	$pdf->Cell(13,7,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(15,7,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('AÑO'),1,0,'C',false);
	$pdf->Cell(16,7,utf8_decode('HORA'),1,0,'C',false);

	$pdf->Ln(7);
	$pdf->SetX(135);
	$pdf->Cell(13,8,utf8_decode('01'),1,0,'C',false);
	$pdf->Cell(15,8,utf8_decode('01'),1,0,'C',false);
	$pdf->Cell(16,8,utf8_decode('1887'),1,0,'C',false);
	$pdf->Cell(16,8,utf8_decode('17:30 pm'),1,0,'C',false);

	$pdf->Ln(10);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(40,14,utf8_decode('ANTECEDENTES'),0,0,'L',false);

	$pdf->Ln(14);
	$pdf->SetFont('ARIAL','',9);
	$pdf->MultiCell(28,5,utf8_decode('FECHA Y HORA EN LA QUE SE RECIBIÓ AL PACIENTE'),1,'L',false);

	$pdf->SetXY(38,172);
    $pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);
	$pdf->Cell(6,11,utf8_decode(''),1,0,'C',false);

	$pdf->Ln(11);
	$pdf->SetX(38);
	$pdf->Cell(12,9,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('AÑO'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('HORA'),1,0,'C',false);
	$pdf->Cell(12,9,utf8_decode('MIN'),1,0,'C',false);
   	
   	$pdf->SetXY(102,172); 
   	$pdf->MultiCell(103,5.5,utf8_decode('MARQUE CON UNA "X", LO QUE SE RELACIONA CON EL PADECIMIENTO ACTUAL'),1,'C',false);

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

	$pdf->MultiCell(194,4.5,utf8_decode("los medicos pueden registrar el fr02 el cual inicia el proceso de riesgo de trabajosu registro se enviara a pacientes pendienteslos de oficina del trabajo verificaran si la informacion del fr02 es correctasi es correcta daran de alta al usuario en el sistema para kue este continue conel llenado de los medicos pueden registrar el fr02 el cual inicia el proceso de riesgo de trabajosu registro se enviara a pacientes pendienteslos de oficina del trabajo verificaran si la informacion del fr02 es correctasi es correcta daran de alta al usuario en el sistema para kue este continue conel llenado de los otros formatos proporcionandole un usuario uy contraseñael usuario paciente entrara al sistema con su usuario el usuario paciente llenara los formatos en el orden establecidoen el apartado de perfil de usuario habra la barra de progreso kue al dar clic enviara al apartado de avance documentaly avance de llenado"),'','J',false);
	
	$pdf->Rect(10,268, 195, 60,'D');
		
	$pdf->SetXY(10,267);
	$pdf->SetFont('ARIAL','',9);
	$pdf->Cell(0,9,utf8_decode('EXPLORACIÓN FÍSICA (LESIONES ANATÓMICAS)'),0,0,'L',false);
	$pdf->SetXY(10,275);
	$pdf->MultiCell(194,4.5,utf8_decode("ashbdabsljd"),0,'J',false);

	$pdf->Ln(20);
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
	$pdf->MultiCell(194,4.5,utf8_decode("los de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseñaos de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseñaos de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseña"),0,'J',false);

	
	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,66, 195, 36,'D');
	$pdf->SetXY(10,64);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO NOSOLÓGICO'),0,0,'L',false);
	$pdf->SetXY(10,72);
	$pdf->MultiCell(194,4.5,utf8_decode("los de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseñalos de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseña"),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,102, 195, 36,'D');
	$pdf->SetXY(10,100);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO ETIOLÓGICO'),0,0,'L',false);
	$pdf->SetXY(10,108);
	$pdf->MultiCell(194,4.5,utf8_decode("los de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseñalos de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseña"),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,138, 195, 36,'D');
	$pdf->SetXY(10,136);
	$pdf->Cell(0,9,utf8_decode('DIAGNÓSTICO ANATOMO FUNCIONAL'),0,0,'L',false);
	$pdf->SetXY(10,144);
	$pdf->MultiCell(194,4.5,utf8_decode(""),0,'J',false);

	$pdf->SetFont('ARIAL','',9);
	$pdf->Rect(10,174, 195, 36,'D');
	$pdf->SetXY(10,172);
	$pdf->Cell(0,9,utf8_decode('PRONÓSTICO'),0,0,'L',false);
	$pdf->SetXY(10,179);
	$pdf->MultiCell(194,4.5,utf8_decode("ole un usuario uy contraseñalos de oficina del trabajo verificaran si la informacion del fr02 es correcta si es correcta daran de alta al usuario en el sistema para kue este continue con el llenado de los otros formatos proporcionandole un usuario uy contraseña"),0,'J',false);


	$pdf->SetXY(10,215);
	$pdf->Cell(80,12,utf8_decode('DÍAS DE LICENCIA MÉDICA OTORGADOS'),1,0,'L',false);
	$pdf->SetXY(100,215);
	$pdf->Cell(10,12,utf8_decode(''),1,0,'L',false);
	$pdf->SetXY(120,215);
	$pdf->Cell(10,12,utf8_decode('DE'),1,0,'L',false);
	$pdf->SetFillColor(186, 190, 191);
	$pdf->Cell(10,4,utf8_decode('DIA'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('MES'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('AÑO'),1,0,'L',true);
	$pdf->Cell(10,12,utf8_decode('A'),0,0,'C',false);

	$pdf->SetXY(130,219);
	$pdf->Cell(10,8,utf8_decode('01'),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode('01'),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode('0000'),1,0,'L',false);

	$pdf->SetXY(170,215);
	$pdf->Cell(10,4,utf8_decode('DIA'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('MES'),1,0,'L',true);
	$pdf->Cell(10,4,utf8_decode('AÑO'),1,0,'L',true);
	$pdf->SetXY(170,219);
	$pdf->Cell(10,8,utf8_decode('01'),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode('01'),1,0,'L',false);
	$pdf->Cell(10,8,utf8_decode('0000'),1,0,'L',false);

	$pdf->SetXY(10,234);
	$pdf->MultiCell(27,4.5,utf8_decode('NOMBRE DEL MÉDICO'),1,'L',false);
	$pdf->SetXY(37,234);
	$pdf->Cell(27,2,utf8_decode('JIMENEZ ORTIZ ANDREA PETRONILA DE LA CONCEPCION'),0,1,'L',false);
	$pdf->Rect(37,237.5, 170, 5.5,'D');
	$pdf->SetXY(37,237);
	$pdf->Cell(50,5.5,utf8_decode('APELLIDO PATERNO'),0,1,'C',false);
	$pdf->SetXY(97,237);
	$pdf->Cell(50,5.5,utf8_decode('APELLIDO PATERNO'),0,1,'C',false);
	$pdf->SetXY(157,237);
	$pdf->Cell(50,5.5,utf8_decode('APELLIDO PATERNO'),0,1,'C',false);

	$pdf->SetXY(10,250);
	$pdf->MultiCell(27,5,utf8_decode('CEDULA PROFESIONAL'),1,'L',false);
	$pdf->SetXY(37,250);
	$pdf->Cell(50,9.9,utf8_decode(''),1,1,'C',false);
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