<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: logout.php");
}

include 'connection.php';
require('fpdf.php');

$id = $_GET['id'];
$dataAssociacao = date("d/m/Y",strtotime($_GET['data']));

$sql = "SELECT A.nome as nome, E.nome as engenharia, S.nome as setor FROM associado A
				INNER JOIN engenharia E on A.id_engenharia = E.id 
				INNER JOIN setor S ON A.id_setor = S.id 
				WHERE A.id = $id";

$result = $conn->query($sql);

$nome = "";
$engenharia = "";
$setor = "";
if($row = $result->fetch_assoc()){
	$nome = $row['nome'];
	$engenharia = $row['engenharia'];
	$setor = $row['setor'];
}


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Nome: ');
$pdf->Cell(40,10, $nome);
$pdf->Cell(40,10,'Data: ');
$pdf->Cell(40,10,$dataAssociacao);
$pdf->Cell(40,10,'Engenharia: ');
$pdf->Cell(40,10, $engenharia);
$pdf->Cell(40,10,'Setor: ');
$pdf->Cell(40,10,$setor);

$pdf->Output('I',$nome.'.pdf');
?>
