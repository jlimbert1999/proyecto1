<?php
require('Repor/fpdf.php');
include_once "php/conexion_be.php";

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de fechas',0,0,'C');//
    // Salto de línea
    $this->Ln(20);

    $this->Cell(40,10,"Id Venta",1,0,'C',0);
    $this->Cell(40,10,"Id Cliente",1,0,'C',0);
    $this->Cell(60,10,"Fecha",1,1,'C',0);
    //$this->Cell(40,10,"Cabecera3",1,1,'C',0);//salto de line 2do 1
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
}
}
require 'cn.php';//tremos la conexion
$consulta="SELECT * FROM ventas";
$resultado=$mysqli->query($consulta);

// Creación del objeto de la clase heredada
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
// $pdf->Output();



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);//B es negrita
// $pdf->Cell(40,10,'¡Hola, Mundo!');
while($row=$resultado->fetch_assoc())
{
    $pdf->Cell(40,10,$row["id"],1,0,'C',0);
    $pdf->Cell(40,10,$row["idCli"],1,0,'C',0);
    $pdf->Cell(60,10,$row["fecha"],1,1,'C',0);
    //$pdf->Cell(40,10,$row["NombreColuma3BD"],1,1,'C',0);//salto de line 2do 1
    //          40,10 tamano de las celdas


}
$pdf->Output();
?>