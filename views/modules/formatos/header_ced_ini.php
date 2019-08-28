<?php
	
    require 'fpdf/fpdf.php';	
	class PDF extends FPDF
	{
		function Header()
		{
			
			$this->SetLineWidth(1.2); 
    		$this->SetFillColor(226, 222, 222);    
			$this->Rect(12,5,256,204,'DF');
			
			$this->Image('images/logo issste 2019.jpg', 5, 250,200);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			//$this->Cell(0,10, ''.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>