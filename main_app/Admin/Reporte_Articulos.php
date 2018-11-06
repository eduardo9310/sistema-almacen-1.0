<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM articulos ORDER BY id_articulo';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE ARTICULOS',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(12,6,'Clave',1,0,'C',1);
$pdf->Cell(60,6,'Descripcion',1,0,'C',1);
$pdf->Cell(10,6,'Min',1,0,'C',1);
$pdf->Cell(10,6,'Max',1,0,'C',1);
$pdf->Cell(18,6,'Compra',1,0,'C',1);
$pdf->Cell(18,6,'Utilidad',1,0,'C',1);
$pdf->Cell(15,6,'Venta',1,0,'C',1);
$pdf->Cell(10,6,'Cant',1,0,'C',1);
$pdf->Cell(15,6,'Categ',1,0,'C',1);
$pdf->Cell(15,6,'Prov',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 7);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(12,6, $row['clave_articulo'],1,0,'L');
	$pdf->Cell(60,6, utf8_decode($row['descripcion_articulo']),1,0,'L');
	$pdf->Cell(10,6, $row['invmin_articulo'],1,0,'L');
	$pdf->Cell(10,6, $row['invmax_articulo'],1,0,'L');
	$pdf->Cell(18,6, '$'.$row['compra_articulo'],1,0,'L');
	$pdf->Cell(18,6, $row['utilidad_articulo'].'%',1,0,'L');
	$pdf->Cell(15,6, '$'.$row['venta_articulo'],1,0,'L');
	$pdf->Cell(10,6, $row['cantidad_articulo'],1,0,'L');
	$pdf->Cell(15,6, $row['id_categoria'],1,0,'L');
	$pdf->Cell(15,6, $row['id_proveedor'],1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();
 ?>

 <!-- 'D','ReporteUsuarios - '.time().'.pdf' -->