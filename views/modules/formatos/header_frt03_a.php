<?php
	
    require 'fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('images/logo.jpg', 5, 5, 40 );
			$this->SetFont('ARIAL','B',9);
			
			$this->setXY(50,5);
			$this->Cell(110,5,utf8_decode('DIRECCIÓN DE PRESTACIONES ECONÓMICAS SOCIALES Y CULTURALES.'),0,1,'C');

			$this->setXY(50,10);
			$this->Cell(110,5,utf8_decode('REQUISITOS PARA EL TRÁMITE DE CALIFICACIÓN DE RIESGOS DEL TRABAJO'),0,1,'C');

			$this->setXY(50,15);
			$this->Cell(110,5,utf8_decode('(CENTRO DE TRABAJO)'),0,1,'C');

			$this->setXY(47,20);
			$this->SetFont('ARIAL','BU',9);
			$this->Cell(110,5,utf8_decode('FORMATO RT-03 A'),0,1,'J');

			$this->setXY(145,20);
			$this->SetFont('ARIAL','B',9);
			$this->Cell(20,5,utf8_decode('(ANEXO 6)'),0,1,'J');
			
			
			$this->Image('images/mexico2.png', 170, 5, 40 );

			$this->Image('images/image4.png', 5, 50,200);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>