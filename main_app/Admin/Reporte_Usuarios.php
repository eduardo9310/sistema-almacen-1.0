<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM usuarios ORDER BY id_usuario';

$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE USUARIOS',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10,6,'ID',1,0,'C',1);
$pdf->Cell(30,6,'Nombre',1,0,'C',1);
$pdf->Cell(20,6,'Usuario',1,0,'C',1);
$pdf->Cell(30,6,'Direccion',1,0,'C',1);
$pdf->Cell(30,6,'Telefono',1,0,'C',1);
$pdf->Cell(45,6,'Correo',1,0,'C',1);
$pdf->Cell(15,6,'Rol',1,0,'C',1);
$pdf->Cell(15,6,'Estado',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 8);
while ($row = $resultado->fetch_assoc()) {
	$pdf->Cell(10,6, $row['id_usuario'],1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['nombre_usuario']),1,0,'L');
	$pdf->Cell(20,6, utf8_encode($row['usuario_usuario']),1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['direccion_usuario']),1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['telefono_usuario']),1,0,'L');
	$pdf->Cell(45,6, utf8_encode($row['correo_usuario']),1,0,'L');
	$pdf->Cell(15,6, utf8_encode($row['tipo_usuario']),1,0,'L');
	$pdf->Cell(15,6, utf8_encode($row['estado_usuario']),1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();

// 'D','ReporteUsuarios - '.time().'.pdf'
 ?>