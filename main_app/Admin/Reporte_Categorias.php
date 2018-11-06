<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM categorias ORDER BY id_categoria';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE CATEGORIAS',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(40,6,'Nombre',1,0,'C',1);
$pdf->Cell(40,6,'Departamento',1,0,'C',1);
$pdf->Cell(50,6,'Descripcion',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 7);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10,6, $row['id_categoria'],1,0,'L');
	$pdf->Cell(40,6, utf8_encode($row['nombre_categoria']),1,0,'L');
	$pdf->Cell(40,6, utf8_encode($row['departamento_categoria']),1,0,'L');
	$pdf->Cell(50,6, utf8_encode($row['descripcion_categoria']),1,0,'L');

	$pdf->Ln(6);

}

$pdf->Output();
 ?>