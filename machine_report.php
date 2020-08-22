<?php 
// memanggil library pdf
require ('./fpdf181/fpdf.php');

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
//judul
$pdf->SetFont('Arial','B',20);
$pdf->Cell(200, 10, 'GRG BANKING',0,1,'C');
$pdf->Cell(200, 10, 'Machine Report ',0,1,'C');
$pdf->SetFont('Arial','B',10);
//Kolom atas
$pdf->SetFont('Arial','',12);
$pdf->Cell(31, 10, 'Machine ID',1,0);
$pdf->Cell(13, 10, 'Name',1,0);
$pdf->Cell(22, 10, 'Type',1,0);
$pdf->Cell(20, 10, 'Model',1,0);
$pdf->Cell(18, 10, 'Quantity',1,0);
$pdf->Cell(30, 10, 'Location',1,0);
$pdf->Cell(23, 10, 'IN',1,0);
$pdf->Cell(23, 10, 'OUT',1,0);
$pdf->Cell(18, 10, 'Status',1,1);
//koneksi
include './config.php';
//isi dari database
$perintah = mysqli_query($db, "select * from machine");
//perulangan tampil data
while ($row = mysqli_fetch_array($perintah)) {
$pdf->Cell(31, 6, $row['machine_cd'],1,0);    
$pdf->Cell(13, 6, $row['machine_name'],1,0);  
$pdf->Cell(22, 6, $row['machine_type'],1,0); 
$pdf->Cell(20, 6, $row['machine_model'],1,0); 
$pdf->Cell(18, 6, $row['machine_quantity'],1,0); 
$pdf->Cell(30, 6, $row['machine_location'],1,0); 
$pdf->Cell(23, 6, $row['date_in'],1,0);
$pdf->Cell(23, 6, $row['date_out'],1,0);
$pdf->Cell(18, 6, $row['machine_status'],1,1);
}
// nampilkan hasil
$pdf->Output();
?>