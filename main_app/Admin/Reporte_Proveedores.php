<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM proveedores ORDER BY id_proveedor';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE PROVEEDORES',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(8,6,'ID',1,0,'C',1);
$pdf->Cell(22,6,'RFC',1,0,'C',1);
$pdf->Cell(40,6,'Empresa',1,0,'C',1);
$pdf->Cell(35,6,'Representante',1,0,'C',1);
$pdf->Cell(28,6,'Direccion',1,0,'C',1);
$pdf->Cell(19,6,'Telefono',1,0,'C',1);
$pdf->Cell(40,6,'Correo',1,0,'C',1);
// $pdf->Cell(15,6,'Cuenta',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 7);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(8,6, $row['id_proveedor'],1,0,'L');
	$pdf->Cell(22,6, utf8_encode($row['rfc_proveedor']),1,0,'L');
	$pdf->Cell(40,6, utf8_encode($row['empresa_proveedor']),1,0,'L');
	$pdf->Cell(35,6, utf8_encode($row['representante_proveedor']),1,0,'L');
	$pdf->Cell(28,6, utf8_encode($row['direccion_proveedor']),1,0,'L');
	$pdf->Cell(19,6, utf8_encode($row['telefono_proveedor']),1,0,'L');
	$pdf->Cell(40,6, utf8_encode($row['correo_proveedor']),1,0,'L');
	// $pdf->Cell(15,6, utf8_encode($row['cuenta_proveedor']),1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();
 ?>