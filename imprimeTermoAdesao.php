<?php

session_start();
include 'connection.php';

$nome = $_GET['nome'];
$dataAssociacao = $_GET['data'];
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Nome: ');
$pdf->Cell(40,10, $nome);
$pdf->Cell(40,10,'Data: ');
$pdf->Cell(40,10,$dataAssociacao);
$pdf->Output();
?>
