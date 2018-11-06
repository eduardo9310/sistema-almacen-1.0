<?php 
include 'Plantilla_Reportes.php';
require '../Conexion.php';

$query = 'SELECT* FROM salidas ORDER BY id_salida';
$resultado = $mysqli->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
// Movernos a la derecha
$pdf->Cell(80);
// Título
$pdf->Cell(20,10,'REPORTE SALIDAS',0,0,'C');
$pdf->Ln(20);


$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(8,6,'ID',1,0,'C',1);
$pdf->Cell(20,6,'Clave',1,0,'C',1);
$pdf->Cell(60,6,'Descripcion',1,0,'C',1);
$pdf->Cell(12,6,'Cant',1,0,'C',1);
$pdf->Cell(15,6,'Precio',1,0,'C',1);
$pdf->Cell(15,6,'Total',1,0,'C',1);
$pdf->Cell(30,6,'Sucursal',1,0,'C',1);
$pdf->Cell(30,6,'Fecha',1,0,'C',1);

$pdf->Ln(6);

$pdf->SetFillColor(244, 249, 249);
$pdf->SetFont('Arial', '', 7);
while ($row = $resultado->fetch_assoc()) {

	// Conslta Extra
	$sucursales = "SELECT nombre_sucursal FROM sucursales where id_sucursal ='".$row['id_sucursal']."'";
	$consulta_sucursal = mysqli_query($mysqli, $sucursales);
	$resultado_sucursal= mysqli_fetch_array($consulta_sucursal);	

	$articulos = "SELECT descripcion_articulo FROM articulos where clave_articulo ='".$row['clave_articulo']."'";
	$consulta_articulos = mysqli_query($mysqli, $articulos);
	$resultado_articulos= mysqli_fetch_array($consulta_articulos);


	$pdf->Cell(8,6, $row['id_salida'],1,0,'L');
	$pdf->Cell(20,6, utf8_encode($row['clave_articulo']),1,0,'L');

	$pdf->SetFont('Arial', '', 5.5);
	$pdf->Cell(60,6, utf8_encode($resultado_articulos['descripcion_articulo']),1,0,'L');
	
	$pdf->SetFont('Arial', '', 7);
	$pdf->Cell(12,6, utf8_encode($row['cantidad_articulo']),1,0,'L');
	$pdf->Cell(15,6, utf8_encode("$".$row['precio_articulo']),1,0,'L');
	$pdf->Cell(15,6, utf8_encode("$".$row['total_articulo']),1,0,'L');
	$pdf->Cell(30,6, $resultado_sucursal['nombre_sucursal'],1,0,'L');
	$pdf->Cell(30,6, utf8_encode($row['date_salida']),1,0,'L');
	
	$pdf->Ln(6);

}

$pdf->Output();
 ?>