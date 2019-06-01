<?php
session_start();
include_once("../fpdf/fpdf.php");

  if (!isset($_SESSION['user_id'])) { redirect('../index.php', false);}


if (isset($_GET["order_date"]) AND isset($_GET["cust_name"])) {
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",16);
    $pdf->Cell(190,10,"OPERADORES LOGISTICOS",0,1,"C");
	$pdf->setFont("Arial",null,12);    
    $pdf->Image('gestion-logistica.jpg' , 160 ,8, 35 , 38,'JPG');
    $pdf->Image('Captura.png' , 50 ,80,120,120);
	$pdf->Cell(50,10,"Fecha",0,0);
	$pdf->Cell(50,10,": ".$_GET["order_date"],0,1);
	$pdf->Cell(50,10,"Nombres",0,0);
	$pdf->Cell(50,10,": ".$_GET["cust_name"],0,1);

	$pdf->Cell(50,10,"",0,1);


	$pdf->SetFillColor(128,128,128);
    $pdf->Cell(10,10,"#",1,0,"C",true);
	$pdf->Cell(70,10,"Nombre del Producto",1,0,"C",true);
	$pdf->Cell(30,10,"Cantidad",1,0,"C",true);
	$pdf->Cell(40,10,"Precio",1,0,"C",true);
	$pdf->Cell(40,10,"Total (Rs)",1,1,"C",true);

	for ($i=0; $i < count($_GET["pid"]) ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
		$pdf->Cell(70,10, $_GET["pro_name"][$i],1,0,"C");
		$pdf->Cell(30,10, $_GET["qty"][$i],1,0,"C");
		$pdf->Cell(40,10, $_GET["price"][$i],1,0,"C");
		$pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}

	$pdf->setFont("Arial","B",16);
    $pdf->Cell(50,10,"",0,1);
	$pdf->Cell(50,10,"Total a Pagar $",0,0);
	$pdf->Cell(50,10,":".$_GET["net_total"],0,1);
	$pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");
	$pdf->Output();	
    
    

}





?>