<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../img/logo_Novedades_Romero.jpeg',10,8,20);
    // Arial bold 15
    // $this->SetFont('Arial','B',20);
    // // Movernos a la derecha
    // $this->Cell(80);
    // // Título
    // $this->Cell(20,10,'REPORTE GENERAL',0,0,'C');
    // // Salto de línea
    // $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-16);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $this->Ln(8);
    $this->Cell(0,10,'SISTEMA ALMACEN V1',0,0,'C');
}
}

// Creación del objeto de la clase heredada
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
// $pdf->Output();
?>