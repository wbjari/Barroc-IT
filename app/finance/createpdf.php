<?php require 'pdf/fpdf.php';

$pdf = new FPDF();

/*$pdf->fpdf();
$pdf->SetMargins(10, 10);
$pdf->SetAutoPageBreak(5);
$pdf->SetDisplayMode(0);
$pdf->SetTitle('Test');
$pdf->SetSubject('PdfCREATOR!!');
$pdf->Open();
$pdf->AddPage(1000, 700);
$pdf->Header();
$pdf->SetFillColor(100);
$pdf->Text(' ',' ','Hallo');
$pdf->Cell(1, 2);


$pdf->Footer();
$pdf->Close();*/
$header=array('County','Active','Non Active'); 
//Data loading 
$pdf->SetFont('Arial','',14); 
$pdf->AddPage(); 

$pdf->ImprovedTable($header); 
$pdf->Output();
?>