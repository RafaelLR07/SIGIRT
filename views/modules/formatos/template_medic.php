<?php
	
    require 'fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/logo.jpg', 20, 10, 40 );
			$this->setXY(60,8);
			$this->SetFont('helvetica','B',8);
			$this->MultiCell(180,7,utf8_decode('DIRECCIÓN DE PRESTACIONES ECONÓMICAS SOCIALES Y CULTURALES'),'C');
			$this->setXY(60,12);
			$this->MultiCell(180,7,utf8_decode('SOLICITUD DE CALIFICACIÓN DE PROBABLE RIESGO DEL TRABAJO'),'C');
			$this->setXY(60,18);
			$this->SetFont('helvetica','BU',10);
			$this->MultiCell(180,7,utf8_decode('FORMATO RT-01'),'C');
			$this->setXY(150,18);
			$this->SetFont('helvetica','B',10);
			$this->MultiCell(180,7,utf8_decode('(ANEXO 9)'),'C');

			$this->Image('images/image4.png', 5, 50,200);





		}
		
	
	}
?>