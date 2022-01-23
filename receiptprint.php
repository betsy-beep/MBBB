<?php
require ('fpdf.php');

$db=mysqli_connect("sql211.epizy.com", "epiz_28929474", "eWyh9BwPIM", "epiz_28929474_mbbb");
if (mysqli_connect_error()) {
		die('Connect error('.mysqli_connect_errno().')' . mysqli_connect_error());
	}
	else
	{
		//get receipt data
		$sql = mysqli_query($db, "SELECT * FROM receipt ORDER BY guestID DESC");
		$print = mysqli_fetch_array($sql);

		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(130,5,'FCSIT MEETING ROOM BOOKING',0,1);
		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(70,5,"First Name: ",1,0);
		$pdf->Cell(110,5,$print['FirstName'],1,1);
		$pdf->Cell(70,5,"Room Type: ",1,0);
		$pdf->Cell(110,5,$print['Room'],1,1);
		
		$pdf->Cell(189,10,'',0,1);
		$pdf->Cell(70,5,"Time:",1,0);
		$pdf->Cell(110,5,$print['Time'],1,1);
		$pdf->Cell(70,5,"Date:",1,0);
		$pdf->Cell(110,5,$print['Date'],1,1);
		$pdf->Cell(189,10,'',0,1);
		$pdf->Cell(189,10,'',0,1);
		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(189,10,'',0,1);
		$pdf->Cell(130,5,"PAYMENT METHOD :",0,1);
		$pdf->Cell(130,5,"Credit Card / Paypal",0,1);
		$pdf->Cell(130,5,"TOTAL :",0,1);
		$pdf->Cell(130,5,"RM5",0,1);
		$pdf->Cell(189,10,'',0,1);
		$pdf->Cell(189,10,'',0,1);

		$pdf->Cell(130,5,"Thank you for purchasing!",0,1);
		$pdf->Cell(189,10,'',0,1);
		$pdf->output();
	}

	$db->close();	

?>