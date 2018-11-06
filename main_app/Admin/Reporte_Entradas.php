<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM entradas ORDER BY id_entrada';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE ENTRADAS',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(20,6,'Clave Art',1,0,'C',1);
$pdf->Cell(60,6,'Descripcion',1,0,'C',1);
$pdf->Cell(25,6,'Cant Actual',1,0,'C',1);
$pdf->Cell(25,6,'Cant Anter',1,0,'C',1);
$pdf->Cell(22,6,'Diferencia',1,0,'C',1);
$pdf->Cell(30,6,'Fecha',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 8);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10,6, $row['id_entrada'],1,0,'L');
	$pdf->Cell(20,6, utf8_encode($row['clave_articulo']),1,0,'L');
	$pdf->Cell(60,6, utf8_encode($row['descripcion_articulo_entrada']),1,0,'L');
	$pdf->Cell(25,6, utf8_encode($row['cantidad_actual_articulo']),1,0,'L');
	$pdf->Cell(25,6, utf8_encode($row['cantidad_anterior_articulo']),1,0,'L');
	$pdf->Cell(22,6, utf8_encode($row['diferencia_entrada']),1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['date_entrada']),1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();
 ?>