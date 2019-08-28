<?php

    include 'template_medic.php';
    require_once 'fechas.php';
    //nombre rfc, diagnostico y observaciones


    include_once "../../../controllers/f01_controller.php";
    include_once "../../../models/f01_model.php";
    include_once "../../../class/f02_methods.php";



    $token = $_GET['token'];
    $f01_info = new f01_controller();
    $dates_f01 = $f01_info->getF01_info($token);
    $methods = new f02_methods();

    $pdf = new PDF("P",'mm',array(216,356));


    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->Ln(3);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(200,8,utf8_decode('SOLICITUD DE CALIFICACIÓN'),0,0,'C',false);
    
    $pdf->SetFont('Arial','B',10);
    $pdf->setXY(170,30);
    $pdf->SetFillColor(206, 231, 239);

    $fech = $methods->divDate($dates_f01['fecha_reali']);
    $pdf->Cell(36,5,utf8_decode('Fecha'),1,0,'C',true);
    $pdf->setXY(170,35);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(12,5,utf8_decode('Dia'),1,0,'C',false);
    $pdf->setXY(182,35);
    $pdf->Cell(12,5,utf8_decode('Mes'),1,0,'C',false);
    $pdf->setXY(194,35);
    $pdf->Cell(12,5,utf8_decode('Año'),1,0,'C',false);
    
    $pdf->SetFillColor(188, 212, 236);
    $pdf->setXY(170,40);
    $pdf->Cell(12,5,utf8_decode($fech['dia']),1,0,'C',true);
    $pdf->setXY(182,40);
    $pdf->Cell(12,5,utf8_decode($fech['mes']),1,0,'C',true);
    $pdf->setXY(194,40);
    $pdf->Cell(12,5,utf8_decode($fech['anio']),1,0,'C',true);

  



    $pdf->SetFont('Arial','B',12);
    $pdf->setXY(10,39);
    $pdf->SetFont('arial','',7.2);
    $pdf->SetFillColor(206, 231, 239);
    $name_sub = $dates_f01['ape_pat_subdel'].' '.$dates_f01['ape_mat_subdel'].' '.$dates_f01['nom_subdelg'];

    $pdf->MultiCell(100,4,utf8_decode($name_sub),0,1,'C',false);


    $pdf->setXY(10,41);
    $pdf->SetFont('Arial','',7.2);
    $pdf->Cell(0,8,utf8_decode('SUBDELEGADO (A) DE PRESTACIONES DEL ISSSTE'),0,0,'',false);
    $pdf->Line(11,43,110,43);

    $pdf->setXY(10,45);
    $pdf->SetFont('Arial','',7.2);
    $pdf->Cell(0,8,utf8_decode('EN LA DELEGACIÓN:'),0,0,'',false);
    $pdf->Line(40,50,110,50);
    $pdf->setXY(40,44.5);
    $pdf->Cell(0,8,utf8_decode($dates_f01['delegacion']),0,0,'',false);

    $pdf->Ln(4);
    $pdf->Cell(200,8,utf8_decode('CON APEGO A LO DISPUESTO EN LA LEY DEL ISSSTE, SOLICITO LA CALIFICACIÓN TÉCNICA DEL RIESGO DEL TRABAJO QUE DESCRIBO A CONTINUACIÓN:'),0,0,'J',false);

    $pdf->Ln(4);
    $pdf->SetFont('arial','B',7.2);
    $pdf->Cell(0,8,utf8_decode('1.1 DATOS DEL TRABAJADOR:'),0,0,'L',false);


    $pdf->Ln(10.5);
    $pdf->SetFont('arial','',7.2);
    $pdf->MultiCell(30,4,utf8_decode('NOMBRE'),0,'L',false);
    $pdf->Line(40,67.7,199.5,67.7);
    
    /*DATOS DEL CAMPO NOMBRE*/
   
    $pdf->text(55,70,utf8_decode('APELLIDO PATERNO'),0,1,'C',true);
    $pdf->text(115,70,utf8_decode('APELLIDO MATERNO'),0,1,'C',true);
    $pdf->text(170,70,utf8_decode('NOMBRE (S)'),0,1,'C',false);


    $pdf->setXY(40,63);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(58,4,utf8_decode($dates_f01['ape_pater']),0,1,'C',true);


    $pdf->setXY(100,63);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(55,4,utf8_decode($dates_f01['ape_mater']),0,1,'C',true);


    $pdf->setXY(157,63);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(43,4,utf8_decode($dates_f01['nombre']),0,1,'C',true);



    /* ---------------> FIN*/

    $pdf->Ln(4.5);
    $pdf->SetFont('arial','',7.2);
    $pdf->MultiCell(30,4,utf8_decode('DOMICILIO PARTICULAR'),0,'L',false);
    $pdf->Line(31,76.5,200,76.5);

    /*DATOS DEL CAMPO DOMICILIO*/

    $pdf->text(80,79,utf8_decode('CALLE'),0,1,'C',false);
    $pdf->text(135,79,utf8_decode('NO. EXTERIOR'),0,1,'C',false);
    $pdf->text(170,79,utf8_decode('NO. INTERIOR'),0,1,'C',false);


    $pdf->setXY(30,72);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(96,4,utf8_decode($dates_f01['calle']),0,1,'C',true);

    $pdf->setXY(128,72);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(35,4,utf8_decode($dates_f01['num_ext']),0,1,'C',true);


    $pdf->setXY(165,72);
    $pdf->SetFont('arial','',7.2);
    
    $pdf->Cell(35,4,utf8_decode($dates_f01['num_int']),0,1,'C',true);


    /*-----------------------------------> FIN*/

    $pdf->Line(10,88,200,88);
    $pdf->text(40,91,utf8_decode('COLONIA'),0,1,'C',false);
    $pdf->text(95,91,utf8_decode('CIUDAD'),0,1,'C',false);
    $pdf->text(130,91,utf8_decode('CÓDIGO POSTAL'),0,1,'C',false);
    $pdf->text(170,91,utf8_decode('TELÉFONO'),0,1,'C',false);


    $pdf->setXY(10,83);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(70,4,utf8_decode($dates_f01['colonia']),0,1,'C',true);

    $pdf->setXY(82,83);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(45,4,utf8_decode($dates_f01['localidad']),0,1,'C',true);

    $pdf->setXY(129,83);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(32,4,utf8_decode($dates_f01['cp']),0,1,'C',true);


    $pdf->setXY(163,83);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(37,4,utf8_decode($dates_f01['tel_particular']),0,1,'C',true);




    /* ---------------> FIN*/


    $pdf->setXY(10,95);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(45,5,utf8_decode($dates_f01['municipio']),1,1,'C',true);
    $pdf->Line(10,100,55,100);
    $pdf->text(65,103,utf8_decode('ENTIDAD FEDERATIVA'),0,1,'C',false);


    $pdf->setXY(60,95);
    $pdf->SetFont('arial','',7.2);
    $pdf->Cell(45,5,utf8_decode($dates_f01['estado']),1,1,'C',true);
    $pdf->Line(60,100,105,100);
    $pdf->text(18,103,utf8_decode('DELEGACIÓN O MUNICIPIO'),0,1,'C',false);


    $pdf->setXY(110,95);
    $pdf->SetFont('arial','',7.2);
    $nombre_fam = $dates_f01['ape_pat_fam'].' '.$dates_f01['ape_mat_fam'].' '.$dates_f01['nom_fam']; 
    $pdf->MultiCell(90,5,utf8_decode($nombre_fam ),1,1,'C',false);
    $pdf->setXY(110,106);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(93,3,utf8_decode('NOMBRE DEL FAMILIAR, REPRESENTANTE LEGAL O AUTORIZADO POR EL TRABAJADOR EN SU CASO.'),0,1,'J',false);

    /*CAMPO DE CURP*/

    $pdf->setXY(0,107);
    $pdf->MultiCell(20,4,utf8_decode('CURP'),0,0,'L',false);
    $curp = str_split($dates_f01['curp']);
    $pdf->setXY(26,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[0]),1,1,'C',true);

    $pdf->setXY(30,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[1]),1,1,'C',true);

    $pdf->setXY(34,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[2]),1,1,'C',true);    

    $pdf->setXY(38,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[3]),1,1,'C',true);

    $pdf->setXY(42,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[4]),1,1,'C',true);

    $pdf->setXY(46,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[5]),1,1,'C',true);

    $pdf->setXY(50,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[6]),1,1,'C',true);

    $pdf->setXY(54,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[7]),1,1,'C',true);

    $pdf->setXY(58,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[8]),1,1,'C',true);    

    $pdf->setXY(62,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[9]),1,1,'C',true);

    $pdf->setXY(66,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[10]),1,1,'C',true);

    $pdf->setXY(70,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[11]),1,1,'C',true);

    $pdf->setXY(74,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[12]),1,1,'C',true);

    $pdf->setXY(78,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[13]),1,1,'C',true);

    $pdf->setXY(82,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[14]),1,1,'C',true);    

    $pdf->setXY(86,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[15]),1,1,'C',true);

    $pdf->setXY(90,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[16]),1,1,'C',true);

    $pdf->setXY(94,107);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(4,4,utf8_decode($curp[17]),1,1,'C',true);
    /*-----------------> fin */
    


    /*CAMPO DE EDAD*/

    $pdf->Rect(10,115, 160,4,'D');
    $pdf->setXY(10,115);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(15,4,utf8_decode('EDAD'),1,1,'C',true);
    $pdf->setXY(20,115);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(20,4,utf8_decode($dates_f01['edad']),1,1,'C',true);


    $pdf->setXY(40,115);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(25,4,utf8_decode('SEXO'),1,1,'C',false);
    $pdf->setXY(55,115);

    $sex = $dates_f01['sexo'];
    $sex_fem="";
    $sex_mas="";
    if($sex == "masculino"){
         $sex_mas="X";
    }else{
        $sex_fem="X";
    }

    $pdf->MultiCell(10,4,utf8_decode('H'),1,1,'L',false);

    $pdf->setXY(65,115);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,4,utf8_decode($sex_mas),1,1,'C',true);

    $pdf->setXY(80,115);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(10,4,utf8_decode('M'),1,1,'L',false);

    $pdf->setXY(90,115);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,4,utf8_decode($sex_fem),1,1,'C',true);


    $pdf->setXY(105,115);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(35,4,utf8_decode('NO. DE EMPLEADO'),1,1,'L',false);

    $pdf->setXY(140,115);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(30,4,utf8_decode(' '),1,1,'C',true);

    /*-----------------> fin */



    /*CAMPO DE PUESTO*/

    $pdf->Rect(10,121, 190,22,'D');

    $pdf->setXY(10,121);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(25,6,utf8_decode('PUESTO'),1,1,'L',false);

    $pdf->setXY(35,121);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(75,6,utf8_decode($dates_f01['puesto']),1,1,'L',false);

    $pdf->setXY(110,121);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(45,12,utf8_decode('DESCRIPCIÓN DE ACTIVIDADES'),1,1,'L',false);

    $pdf->setXY(155.5,121.5);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Rect(155,121,45,12,'DF');
    $pdf->SetFont('arial','',5);
    $pdf->MultiCell(42.5,3,utf8_decode($dates_f01['descripcion_actividades'].'dskflhajsdk sakdjhfhikh ksjhdfnklj '),0,1,'L',false);



    $pdf->setXY(10,127);
    $pdf->SetFont('arial','',7.5);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(50,6,utf8_decode('FECHA DE INGRESO'),1,1,'L',false);

    $pdf->setXY(60,127);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(50,6,utf8_decode($dates_f01['fecha_ing_laboral']),1,1,'L',false);


    $pdf->setXY(10,133);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(50,4,utf8_decode('FECHA DE 1a COTIZACIÓN AL ISSSTE'),1,1,'L',false);

    $pdf->setXY(60,133);
    $pdf->SetFillColor(206, 231, 239);
    $fecha_coti = $methods->obtener_fecha2($dates_f01['fecha_pri_cotizacion']);
    $pdf->MultiCell(140,4,utf8_decode($fecha_coti),1,1,'L',false);


    $pdf->setXY(10,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,4,utf8_decode('HORARIO DE TRABAJO (15)'),1,1,'L',false);
    $turno = $dates_f01['turno'];
    $turnos = array('mat' => '',
                        'ves' =>'' ,
                        'noc' => '',
                        'mix' => '', 
                        'jor' => '');
    switch ($turno) {
        case 'matutino':
            $turnos['mat'] = 'X';
            break;
        case 'vespertino':
            $turnos['ves'] = 'X';
            break;
        case 'nocturno':
            $turnos['noc'] = 'X';
            break;
        case 'mixto':
            $turnos['mix'] = 'X';
            break;
        case 'jornada scumulada':
            $turnos['jor'] = 'X';
            break;

        default:
            # code...
            break;
    }

    $pdf->setXY(30,137);
    $pdf->MultiCell(20,8,utf8_decode('MATUTINO'),1,1,'L',false);

    $pdf->setXY(50,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,8,utf8_decode($turnos['mat']),1,1,'L',false);

    $pdf->setXY(55,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,8,utf8_decode('VESPERTINO'),1,1,'L',false);

    $pdf->setXY(75,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,8,utf8_decode($turnos['ves']),1,1,'L',false);


    $pdf->setXY(80,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,8,utf8_decode('NOCTURNO'),1,1,'L',false);

    $pdf->setXY(100,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,8,utf8_decode($turnos['noc']),1,1,'L',false);

    $pdf->setXY(105,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(12,8,utf8_decode('MIXTO'),1,1,'L',false);

    $pdf->setXY(115,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,8,utf8_decode($turnos['mix']),1,1,'L',false);

    $pdf->setXY(120,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(20,4,utf8_decode('JORNADA ACUMULADA'),1,1,'L',false);

    $pdf->setXY(140,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(5,8,utf8_decode($turnos['jor']),1,1,'L',false);

    $pdf->setXY(145,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(15,4,utf8_decode('HORA DE ENTRADA'),1,1,'L',false);

    $pdf->setXY(160,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12.5,8,utf8_decode($dates_f01['hora_entra']),1,1,'L',false);

    $pdf->setXY(172.5,137);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(15,4,utf8_decode('HORA DE SALIDA'),1,1,'L',false);

    $pdf->setXY(187.5,137);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12.5,8,utf8_decode($dates_f01['hora_sali']),1,1,'L',false);

    /*--------------------------------------> FIN */


    /*------------------------------ FECHA Y HORA DEL ACCIDENTE  */
    $pdf->Rect(10,149, 148,10,'D');

    $pdf->setXY(10,149);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(148,10,utf8_decode('FECHA Y HORA DEL ACCIDENTE O PROBABLE INICIO DE LA ENFERMEDAD'),1,1,'L',false);
    
    $fech_acci = $methods->divDatetime($dates_f01['fecha_accidente']);

    $pdf->setXY(110,149);
    $pdf->MultiCell(12,4,utf8_decode('DÍA'),1,1,'C',false);
    $pdf->setXY(110,153);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode($fech_acci['dia']),1,1,'C',true);


    $pdf->setXY(122,149);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(12,4,utf8_decode('MES'),1,1,'C',true);
    $pdf->setXY(122,153);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode($fech_acci['mes']),1,1,'C',true);


    $pdf->setXY(134,149);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(12,4,utf8_decode('AÑO'),1,1,'C',false);
    $pdf->setXY(134,153);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode($fech_acci['anio']),1,1,'C',true);


    $pdf->setXY(146,149);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(12,4,utf8_decode('HORA'),1,1,'C',false);
    $pdf->setXY(146,153);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(12,6,utf8_decode($fech_acci['horas'].':'.$fech_acci['mins']),1,1,'C',true);
 
    /*---------------------------------> FIN */

    
    $pdf->text(10,164,utf8_decode('CIRCUNSTANCIAS EN QUE OCURRIÓ EL ACCIDENTE'),0,1,'C',false);
   // $pdf->Rect(10,167, 190,8,'D');
    
    $circunn = $dates_f01['circuns'];
    $circunts = array('dep' => '','com' =>'' , 'trat' =>'' ,'trado' => '','ti_ex' => '' );
    switch ($circunn) {
        case 'A':
            $circunts['dep'] = "X";
            break;
        case 'B-T':
            $circunts['trat'] = "X";
            break;
        case 'B-D':
            $circunts['trado'] = "X";
            break;
        case 'A-T':
            $circunts['ti_ex'] = "X";
            break;
        case 'C':
            $circunts['com'] = "X";
            break;
        
        
        default:
            # code...
            break;
    }

    $pdf->setXY(10,167);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(23,8,utf8_decode('DEPENDENCIA'),1,1,'C',false);
    $pdf->setXY(30,167);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,8,utf8_decode($circunts['dep']),1,1,'C',true);


    $pdf->SetFillColor(255, 255, 255);
    $pdf->setXY(45,167);
    $pdf->MultiCell(18,8,utf8_decode('COMISIÓN'),1,1,'C',false);
    $pdf->setXY(60,167);
     $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,8,utf8_decode($circunts['com']),1,1,'C',true);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->setXY(75,167);
    $pdf->MultiCell(30,4,utf8_decode('EN TRAYECTO A SU TRABAJO'),1,1,'C',false);
    $pdf->setXY(105,167);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(15,8,utf8_decode($circunts['trat']),1,1,'C',true);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->setXY(120,167);
    $pdf->MultiCell(30,4,utf8_decode('EN TRAYECTO A SU DOMICILIO'),1,1,'C',false);
    $pdf->setXY(150,167);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,8,utf8_decode($circunts['trado']),1,1,'C',true);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->setXY(165,167);
    $pdf->MultiCell(20,4,utf8_decode('TIEMPO EXTRA'),1,1,'C',false);
    $pdf->setXY(185,167);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,8,utf8_decode($circunts['ti_ex']),1,1,'C',true);


    /*----------------------------- */

    $pdf->Rect(10,177, 190,6,'D');

    $pdf->setXY(10,177);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(190,4,utf8_decode('DESCRIPCIÓN PRECISA DE LA FORMA Y EL SITIO O AREA DE TRABAJO EN LOS QUE OCURRIO EL ACCIDENTE., EN CASO DE ENFERMEDAD DESCRIBIR LOS AGENTES CONTAMINANTES Y EL TIEMPO DE EXPOSICIÓN A LOS MISMOS.'),1,1,'J',false);
    $pdf->setXY(12,185);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Rect(10,185,190,14,'DF');
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(180,4,utf8_decode($dates_f01['descripcion_rt']),0,1,'C',true);



    /*----------------------------> FIN */




    /*----------------------------- */
    $pdf->SetFont('arial','B',8);
    $pdf->text(10,203,utf8_decode('ATENTAMENTE:'),0,1,'C',false);
    
    $pdf->SetFont('arial','',8);
    $pdf->text(10,208,utf8_decode('NOMBRE Y FIRMA DEL TRABAJADOR:'),0,1,'C',false);
    //$pdf->Line(62,205,135,205);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->setXY(62,205);
    $nombre_trab = $dates_f01['ape_pater'].' '.$dates_f01['ape_mater'].' '.$dates_f01['nombre'];
    $pdf->Cell(60,4,utf8_decode($nombre_trab),1,1,'C',true);
    
    $pdf->SetFont('arial','B',8);
    $pdf->text(10,213,utf8_decode('1.2 DATOS DE LA DEPENDENCIA O ENTIDAD::'),0,1,'C',false);
    
    $pdf->SetFont('arial','',8);
    $pdf->text(10,220,utf8_decode('NOMBRE DE LA DEPENDENCIA'),0,1,'C',false);

    //$pdf->Line(62,218,135,218);
    $pdf->setXY(58,216);
    $pdf->MultiCell(80,5,utf8_decode($dates_f01['dependencia']),1,1,'C',false);
    $pdf->text(140,220,utf8_decode('NÚMERO DE RAMO'),0,1,'C',false);
    $pdf->Line(27,231,130,231);


    $pdf->setXY(170,216);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(30,5,utf8_decode($dates_f01['ramo']),1,1,'C',true);

    /*--------------------------> fin*/

    $pdf->text(10,230,utf8_decode('DOMICILIO'),0,1,'C',false);

    $pdf->text(60,234.5,utf8_decode('CALLE'),0,1,'C',false);
    $pdf->setXY(27,226.8);
    $pdf->Cell(78,4,utf8_decode($dates_f01['calle_dep']),0,0,'C',true);
    $pdf->text(113,234.5,utf8_decode('NÚMERO'),0,1,'C',false);
    $pdf->setXY(106,226.8);
    $pdf->Cell(24,4,utf8_decode($dates_f01['numero_dep']),0,0,'C',true);

    $pdf->setXY(133,228);
    $pdf->MultiCell(23,3,utf8_decode('CENTRO DE ADSCRIPCION'),0,'L',false);

    $pdf->setXY(160,228);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(40,6,utf8_decode($dates_f01['ofi_adscripcion']),1,1,'L',true);



    /*--------------------------------> FIN */
    $pdf->Line(10,243,200,243);
    $pdf->SetFillColor(206, 231, 239);
    
    $pdf->text(30,246,utf8_decode('COLONIA'),0,1,'C',false);
    $pdf->setXY(10,238);
    $pdf->Cell(56,4,utf8_decode($dates_f01['colonia_dep']),0,0,'C',true);

    $pdf->text(70,246,utf8_decode('DELEGACIÓN O MUNICIPIO'),0,1,'C',false);
    $pdf->setXY(68,238);
    $pdf->Cell(56,4,utf8_decode($dates_f01['municipio_dep']),0,0,'C',true);
    //$pdf->Cell(24,4,utf8_decode('UALL STREET'),0,0,'C',true);

    $pdf->text(130,246,utf8_decode('CÓDIGO POSTAL'),0,1,'C',false);
    $pdf->setXY(130,238);
    $pdf->Cell(25,4,utf8_decode($dates_f01['cp_dep']),0,0,'C',true);
    //$pdf->Cell(24,4,utf8_decode('UALL STREET'),0,0,'C',true);

    $pdf->text(170,246,utf8_decode('TELÉFONO'),0,1,'C',false);
    $pdf->setXY(160,238);
    $pdf->Cell(35,4,utf8_decode($dates_f01['telefono_dep']),0,0,'C',true);
    // $pdf->setXY(68,235);
    //$pdf->Cell(56,4,utf8_decode('CLINICA HOSPITAL XALAPA VERACRUZ'),0,0,'C',true);
    //$pdf->Cell(24,4,utf8_decode('UALL STREET'),0,0,'C',true);

    /*----------------------------> Fin */

    $pdf->text(10,252,utf8_decode('JEFE INMEDIATO QUE TOMA CONOCIMIENTO INICIAL DEL RIESGO DEL TRABAJO'),0,1,'C',false);

    $pdf->setXY(125,249);
    $nombre_boss = $dates_f01['ape_pat_jef'].' '.$dates_f01['ape_mat_jef'].' '.$dates_f01['nom_jef'];
       
    $pdf->MultiCell(75,5,utf8_decode($nombre_boss),1,1,'J',false);

    $pdf->text(10,259,utf8_decode('PUESTO'),0,1,'C',false);
    $pdf->setXY(25,256);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(80,5,utf8_decode($dates_f01['puesto_jefe']),1,1,'L',false);
    
    $pdf->setXY(90,256);
    $pdf->SetFillColor(255,255,255);
    $pdf->MultiCell(35,5,utf8_decode('NO. EMPLEADO'),1,1,'L',false);
    $pdf->setXY(125,256);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->MultiCell(75,5,utf8_decode($dates_f01['no_empleado_jef']),1,1,'L',false);
    


    $pdf->setXY(10,264);
    $pdf->SetFillColor(255, 255, 255);
    $pdf->MultiCell(75,9 ,utf8_decode('FECHA Y HORA DE COMUNICACIÓN DEL MISMO'),1,1,'L',false);
    
    $fech_acc = $methods->divDatetime($dates_f01['fecha_entera_jef']);
    $pdf->setXY(85,269);
    $pdf->Cell(15,4,utf8_decode('DIA'),1,1,'C',true);
    
    $pdf->setXY(100,269);
    $pdf->Cell(15,4,utf8_decode('MES'),1,1,'C',true);
    
    $pdf->setXY(115,269);
    $pdf->Cell(15,4,utf8_decode('AÑO'),1,1,'C',true);
     
    $pdf->setXY(130,269);
    $pdf->Cell(15,4,utf8_decode('HORA'),1,1,'C',true);
     
    $pdf->setXY(145,269);
    $pdf->Cell(15,4,utf8_decode('MIN'),1,1,'C',true);
       
      
    /*----------------------------------------------------*/
    $pdf->setXY(85,264);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,5,utf8_decode($fech_acc['dia']),1,1,'C',true);
    
    $pdf->setXY(100,264);
    $pdf->Cell(15,5,utf8_decode($fech_acc['mes']),1,1,'C',true);
    
    $pdf->setXY(115,264);
    $pdf->Cell(15,5,utf8_decode($fech_acc['anio']),1,1,'C',true);
     
    $pdf->setXY(130,264);
    $pdf->Cell(15,5,utf8_decode($fech_acc['horas']),1,1,'C',true);
     
    $pdf->setXY(145,264);
    $pdf->Cell(15,5,utf8_decode($fech_acc['mins']),1,1,'C',true);
    $pdf->SetFillColor(255, 255, 255);

    /*----------------------------------------------------*/


    $pdf->text(10,286,utf8_decode('NOMBRE Y FIRMA DEL REPRESENTANTE DE LA DEPENDENCIA'),0,1,'C',false);
    $pdf->setXY(10,288);
    $pdf->SetFillColor(206, 231, 239);
    $nombre_repre = $dates_f01['ape_pat_repre_dep'].' '.$dates_f01['ape_mat_repre_dep'].' '.$dates_f01['nom_repre_dep'];
    $pdf->Cell(120,4 ,utf8_decode($nombre_repre),1,1,'L',true);
    
    $pdf->SetFillColor(206, 231, 239);
 
    $pdf->Rect(170,265, 30,30,'D');
    $pdf->setXY(170,270);
    $pdf->Cell(30,10 ,utf8_decode('SELLO DE LA'),0,1,'C',false);
    $pdf->setXY(170,275);
    $pdf->Cell(30,10 ,utf8_decode('DEPENDENCIA'),0,1,'C',false);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial','',5.5);
    $pdf->text(10,333,utf8_decode('NOTA: EL ANVERSO DEBE SER REQUISITADO POR LA DEPENDENCIA EN LA CUAL LABORA EL TRABAJADOR Y EL REVERSO ES PARA USO EXCLUSIVO DE LAS AREAS DE MEDICINA DE TRABAJO'),0,0,'J',false);
    $pdf->text(10,337,utf8_decode(' Y SE CONSIGNARAN LAS FIRMAS DE LAS AUTORIDADES DE LA SUBDELEGACIÓN DE PRESTACIONES.'),0,0,'J',false);

    /*-----------------------------------------> FIN   */

    /*-----------------------------------------> HOJA 2*/
    $pdf->Image('images/imagee.png', 5, 50,200);
    $pdf->AddPage("P",array(216,356));
    $pdf->SetFont('Arial','',7);
    $pdf->text(110,28,utf8_decode('PARA USO DEL MEDICO DE MEDICINA DEL TRABAJO'),0,1,'C',false);

    $pdf->SetFont('Arial','B',10);
    $pdf->text(12,28,utf8_decode('DICTAMEN DE CALIFICACIÓN'),0,1,'C',false);


    /*------------------------> COLUMNA NATURALEZA RIESGO */
    $pdf->Rect(10,32, 155,38,'D');
    $pdf->setXY(10,32);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(90,8 ,utf8_decode('NATURALEZA DEL RIESGO'),1,1,'C',false);

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
    $pdf->Cell(15,6 ,utf8_decode('X'),1,1,'C',true);

    $pdf->setXY(85,46);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('X'),1,1,'C',true);

    $pdf->setXY(85,52);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('X'),1,1,'C',true);

    $pdf->setXY(85,58);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('X'),1,1,'C',true);

    $pdf->setXY(85,64);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('X'),1,1,'C',true);

    /*---------------------------------------> FECHA*/

    $pdf->setXY(100,32);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(65,4 ,utf8_decode('FECHA'),1,1,'C',false);


    $pdf->setXY(100,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(15,4 ,utf8_decode('DIA'),1,1,'C',false);

    $pdf->setXY(115,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(15,4 ,utf8_decode('MES'),1,1,'C',false);

    $pdf->setXY(130,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(15,4 ,utf8_decode('AÑO'),1,1,'C',false);

    $pdf->setXY(145,36);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(255, 255, 255);
    $pdf->Cell(20,4 ,utf8_decode('HORA'),1,1,'C',false);
//----------------------------------------------------------
    $pdf->setXY(100,40);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6,utf8_decode('02'),1,1,'C',true);

    $pdf->setXY(115,40);
    $pdf->SetFont('Arial','',9);    
   
    $pdf->Cell(15,6 ,utf8_decode('11'),1,1,'C',true);

    $pdf->setXY(130,40);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('2004'),1,1,'C',true);

    $pdf->setXY(145,40);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(20,6 ,utf8_decode('22:04'),1,1,'C',true);
   //---------------------------------------------------------
    $pdf->setXY(100,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('01'),1,1,'C',true);

    $pdf->setXY(115,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->Cell(15,6 ,utf8_decode('04'),1,1,'C',true);

    $pdf->setXY(130,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->Cell(15,6 ,utf8_decode('1998'),1,1,'C',true);

    $pdf->setXY(145,46);
    $pdf->SetFont('Arial','',9);    
    $pdf->Cell(20,6 ,utf8_decode('22:04'),1,1,'C',true);

//----------------------------------------------
    $pdf->setXY(100,52);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('01'),1,1,'C',true);

    $pdf->setXY(115,52);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('10'),1,1,'C',true);

    $pdf->setXY(130,52);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('2010'),1,1,'C',true);

    $pdf->setXY(145,52);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(20,6 ,utf8_decode('20:10'),1,1,'C',true);
//--------------------------------------------------------------
    $pdf->setXY(100,58);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('01'),1,1,'C',true);

    $pdf->setXY(115,58);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('02'),1,1,'C',true);

    $pdf->setXY(130,58);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('2010'),1,1,'C',true);

    $pdf->setXY(145,58);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(20,6 ,utf8_decode('22:04'),1,1,'C',true);
//---------------------------------------------------------------

    $pdf->setXY(100,64);
    $pdf->SetFont('Arial','',9);    
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(15,6 ,utf8_decode('22'),1,1,'C',true);

    $pdf->setXY(115,64);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('10'),1,1,'C',true);

    $pdf->setXY(130,64);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(15,6 ,utf8_decode('2010'),1,1,'C',true);

    $pdf->setXY(145,64);
    $pdf->SetFont('Arial','',9);    
    
    $pdf->Cell(20,6 ,utf8_decode('22:02'),1,1,'C',true);
    /*---------------------------------------------> FIN*/

    /*------------------------------ FECHA Y HORA DEL ACCIDENTE  */
    $pdf->Rect(10,74, 190,10,'D');
    $pdf->setXY(10,74);
    $pdf->SetFillColor(206, 231, 239);
    $pdf->Cell(130,10,utf8_decode('FECHA EN QUE SE PRESENTÓ POR PRIMERA VEZ A LA ATENCIÓN MÉDICA'),1,1,'L',false);

    $pdf->setXY(140,74);
    $pdf->Cell(15,4,utf8_decode('DÍA'),1,1,'C',false);
    $pdf->setXY(140,78);
    $pdf->Cell(15,6,utf8_decode('01'),1,1,'C',true);

    $pdf->setXY(155,74);
    $pdf->Cell(15,4,utf8_decode('MES'),1,1,'C',false);
    $pdf->setXY(155,78);
    $pdf->Cell(15,6,utf8_decode('01'),1,1,'C',true);

    $pdf->setXY(170,74);
    $pdf->Cell(15,4,utf8_decode('AÑO'),1,1,'C',false);
    $pdf->setXY(170,78);
    $pdf->Cell(15,6,utf8_decode('2010'),1,1,'C',true);

    $pdf->setXY(185,74);
    $pdf->Cell(15,4,utf8_decode('HORA'),1,1,'C',false);
    $pdf->setXY(185,78);
    $pdf->Cell(15,6,utf8_decode('22:06'),1,1,'C',true);
 
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
    $pdf->MultiCell(12,6,utf8_decode('X'),1,1,'C',false);

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
    $pdf->Image('images/imagee.png', 5, 50,200);




    $pdf->Output();






?>
