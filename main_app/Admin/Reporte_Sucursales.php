<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM sucursales ORDER BY id_sucursal';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE SUCURSALES',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10,6,'No.',1,0,'C',1);
$pdf->Cell(30,6,'Sucursal',1,0,'C',1);
$pdf->Cell(30,6,'Responsable',1,0,'C',1);
$pdf->Cell(35,6,'Direccion',1,0,'C',1);
$pdf->Cell(32,6,'Referencia',1,0,'C',1);
$pdf->Cell(20,6,'Telefono',1,0,'C',1);
$pdf->Cell(35,6,'Descripcion',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 8);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10,6, $row['numero_sucursal'],1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['nombre_sucursal']),1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['responsable_sucursal']),1,0,'L');
	$pdf->Cell(35,6, utf8_encode($row['ubicacion_sucursal']),1,0,'L');
	$pdf->Cell(32,6, utf8_encode($row['referencia_sucursal']),1,0,'L');
	$pdf->Cell(20,6, utf8_encode($row['telefono_sucursal']),1,0,'L');
	$pdf->Cell(35,6, utf8_encode($row['descripcion_sucursal']),1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();
 ?>