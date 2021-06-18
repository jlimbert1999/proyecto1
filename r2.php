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
    $this->Cell(30,10,'Reporte de platos',0,0,'C');//
    // Salto de línea
    $this->Ln(20);

    $this->Cell(35,10,"ID Cliente",1,0,'C',0);
    $this->Cell(80,10,"Nombre Plato",1,0,'C',0);
    $this->Cell(30,10,"Precio",1,0,'C',0);
    $this->Cell(40,10,"Existencia",1,1,'C',0);

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
$consulta="SELECT * FROM platos";
$resultado=$mysqli->query($consulta);




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);//B es negrita
// $pdf->Cell(40,10,'¡Hola, Mundo!');
while($row=$resultado->fetch_assoc())
{
    $pdf->Cell(35,10,$row["id"],1,0,'C',0);
    $pdf->Cell(80,10,$row["nombre"],1,0,'C',0);
    $pdf->Cell(30,10,$row["precio"],1,0,'C',0);
    $pdf->Cell(40,10,$row["existencia"],1,1,'C',0);
    //$pdf->Cell(40,10,$row["NombreColuma3BD"],1,1,'C',0);//salto de line 2do 1
    //          40,10 tamano de las celdas

    
}
$pdf->Output();
?>