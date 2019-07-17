<?php

    include 'template_medic.php';
    require_once 'fechas.php';
    //nombre rfc, diagnostico y observaciones

    $pdf = new PDF();


	$pdf->AliasNbPages();
	$pdf->AddPage("P",array(216,356));

    $pdf->Ln(1);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(200,8,utf8_decode('SOLICITUD DE CALIFICACIÓN'),0,0,'C',false);
    

    $pdf->setXY(10,34);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(100,4,utf8_decode('DELEGACIÓN O MUNICIPIO'),1,1,'C',false);


    $pdf->setXY(10,36);
    $pdf->SetFont('Arial','',7.2);
    $pdf->Cell(0,8,utf8_decode('SUBDELEGADO (A) DE PRESTACIONES DEL ISSSTE'),0,0,'',false);
    $pdf->Line(11,38,110,38);

    $pdf->setXY(10,40);
    $pdf->SetFont('Arial','',7.2);
    $pdf->Cell(0,8,utf8_decode('EN LA DELEGACIÓN:'),0,0,'',false);
    $pdf->Line(40,45,110,45);

    $pdf->Ln(4);
    $pdf->Cell(200,8,utf8_decode('CON APEGO A LO DISPUESTO EN LA LEY DEL ISSSTE, SOLICITO LA CALIFICACIÓN TÉCNICA DEL RIESGO DEL TRABAJO QUE DESCRIBO A CONTINUACIÓN:'),0,0,'J',false);

    $pdf->Ln(4);
    $pdf->SetFont('arial','B',7.2);
    $pdf->Cell(0,8,utf8_decode('1.1 DATOS DEL TRABAJADOR:'),0,0,'L',false);


    $pdf->Ln(10.5);
    $pdf->SetFont('arial','',7.2);
    $pdf->MultiCell(30,4,utf8_decode('NOMBRE'),0,'L',false);
    $pdf->Line(40,62,199.5,62);
    
    /*DATOS DEL CAMPO NOMBRE*/

    $pdf->text(55,65,utf8_decode('APELLIDO PATERNO'),0,1,'C',false);
    $pdf->text(115,65,utf8_decode('APELLIDO MATERNO'),0,1,'C',false);
    $pdf->text(170,65,utf8_decode('NOMBRE (S)'),0,1,'C',false);


    $pdf->setXY(40,58);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(58,4,utf8_decode('  '),1,1,'C',false);


    $pdf->setXY(100,58);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(55,4,utf8_decode('  '),1,1,'C',false);


    $pdf->setXY(157,58);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(43,4,utf8_decode('  '),1,1,'C',false);



    /* ---------------> FIN*/

    $pdf->Ln(4.5);
    $pdf->SetFont('arial','',7.2);
    $pdf->MultiCell(30,4,utf8_decode('DOMICILIO PARTICULAR'),0,'L',false);
    $pdf->Line(40,71,200,71);

    /*DATOS DEL CAMPO DOMICILIO*/

    $pdf->text(80,74,utf8_decode('CALLE'),0,1,'C',false);
    $pdf->text(135,74,utf8_decode('NO. EXTERIOR'),0,1,'C',false);
    $pdf->text(170,74,utf8_decode('NO. INTERIOR'),0,1,'C',false);


    $pdf->setXY(30,67);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(96,4,utf8_decode('DELEGACIÓN '),1,1,'C',false);

    $pdf->setXY(128,67);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(35,4,utf8_decode('DELEGACIÓN '),1,1,'C',false);


    $pdf->setXY(165,67);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(35,4,utf8_decode('DELEGACIÓN '),1,1,'C',false);


    /*-----------------------------------> FIN*/

    $pdf->Line(10,82,200,82);
    $pdf->text(40,85,utf8_decode('COLONIA'),0,1,'C',false);
    $pdf->text(95,85,utf8_decode('CIUDAD'),0,1,'C',false);
    $pdf->text(130,85,utf8_decode('CÓDIGO POSTAL'),0,1,'C',false);
    $pdf->text(170,85,utf8_decode('TELÉFONO'),0,1,'C',false);


    $pdf->setXY(10,78);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(70,4,utf8_decode('COLONIA '),1,1,'C',false);

    $pdf->setXY(82,78);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(45,4,utf8_decode('CIUDAD '),1,1,'C',false);

    $pdf->setXY(129,78);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(32,4,utf8_decode('CÓDIGO '),1,1,'C',false);


    $pdf->setXY(163,78);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(37,4,utf8_decode('CÓDIGO '),1,1,'C',false);




    /* ---------------> FIN*/


    $pdf->setXY(10,90);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(45,5,utf8_decode('DELEGACIÓN O MUNICIPIO'),0,1,'C',false);
    $pdf->Line(10,95,55,95);
    $pdf->text(65,98,utf8_decode('DELEGACIÓN O MUNICIPIO'),0,1,'C',false);


    $pdf->setXY(60,90);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(45,5,utf8_decode('ENTIDAD FEDERATIVA'),0,1,'C',false);
    $pdf->Line(60,95,105,95);
    $pdf->text(18,98,utf8_decode('ENTIDAD FEDERATIVA'),0,1,'C',false);


    $pdf->setXY(110,90);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(90,12,utf8_decode('DELEGACIÓN O MUNICIPIO'),1,1,'C',false);
    $pdf->setXY(110,98);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(93,3,utf8_decode('NOMBRE DEL FAMILIAR, REPRESENTANTE LEGAL O AUTORIZADO POR EL TRABAJADOR EN SU CASO.'),0,1,'J',false);

    /*CAMPO DE CURP*/

    $pdf->setXY(0,102);
    $pdf->MultiCell(20,4,utf8_decode('CURP'),0,0,'L',false);

    $pdf->setXY(26,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(30,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(34,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);    

    $pdf->setXY(38,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(42,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(46,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(50,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(54,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(58,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);    

    $pdf->setXY(62,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(66,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(70,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(74,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(78,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(82,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);    

    $pdf->setXY(86,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(90,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(94,102);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(4,4,utf8_decode(' '),1,1,'C',false);
    /*-----------------> fin */
    


    /*CAMPO DE EDAD*/

    $pdf->Rect(10,110, 160,4,'D');
    $pdf->setXY(10,110);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(15,4,utf8_decode('EDAD'),1,1,'C',false);

    $pdf->setXY(20,110);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(20,4,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(40,110);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(25,4,utf8_decode('SEXO'),1,1,'C',false);

    $pdf->setXY(55,110);
    $pdf->MultiCell(10,4,utf8_decode('H'),1,1,'L',false);

    $pdf->setXY(65,110);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(15,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(80,110);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(10,4,utf8_decode('M'),1,1,'L',false);

    $pdf->setXY(90,110);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(15,4,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(105,110);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,4,utf8_decode('NO. DE EMPLEADO'),1,1,'L',false);

    $pdf->setXY(140,110);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(30,4,utf8_decode(' '),1,1,'C',false);

    /*-----------------> fin */



    /*CAMPO DE PUESTO*/

    $pdf->Rect(10,116, 190,22,'D');

    $pdf->setXY(10,116);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(25,6,utf8_decode('PUESTO'),1,1,'L',false);

    $pdf->setXY(35,116);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(75,6,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(110,116);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(45,12,utf8_decode('DESCRIPCIÓN DE ACTIVIDADES'),1,1,'L',false);

    $pdf->setXY(155,116);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(45,12,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(10,122);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(50,6,utf8_decode('FECHA DE INGRESO'),1,1,'L',false);

    $pdf->setXY(60,122);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(50,6,utf8_decode(' '),1,1,'L',false);


    $pdf->setXY(10,128);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(50,4,utf8_decode('FECHA DE 1a COTIZACIÓN AL ISSSTE'),1,1,'L',false);

    $pdf->setXY(60,128);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(140,4,utf8_decode(' '),1,1,'L',false);


    $pdf->setXY(10,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,4,utf8_decode('HORARIO DE TRABAJO (15)'),1,1,'L',false);

    $pdf->setXY(30,132);
    $pdf->MultiCell(20,8,utf8_decode('MATUTINO'),1,1,'L',false);

    $pdf->setXY(50,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(5,8,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(55,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,8,utf8_decode('VESPERTINO'),1,1,'L',false);

    $pdf->setXY(75,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(5,8,utf8_decode(' '),1,1,'L',false);


    $pdf->setXY(80,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,8,utf8_decode('NOCTURNO'),1,1,'L',false);

    $pdf->setXY(100,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(5,8,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(105,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(12,8,utf8_decode('MIXTO'),1,1,'L',false);

    $pdf->setXY(115,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(5,8,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(120,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,4,utf8_decode('JORNADA ACUMULADA'),1,1,'L',false);

    $pdf->setXY(140,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(5,8,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(145,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(15,4,utf8_decode('HORA DE ENTRADA'),1,1,'L',false);

    $pdf->setXY(160,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(12.5,8,utf8_decode(' '),1,1,'L',false);

    $pdf->setXY(172.5,132);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(15,4,utf8_decode('HORA DE SALIDA'),1,1,'L',false);

    $pdf->setXY(187.5,132);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(12.5,8,utf8_decode(' '),1,1,'L',false);

    /*--------------------------------------> FIN */


    /*------------------------------ FECHA Y HORA DEL ACCIDENTE  */
    $pdf->Rect(10,144, 148,10,'D');

    $pdf->setXY(10,144);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(148,10,utf8_decode('FECHA Y HORA DEL ACCIDENTE O PROBABLE INICIO DE LA ENFERMEDAD'),1,1,'L',false);

    $pdf->setXY(110,144);
    $pdf->MultiCell(12,4,utf8_decode('DÍA'),1,1,'C',false);
    $pdf->setXY(110,148);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(122,144);
    $pdf->MultiCell(12,4,utf8_decode('MES'),1,1,'C',false);
    $pdf->setXY(122,148);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(134,144);
    $pdf->MultiCell(12,4,utf8_decode('AÑO'),1,1,'C',false);
    $pdf->setXY(134,148);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(146,144);
    $pdf->MultiCell(12,4,utf8_decode('HORA'),1,1,'C',false);
    $pdf->setXY(146,148);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);
 
    /*---------------------------------> FIN */


    $pdf->text(10,160,utf8_decode('CIRCUNSTANCIAS EN QUE OCURRIÓ EL ACCIDENTE'),0,1,'C',false);
    $pdf->Rect(10,162, 190,8,'D');
   
    $pdf->setXY(10,162);
    $pdf->MultiCell(23,8,utf8_decode('DEPENDENCIA'),1,1,'C',false);
    $pdf->setXY(30,162);
    $pdf->MultiCell(15,8,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(45,162);
    $pdf->MultiCell(15,8,utf8_decode('COMISIÓN'),1,1,'C',false);
    $pdf->setXY(60,162);
    $pdf->MultiCell(15,8,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(75,162);
    $pdf->MultiCell(30,4,utf8_decode('EN TRAYECTO A SU TRABAJO'),1,1,'C',false);
    $pdf->setXY(105,162);
    $pdf->MultiCell(15,8,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(120,162);
    $pdf->MultiCell(30,4,utf8_decode('EN TRAYECTO A SU DOMICILIO'),1,1,'C',false);
    $pdf->setXY(150,162);
    $pdf->MultiCell(15,8,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(165,162);
    $pdf->MultiCell(20,4,utf8_decode('TIEMPO EXTRA'),1,1,'C',false);
    $pdf->setXY(185,162);
    $pdf->MultiCell(15,8,utf8_decode(' '),1,1,'C',false);


    /*----------------------------- */
    $pdf->Rect(10,172, 190,6,'D');

    $pdf->setXY(10,172);
    $pdf->MultiCell(190,4,utf8_decode('DESCRIPCIÓN PRECISA DE LA FORMA Y EL SITIO O AREA DE TRABAJO EN LOS QUE OCURRIO EL ACCIDENTE., EN CASO DE ENFERMEDAD DESCRIBIR LOS AGENTES CONTAMINANTES Y EL TIEMPO DE EXPOSICIÓN A LOS MISMOS.'),1,1,'J',false);
    $pdf->setXY(10,176);
    $pdf->MultiCell(190,14,utf8_decode(' '),1,1,'C',false);

    /*----------------------------> FIN */




    /*----------------------------- */
    $pdf->SetFont('arial','B',8);
    $pdf->text(10,195,utf8_decode('ATENTAMENTE:'),0,1,'C',false);
    
    $pdf->SetFont('arial','',8);
    $pdf->text(10,200,utf8_decode('NOMBRE Y FIRMA DEL TRABAJADOR:'),0,1,'C',false);
    $pdf->Line(62,200,135,200);

    $pdf->SetFont('arial','B',8);
    $pdf->text(10,205,utf8_decode('1.2 DATOS DE LA DEPENDENCIA O ENTIDAD::'),0,1,'C',false);
    
    $pdf->SetFont('arial','',8);
    $pdf->text(10,210,utf8_decode('NOMBRE DE LA DEPENDENCIA'),0,1,'C',false);
    $pdf->Line(62,210,135,210);

    $pdf->text(140,210,utf8_decode('NÚMERO DE RAMO'),0,1,'C',false);
    $pdf->Line(27,218,130,218);


    $pdf->setXY(170,206);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(30,6,utf8_decode(' '),1,1,'L',false);

    /*--------------------------> fin*/

    $pdf->text(10,218,utf8_decode('DOMICILIO'),0,1,'C',false);

    $pdf->text(60,221,utf8_decode('CALLE'),0,1,'C',false);
    $pdf->text(95,221,utf8_decode('NÚMERO'),0,1,'C',false);

    $pdf->setXY(133,215);
    $pdf->MultiCell(25,3,utf8_decode('CENTRO DE ADSCRIPCIÓN'),0,0,'L',false);

    $pdf->setXY(160,215);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(40,6,utf8_decode('CENTRO DE ADSCRIPCIÓN'),1,1,'L',false);



    /*--------------------------------> FIN */
    $pdf->Line(10,230,200,230);

    $pdf->text(40,233,utf8_decode('COLONIA'),0,1,'C',false);
    $pdf->text(70,233,utf8_decode('DELEGACIÓN O MUNICIPIO'),0,1,'C',false);
    $pdf->text(130,233,utf8_decode('CÓDIGO POSTAL'),0,1,'C',false);
    $pdf->text(170,233,utf8_decode('TELÉFONO'),0,1,'C',false);

    /*----------------------------> Fin */

    $pdf->text(10,239,utf8_decode('JEFE INMEDIATO QUE TOMA CONOCIMIENTO INICIAL DEL RIESGO DEL TRABAJO'),0,1,'C',false);

    $pdf->setXY(125,236);
    $pdf->MultiCell(75,5,utf8_decode(''),1,1,'J',false);

    $pdf->text(10,247,utf8_decode('PUESTO'),0,1,'C',false);
    $pdf->setXY(25,243);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(80,5,utf8_decode(' '),1,1,'L',false);
    
    $pdf->setXY(90,243);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(35,5,utf8_decode('NO. EMPLEADO'),1,1,'L',false);
    $pdf->setXY(125,243);
    $pdf->SetFillColor(16, 201, 248);
    $pdf->MultiCell(75,5,utf8_decode(' '),1,1,'L',false);
    


    $pdf->setXY(10,251);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,9 ,utf8_decode('FECHA Y HORA DE COMUNICACIÓN DEL MISMO'),1,1,'L',false);
 
    $pdf->setXY(85,256);
    $pdf->MultiCell(15,4,utf8_decode(' DIA'),1,1,'C',false);
    
    $pdf->setXY(100,256);
    $pdf->MultiCell(15,4,utf8_decode(' MES'),1,1,'C',false);
    
    $pdf->setXY(115,256);
    $pdf->MultiCell(15,4,utf8_decode(' AÑO'),1,1,'C',false);
     
    $pdf->setXY(130,256);
    $pdf->MultiCell(15,4,utf8_decode(' HORA'),1,1,'C',false);
     
    $pdf->setXY(145,256);
    $pdf->MultiCell(15,4,utf8_decode(' MIN'),1,1,'C',false);
       
      
    /*----------------------------------------------------*/
    $pdf->setXY(85,251);
    $pdf->MultiCell(15,5,utf8_decode(' '),1,1,'C',false);
    
    $pdf->setXY(100,251);
    $pdf->MultiCell(15,5,utf8_decode(' '),1,1,'C',false);
    
    $pdf->setXY(115,251);
    $pdf->MultiCell(15,5,utf8_decode(' '),1,1,'C',false);
     
    $pdf->setXY(130,251);
    $pdf->MultiCell(15,5,utf8_decode(' '),1,1,'C',false);
     
    $pdf->setXY(145,251);
    $pdf->MultiCell(15,5,utf8_decode(' '),1,1,'C',false);

    /*----------------------------------------------------*/


    $pdf->text(10,266,utf8_decode('NOMBRE Y FIRMA DEL REPRESENTANTE DE LA DEPENDENCIA'),0,1,'C',false);
    $pdf->setXY(10,268);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(145,4 ,utf8_decode(''),1,1,'L',false);


    $pdf->SetFont('Arial','',5.5);
    $pdf->text(10,288,utf8_decode('NOTA: EL ANVERSO DEBE SER REQUISITADO POR LA DEPENDENCIA EN LA CUAL LABORA EL TRABAJADOR Y EL REVERSO ES PARA USO EXCLUSIVO DE LAS AREAS DE MEDICINA DE TRABAJO'),0,0,'J',false);
    $pdf->text(10,290,utf8_decode(' Y SE CONSIGNARAN LAS FIRMAS DE LAS AUTORIDADES DE LA SUBDELEGACIÓN DE PRESTACIONES.'),0,0,'J',false);

    /*-----------------------------------------> FIN   */

    /*-----------------------------------------> HOJA 2*/
    $pdf->AddPage("P",array(216,356));
    $pdf->SetFont('Arial','',7);
    $pdf->text(110,28,utf8_decode('PARA USO DEL MEDICO DE MEDICINA DEL TRABAJO'),0,1,'C',false);

    $pdf->SetFont('Arial','B',10);
    $pdf->text(12,28,utf8_decode('DICTAMEN DE CALIFICACIÓN'),0,1,'C',false);


    /*------------------------> COLUMNA NATURALEZA RIESGO */
    $pdf->Rect(10,32, 155,38,'D');
    $pdf->setXY(10,32);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(90,8 ,utf8_decode('NATURALEZA DEL RIESGO'),1,1,'C',false);

    $pdf->setXY(10,40);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,6 ,utf8_decode('ACCIDENTE CENTRO DE TRABAJO'),1,1,'C',false);

    $pdf->setXY(10,46);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,6 ,utf8_decode('ACCIDENTE EN COMISION'),1,1,'C',false);

    $pdf->setXY(10,52);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,6 ,utf8_decode('ACCIDENTE EN TRAYECTO'),1,1,'C',false);

    $pdf->setXY(10,58);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,6 ,utf8_decode('ENFERMEDAD DE TRABAJO'),1,1,'C',false);

    $pdf->setXY(10,64);
    $pdf->SetFont('Arial','',10);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,6 ,utf8_decode('DEFUNCION'),1,1,'C',false);

    /*---------------------------------------------> PALOMITAS*/

    $pdf->setXY(85,40);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(85,46);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(85,52);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(85,58);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(85,64);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,6 ,utf8_decode(' '),1,1,'C',false);

    /*---------------------------------------> FECHA*/

    $pdf->setXY(100,32);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(65,4 ,utf8_decode('FECHA'),1,1,'C',false);


    $pdf->setXY(100,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(15,4 ,utf8_decode('DIA'),1,1,'C',false);

    $pdf->setXY(115,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(15,4 ,utf8_decode('MES'),1,1,'C',false);

    $pdf->setXY(130,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(15,4 ,utf8_decode('AÑO'),1,1,'C',false);

    $pdf->setXY(145,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(20,4 ,utf8_decode('HORA'),1,1,'C',false);

    $pdf->setXY(100,40);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(115,40);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(130,40);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(145,40);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(100,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(115,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(130,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(145,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(100,52);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(115,52);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(130,52);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(145,52);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(100,58);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(115,58);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(130,58);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(145,58);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);


    $pdf->setXY(100,64);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(115,64);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(130,64);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(145,64);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(20,6 ,utf8_decode(' '),1,1,'C',false);
    /*---------------------------------------------> FIN*/

    /*------------------------------ FECHA Y HORA DEL ACCIDENTE  */
    $pdf->Rect(10,74, 185,10,'D');
    $pdf->setXY(10,74);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(130,10,utf8_decode('FECHA EN QUE SE PRESENTÓ POR PRIMERA VEZ A LA ATENCIÓN MÉDICA'),1,1,'L',false);

    $pdf->setXY(135,74);
    $pdf->MultiCell(15,4,utf8_decode('DÍA'),1,1,'C',false);
    $pdf->setXY(135,78);
    $pdf->MultiCell(15,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(150,74);
    $pdf->MultiCell(15,4,utf8_decode('MES'),1,1,'C',false);
    $pdf->setXY(150,78);
    $pdf->MultiCell(15,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(165,74);
    $pdf->MultiCell(15,4,utf8_decode('AÑO'),1,1,'C',false);
    $pdf->setXY(165,78);
    $pdf->MultiCell(15,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(180,74);
    $pdf->MultiCell(15,4,utf8_decode('HORA'),1,1,'C',false);
    $pdf->setXY(180,78);
    $pdf->MultiCell(15,6,utf8_decode(' '),1,1,'C',false);
 
    /*---------------------------------> FIN */
    $pdf->SetFont('arial','B',10);
    $pdf->text(10,90,utf8_decode('ANTECEDENTES'),0,1,'C',false);
   
    $pdf->SetFont('arial','',9);
    $pdf->setXY(10,92);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(190,4,utf8_decode('MARQUE CON UNA "X" LO QUE SE RELACIONA CON EL PADECIMIENTO ACTUAL'),1,1,'C',false);
   
    $pdf->setXY(10,96);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(60,12,utf8_decode('ESTADO DE EMBRIAGUEZ'),1,1,'C',false);
    
    $pdf->setXY(10,108);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(60,4,utf8_decode('INTENTO DE SUICIDIO'),1,1,'C',false);
    
    $pdf->setXY(10,112);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(60,4,utf8_decode('CAUSA EXTERNA'),1,1,'C',false);
    
    $pdf->setXY(10,116);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(65,6,utf8_decode('NATURALEZA DE LA LESIÓN'),1,1,'C',false);
 
    $pdf->setXY(75,96);
    $pdf->MultiCell(70,4,utf8_decode('USO DE NARCOTICO O DROGAS (SALVO PRESCRIPCIÓN MÉDICA CON CONOCIMIENTO DEL JEFE)'),1,1,'C',false);

    $pdf->setXY(149,98);
    $pdf->Rect(150,96, 45,12,'D');    
    $pdf->MultiCell(45,4,utf8_decode('SE OCASIONÓ UNA LESIÓN INTENCIONALMENTE'),0,0,'C',false);

    $pdf->setXY(75,108);
    $pdf->MultiCell(70,4,utf8_decode('RIÑA'),1,1,'C',false);

    $pdf->setXY(150,108);
    $pdf->MultiCell(45,4,utf8_decode('AL COMETER UN DELITO'),1,1,'C',false);


    /*------------------------------------- espacio x 1 */
 
    $pdf->setXY(70,96);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,12,utf8_decode('X'),1,1,'C',false);

    $pdf->setXY(145,96);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,12,utf8_decode('X'),1,1,'C',false);

    $pdf->setXY(195,96);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,12,utf8_decode('X'),1,1,'C',false);



    /*----------------------------->   */

    $pdf->setXY(70,108);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,4,utf8_decode('X'),1,1,'C',false);

    $pdf->setXY(145,108);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,4,utf8_decode('X'),1,1,'C',false);

    $pdf->setXY(195,108);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,4,utf8_decode('X'),1,1,'C',false);

    /*------------------------> FIN */

    $pdf->setXY(70,112);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,4,utf8_decode('X'),1,1,'C',false);

    $pdf->setXY(75,112);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(75,4,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(150,112);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(50,4,utf8_decode(' '),1,1,'C',false);

    /*-----------------------------------------------------*/

    $pdf->setXY(75,116);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(75,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(150,116);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(50,6,utf8_decode(' '),1,1,'C',false);

    /*-----------------------------------------------------*/

    /*---------------------------------------> DIAGNOSTICO */
    $pdf->Rect(10,125, 190,25,'D');    
    $pdf->SetFont('arial','B',10);
    $pdf->text(12,129,utf8_decode('DIAGNOSTICO'),0,1,'C',false);

    $pdf->setXY(10,130);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(190,20,utf8_decode(' '),1,1,'C',false);


    /*-------------------------------------------------------------*/
    $pdf->Rect(10,155, 190,26,'D');    
    $pdf->setXY(10,155);
    $pdf->SetFont('arial','',7);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(190,4,utf8_decode('CONFORME A LOS ELEMENTOS APORTADOS Y ANALISIS DEL MECANISMO REALIZADO ENTRE EL RIESGO OCURRIDO Y EL TRABAJO DESEMPEÑADO SE DETALLAN COMO CAUSAS QUE FUNDAN Y MOTIVAN LA CALIFICACIÓN DE PROCEDENCIA O IMPROCEDENCIA DE PROFESIONALIDAD, LAS SIGUIENTES:'),1,1,'J',false);

    $pdf->setXY(10,163);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(190,18,utf8_decode(' '),1,1,'C',false);

    /*--------------------------------------------------------- FIN*/

    $pdf->SetFont('arial','',9);
    $pdf->text(10,185,utf8_decode('POR CONSIGUIENTE, EL RIESGO DEL TRABAJO SE CALIFICA COMO'),0,1,'C',false);


    $pdf->SetFont('arial','',9);
    $pdf->setXY(118,181);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,6,utf8_decode('SI DE TRABAJO'),1,1,'C',false);

    $pdf->setXY(146,181);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(118,187);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,3,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(146,187);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,3,utf8_decode(' '),1,1,'C',false);


    $pdf->SetFont('arial','',9);
    $pdf->setXY(158,181);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,6,utf8_decode(' NO DE TRABAJO '),1,1,'C',false);

    $pdf->setXY(188,181);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(158,187);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,3,utf8_decode(' '),1,1,'C',false);

    $pdf->setXY(188,187);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,3,utf8_decode(' '),1,1,'C',false);

    /*--------------------------------------------------*/

    $pdf->SetFont('arial','',6);
    $pdf->setXY(10,190);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(190,3,utf8_decode('LO ANTERIOR CON FUNDAMENTO EN LOS ARTICULOS 110 DE LA LEY FEDERAL DE LOS TRABAJADORES AL SERVICIO DEL ESTADO; 56, 57, 58, 59, 60, 61 y 62 DE LA LEY DEL ISSSTE; 15 FRACCION I Y VI DEL REGLAMENTO DE LAS DELEGACIONES DEL ISSSTE; 63,131,126 FRACCION II, DEL REGLAMENTO DE SERVICIOS MÉDICOS DEL ISSSTE; 5, 6 Y 11 DEL REGLAMENTO PARA LA DICTAMINACIÓN EN MATERIA DE RIESGOS DEL TRABAJO E INVALIDEZ; 8 DE LA LEY FEDERAL DE RESPONSABILIDADES ADMINISTRATIVAS DE LOS SERVIDORES PÚBLICOS. EN CASO DE NEGATIVA POR CUALQUIER CAUSA, EL TRABAJADOR TIENE 30 DIAS NATURALES PARA TRAMITAR SU DESACUERDO DE CONFORMIDAD CON EL ARTÍCULO 58 DE LA LEY DEL ISSSTE; 78 Y DEMAS RELATIVOS DEL REGLAMENTO PARA LA DICTAMINACIÓN EN MATERIA DE RIESGOS DEL TRABAJO E INVALIDEZ.'),1,1,'J',false);

    $pdf->Rect(10,207, 190,6,'D');  
    $pdf->SetFont('arial','B',7);
    $pdf->setXY(10,208);
    $pdf->MultiCell(60,3,utf8_decode('LUGAR Y FECHA EN QUE SE ELABORÓ:'),0,1,'L',false);


    $pdf->setXY(70,207);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(130,6,utf8_decode(' '),1,1,'C',false);

    /*----------------------------------------------------------------------------------*/

    $pdf->Rect(10,216, 190,20,'D');  
    $pdf->SetFont('arial','B',8);
    $pdf->setXY(10,228);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(95,4,utf8_decode('NOMBRE, CLAVE Y FIRMA DEL MÉDICO RESPONSABLE DE MEDICINA DEL TRABAJO QUE CALIFICA.'),1,1,'C',false);
    
   $pdf->SetFont('arial','',8);
    $pdf->setXY(10,216);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(95,12,utf8_decode(' '),1,1,'C',false);


    $pdf->SetFont('arial','',8);
    $pdf->setXY(105,228);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(95,8,utf8_decode('Vo. Bo. DEL DELEGADO EN CASO DE IMPROCEDENCIA'),1,1,'C',false);

    $pdf->SetFont('arial','',8);
    $pdf->setXY(105,216);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(95,12,utf8_decode(' '),1,1,'C',false);


    $pdf->Rect(10,239, 190,20,'D');  
    
    $pdf->setXY(10,252);
    $pdf->SetFont('arial','',8);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(95,4,utf8_decode('JEFE DEL DEPARTAMENTO DE PENSIONES Y SEGURIDAD E HIGIENE EN EL TRABAJO'),1,1,'C',false);

    $pdf->setXY(105,252);
    $pdf->SetFont('arial','',8);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(95,8,utf8_decode('FIRMA DEL SUBDELEGADO DE PRESTACIONES ECONÓMICAS'),1,1,'C',false);



    $pdf->SetFont('arial','',7);
    $pdf->text(10,264,utf8_decode('C.c.p.           TRABAJADOR'),0,1,'C',false);
    $pdf->text(24,266.5,utf8_decode('DEPENDENCIA. PRESENTE'),0,1,'C',false);
    $pdf->text(24,269.5,utf8_decode('UNIDADES MÉDICAS. PRESENTE'),0,1,'C',false);
    $pdf->text(24,272.5,utf8_decode('SUBDELEGACIÓN MÉDICA. PRESENTE'),0,1,'C',false);
    $pdf->text(24,275.5,utf8_decode('SUBDELEGADO DE PRESTACIONES. PRESENTE'),0,1,'C',false);





    $pdf->SetFont('arial','B',8);
    $pdf->text(10,286,utf8_decode('NOTAS IMPORTANTE: EN CASO DE NEGATIVA POR CUALQUIER CAUSA, ESTE FORMATO DEBERÁ CONTENER LA FIRMA DEL DELEGADO.'),0,1,'C',false);

    $pdf->SetFont('arial','',7);
    $pdf->text(40,290,utf8_decode('"ESTE DOCUMENTO CARECE DE VALIDEZ SI PRESENTA TACHADURAS O ENMENDADURAS"'),0,1,'C',false);





    $pdf->Output();






?>