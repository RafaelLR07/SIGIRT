<?php

include 'header_frt03.php';

//nombre rfc, diagnostico y observaciones

$pdf = new PDF();
    
	$pdf->AliasNbPages();
	$pdf->AddPage("P",array(216,356));
    $pdf->Ln(10);
	
	//rectangulo inicial
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(16,35,187,50,'DF');

	//titulares principales
	$pdf->SetXY(16,38);
	$pdf->SetFont('arial','',10);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(75,5,utf8_decode('SUBDELEGACION DE PRESTACIONES EN: '),0,0,'L',false);
	$pdf->Cell(103,5,utf8_decode(''),'B',0,'L',true);
	 
	$pdf->SetXY(16,45);
	$pdf->Cell(28,5,utf8_decode('TRABAJADOR: '),0,0,'L',false);
	$pdf->Cell(150,5,utf8_decode(''),'B',0,'L',true);

	//RFC seccion de celditas
	$pdf->SetXY(27,55);
	$pdf->SetFont('arial','',8);
	$pdf->Cell(4.5,4,utf8_decode('1'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('2'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('3'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('4'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('5'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('6'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('7'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('8'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('9'),1,0,'L',false);
	$pdf->Cell(4.5,4,utf8_decode('D'),1,0,'L',false);

	$pdf->SetXY(27,59);
	$pdf->SetFont('arial','',10);
	$pdf->Cell(45,5,utf8_decode('RFC'),1,0,'C',false);

	//telefono
	$pdf->SetXY(77,55);
	$pdf->SetFont('arial','',8);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);
	$pdf->Cell(5,4,utf8_decode('Z'),1,0,'L',false);

	$pdf->SetXY(77,59);
	$pdf->SetFont('arial','',10);
	$pdf->Cell(50,5,utf8_decode('TELEFONO'),1,0,'C',false);


	//fecha de solicitud
	$pdf->SetXY(132,55);
	$pdf->SetFont('arial','',9);
	$pdf->Cell(10.2,4,utf8_decode('DIA'),1,0,'C',false);
	$pdf->Cell(10.2,4,utf8_decode(''),1,0,'L',true);

	$pdf->Cell(10.2,4,utf8_decode('MES'),1,0,'C',false);
	$pdf->Cell(10.2,4,utf8_decode(''),1,0,'L',true);

	$pdf->Cell(10.2,4,utf8_decode('AÑO'),1,0,'C',false);
	$pdf->Cell(10.2,4,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(132,59);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(61.2,5,utf8_decode('FECHA DE SOLICITUD (RT01)'),1,0,'C',false);

	//nombre del familiar o representante
	$pdf->SetXY(27,68);
	$pdf->Cell(167,9,utf8_decode(''),1,0,'C',true);
	$pdf->SetXY(27,77);
	$pdf->Cell(167,5,utf8_decode('NOMBRE DE FAMILIAR O REPRESENTANTE DEL SOLICITANTE, EN SU CASO'),1,0,'C',false);


	//rectangulo de requisitos
	$pdf->SetLineWidth(0.50); 
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Rect(11,89,195,32,'DF');

	$pdf->SetXY(90,90);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(30,5,utf8_decode('REQUISITOS'),0,0,'C',true);
	$pdf->SetFont('Arial','U',10);
	$pdf->SetXY(13,96);
	$pdf->MultiCell(191,4.5,utf8_decode('(ART. 13, 14 Y 15 DEL REGLAMENTO PARA LA  DICTAMINACIÓN EN MATERIA DE RIESGOS DEL TRABAJO E INVALIDEZ).'),0,'C',false);

	$pdf->SetXY(13,106);
	$pdf->SetFont('Arial','',10);
	$pdf->MultiCell(191,4.5,utf8_decode('EL MÉDICO DE MEDICINA DEL TRABAJO DEBERÁ SOLICITAR LA DOCUMENACIÓN QUE SE CONSIDERE NECESARIA PARA EL CASO EN PARTICULAR'),0,'C',false);

	$pdf->SetXY(57,115);
	$pdf->Cell(100,5,utf8_decode('LOS DOCUMENTOS MARCADOS CON * SON OBLIGATORIOS.'),0,0,'C',true);
	



	//numero de seccion 1
	$pdf->SetXY(0,122);
	$pdf->SetFont('ARIAL','BI',7.5);	
	$pdf->Cell(15,5,utf8_decode('I.'),0,0,'R',true);

	$valorY=127;
	
	//Seccion de numero 1 romano
	$pdf->SetXY(12,127);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->SetLineWidth(0.20); 
	$pdf->SetFillColor(206, 231, 239);
	$pdf->Cell(8,5,utf8_decode('1*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('SOLICITUD DE CALIFICACIÓN DEL PROBABLE RIESGO DEL TRABAJO (RT-01)'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('2*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('ACTA ADMINISTRATIVA (CON 2 TESTIGOS QUE DEN FE DEL ACCIDENTE)'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('3*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('CREDENCIAL DE ELECTOR (IFE) ORIGINAL Y COPIA'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('4*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('CERTIFICACIÓN DE SUELDOS Y HORARIO DE LABORES'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('5*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('OFICIO O PLIEGO DE COMISIÓN'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('6*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('CONSTANCIA DE DESCRIPCIÓN DEL PUESTO'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('7*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('CONSTANCIA DE DESCRIPCIÓN DE ACTIVIDADES DE LA COMISIÓN'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode('8*'),'LTR',0,'C',false);
	$pdf->Cell(167,5,utf8_decode('CROQUIS Y TIEMPOS DE RECORRIDO HABITUAL'),'LTR',0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->Cell(8,5,utf8_decode(''),'LRB',0,'C',false);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(167,5,utf8_decode('(DOMICILIO TEMPORAL-CENTRO DE TRABAJO / CENTRO DE TRABAJO- DOMICILIO TEMPORAL)'),0,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),'LRB',0,'L',true);


	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(8,5,utf8_decode('9*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('TALÓN DE PAGO RECIENTE'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,$valorY=$valorY+5);
	$pdf->SetFont('ARIAL','B',9);	
	$pdf->MultiCell(191,5,utf8_decode('DOCUMENTACIÓN 1, 2 Y 4 DEBERÁ ESTAR FIRMADA POR LA AUTORIDAD ADMINISTRATIVA QUE TUVO CONOCIMIENTO DEL RIESGO Y SELLADA POR LA DEPENDENCIA O ENTIDAD DE ADSCRIPCIÓN DEL TRABAJADOR.'),1,'L',false);


	//numero de seccion 122
	$pdf->SetXY(0,190);
	$pdf->SetFont('ARIAL','BI',7.5);	
	$pdf->Cell(15,5,utf8_decode('II.'),0,0,'R',false);

	//primera fila
	
	$pdf->SetXY(12,195);
	$pdf->Cell(8,5,utf8_decode('9*'),'TLR',0,'C',false);
	$pdf->SetLineWidth(0.20); 
	$pdf->Cell(167,5,utf8_decode('CERTIFICADO MÉDICO INICIAL (RT-02) '),'TLR',0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),'TLR',0,'L',true);

	
	$pdf->SetXY(12,200);
	$pdf->Cell(8,5,utf8_decode(''),'LR',0,'C',false);
	$pdf->Cell(167,5,utf8_decode('										-FECHA Y HORA EN QUE SE RECIBIO AL PACIENTE'),'LR',0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),'LR',0,'L',true);

	$pdf->SetXY(12,205);
	$pdf->Cell(8,5,utf8_decode(''),'LBR',0,'C',false);
	$pdf->Cell(167,5,utf8_decode('										-LESIÓN Y DÍAS DE LICENCIAS MÉDICAS OTORGADAS '),'LBF',0,'L',false);
	$pdf->Cell(16,5,utf8_decode('O'),'LBR',0,'C',true);

	$pdf->SetXY(12,220);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->SetLineWidth(0.20); 
	$pdf->Cell(8,5,utf8_decode('9*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('COPIA DE LICENCIAS MÉDICAS'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	//punto dos
	$pdf->SetXY(12,225);
	$pdf->Cell(8,5,utf8_decode('10*'),'LRT',0,'C',false);
	$pdf->Cell(167,5,utf8_decode('NOTA MÉDICA INICIAL DE URGENCIAS (EN SU CASO)'),'LFT',0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),'LRT',0,'L',true);

	$pdf->SetXY(12,225);
	$pdf->Cell(8,5,utf8_decode(''),'LRB',0,'C',false);
	$pdf->Cell(167,5,utf8_decode('FECHA, HORA Y DESCRIPCIÓN DE LAS CONDICIONES EN QUE SE RECIBIÓ AL PACIENTE'),'LRB','L',false);
	$pdf->Cell(16,5,utf8_decode(''),'LRB',0,'L',true);

	
	
	//punto tres
	$pdf->SetXY(12,230);
	$pdf->SetFont('ARIAL','B',9);	
	$pdf->MultiCell(191,5,utf8_decode('LA DOCUMENTACIÓN 6, DEBERÁ CONTENER FIRMA AUTÓGRAFA DE LA AUTORIDAD MÉDICA QUE TUVO CONOCIMIENTO DEL RIESGO Y SELLO DE LA UNIDAD MÉDICA RESPECTIVA.'),1,'L',false);

	//punto 3 romano
	$pdf->SetXY(1,242);
	$pdf->SetFont('ARIAL','BI',7.5);	
	$pdf->Cell(15,5,utf8_decode('III.'),0,0,'R',false);

	$pdf->SetXY(12,245);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->SetLineWidth(0.20); 
	$pdf->Cell(8,5,utf8_decode('11*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('AVERIGUACIÓN PREVIA (EN SU CASO)'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,250);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->Cell(8,5,utf8_decode('12*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('REPORTE DE ASEGURADORA DE AUTOMÓVIL, EN SU CASO'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,255);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->Cell(8,5,utf8_decode('13*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('PARTE DE AMBULANCIA'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,260);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->Cell(8,5,utf8_decode('13*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('PARTE DE AMBULANCIA'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,265);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->Cell(8,5,utf8_decode('13*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('PARTE DE AMBULANCIA'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,270);
	$pdf->SetFont('ARIAL','B',9);	
	$pdf->MultiCell(191,5,utf8_decode('LA DOCUMENTACIÓN SEÑALADA EN ESTE APARTADO III, DEBERÁ CONTENER FIRMA AUTOGRAFA Y SELLO DE LA AUTORIDAD QUE TUVO CONOCIMIENTO DEL PRESUNTO RIESGO, EN SU CASO.'),1,'L',false);

	//punto 4 romano------------------------------------
	$pdf->SetXY(41,283);
	$pdf->SetFont('ARIAL','BI',9);	
	$pdf->Cell(40,5,utf8_decode('IV EN CASO DE MUERTE DEL TRABAJADOR'),0,0,'R',false);

	$pdf->SetXY(12,288);
	$pdf->SetFont('ARIAL','',10);	
	$pdf->Cell(8,5,utf8_decode('10*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('AVERIGUACIÓN PREVIA'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,293);
	$pdf->Cell(8,5,utf8_decode('11*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('COPIA CERTIFICADA DEL ACTA DE DEFUNCIÓN'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,298);
	$pdf->Cell(8,5,utf8_decode('12*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('COPIA DE LA NECROPSIA DE LEY'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,303);
	$pdf->Cell(8,5,utf8_decode('13*'),1,0,'C',false);
	$pdf->Cell(167,5,utf8_decode('ÉXAMEN QUIMICO TOXICOLÓGIA POST-MORTEM'),1,0,'L',false);
	$pdf->Cell(16,5,utf8_decode(''),1,0,'L',true);

	$pdf->SetXY(12,308);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->MultiCell(191,5,utf8_decode('ADEMÁS, SE DEBERÁ ENTREGAR, EN CASO DE SER NECESARIO, TODA LA DOCUMENTACIÓN SEÑALADA EN LOS APARTADOS I, II, Y III.'),1,'L',false);

	$pdf->SetXY(12,320);
	$pdf->SetFont('ARIAL','BI',9);
	$pdf->Cell(16,5,utf8_decode('ANVERSO'),0,0,'L',false);


	//******************PAGINA 2
	$pdf->AddPage("P",array(216,356));
	$pdf->SetFont('ARIAL','',10);	
    $pdf->Ln(10);
	
	//rectangulo inicial
	$pdf->SetFillColor(255, 255, 255);
	$pdf->Cell(16,5,utf8_decode('EL PRESENTE FORMATO ES RECIBIDO POR EL(LA):'),0,0,'L',true);
	$pdf->Ln(6);
	$pdf->Cell(8,5,utf8_decode('C.'),0,0,'L',true);
	$pdf->SetFillColor(206, 231, 239);
	$pdf->SetXY(15,40);
	$pdf->Cell(180,7,utf8_decode('EL PRESENTE FORMATO ES RECIBIDO POR EL(LA):'),'B',0,'L',true);
	$pdf->Cell(180,7,utf8_decode(','),0,0,'L',false);

	$pdf->SetXY(10,50);
	$pdf->MultiCell(191,7,utf8_decode('PARA QUE EN TÉRMINOS DEL ARTÍCULO 16 DEL REGLAMENTO PARA LA DICTAMINACIÓN EN MATERIA DE RIESGOS DEL TRABAJO E INVALIDEZ, PRESENTE LOS DOCUMENTOS SOLICITADOS EN UN PLAZO DE 10 DÍAS HÁBILES CONTADOS A PARTIR DE ESTA FECHA, QUEDANDO APERCIBIDO QUE LA OMISIÓN DE PRESENTACIÓN DE ALGÚN DOCUMENTO REQUERIDO POR EL MÉDICO DE MEDICINA DEL TRABAJO, DEBERÁ SUBSANARSE EN UN TÉRMINO NO MAYOR A 10 DÍAS HÁBILES, CONTADOS A PARTIR DEL DÍA SIGUIENTE A AQUÉL EN QUE CONCLUYA EL PRIMER PLAZO DE 10 DÍAS. DE LO CONTRARIO, EL ISSSTE LLEVARÁ A CABO EL ANÁLISIS INTEGRAL DEL CASO CON LOS DOCUMENTOS QUE TENGA A LA VISTA.'),0,'J',false);

	$pdf->SetXY(10,130);
	$pdf->SetFont('ARIAL','',8);	
	$pdf->Cell(80,6,utf8_decode('ANASTASIO BUSTAMANTE DE SOTO'),0,0,'L',true);
	$pdf->SetXY(10,138);
	$pdf->SetFont('ARIAL','',9);
	$pdf->Cell(80,7,utf8_decode('FIRMA DEL SOLICITANTE'),'T',0,'C',false);
	
	$pdf->SetXY(110,130);
	$pdf->SetFont('ARIAL','',8);
	$pdf->Cell(90,6,utf8_decode('XALAPA ENRIQUEZ, VER A 12 DE AGOSTO DEL 2004 '),0,0,'L',true);
	$pdf->SetXY(110,138);
	$pdf->SetFont('ARIAL','',9);	
	$pdf->Cell(90,7,utf8_decode('LUGAR Y FECHA DE ENTREGA DE'),'T',0,'C',false);
	$pdf->SetXY(110,142);
	$pdf->Cell(90,7,utf8_decode('ESTE FORMATO DE REQUISITOS'),0,0,'C',false);

	$pdf->Rect(10,153,195,83,'');
	$pdf->SetXY(45,170);
	$pdf->SetFont('ARIAL','',10);
	$pdf->Cell(120,6,utf8_decode('JUAN PETRONILO ANASTASO DE LA LUZ  JIMENEZ VELASQUEZ '),0,0,'C',true);
	$pdf->SetXY(60,178);
	$pdf->Cell(90,7,utf8_decode('NOMBRE Y FIRMA DEL SERVIDOR PÚBLICO QUE'),'T',0,'C',false);
	$pdf->SetXY(60,182);
	$pdf->Cell(90,7,utf8_decode('ENTREGA EL PRESENTE FORMATO'),0,0,'C',false);

	//sello de la delegacion

	$pdf->Rect(64,196,80,40,'');
	$pdf->SetXY(64,205);
	$pdf->MultiCell(80,7,utf8_decode('SELLO DE LA SUBDELEGACIÓN DE PRESTACIONES.'),0,'C',false);
	
	$pdf->SetXY(10,250);
	$pdf->SetFont('ARIAL','',9);
	$pdf->Cell(16,5,utf8_decode('C.C.P. EXPEDIENTE DEL TRABAJADOR'),0,0,'L',false);

	$pdf->SetXY(10,257);
	$pdf->SetFont('ARIAL','B',9);
	$pdf->Cell(16,5,utf8_decode('REVERSO'),0,0,'L',false);
	
    //titulo
    
$pdf->Output();






?>