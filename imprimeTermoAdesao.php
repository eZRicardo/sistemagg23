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


class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
		$this->Cell(150);
    $this->Image('assets/logoPJ.png',12,8,25);
    // Arial bold 15
    $this->SetFont('Arial','',8);
    // Move to the right

    // Title
		$this->Ln(10);
		$this->Cell(100);
    $this->Cell(15,5,'Empresa Junior de Engenharia da Escola Politecnica de Pernambuco',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',7);
    // Page number
		$this->Cell(95);
    $this->Cell(15,5,'Empresa Junior de Engenharia da Escola Politecnica de Pernambuco',0,0,'C');
		$this->Ln(4);
		$this->Cell(95);
		$this->Cell(15,5,'Rua Benfica, 455 - Madalena - Recife/PE',0,0,'C');
		$this->Ln(4);
		$this->Cell(95);
		$this->Cell(15,5,'Fone: 3184-7554',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Nome: ');
$pdf->Cell(40,10, $nome);
$pdf->Ln(5);
$pdf->Cell(40,10,'Data: ');
$pdf->Cell(40,10,$dataAssociacao);
$pdf->Ln(5);
$pdf->Cell(40,10,'Engenharia: ');
$pdf->Cell(40,10, $engenharia);
$pdf->Ln(5);
$pdf->Cell(40,10,'Setor: ');
$pdf->Cell(40,10,$setor);

$pdf->Output('I',$nome.'.pdf');
?>
