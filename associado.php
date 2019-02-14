<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: logout.php");
}

include 'connection.php';
include 'util/filtro.php';
error_reporting(0);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Associados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/associado.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/associado.js"></script>
</head>
<body>
<?php include 'navbar.html'; ?>
<?php gerarFiltro(['Engenharia','Setor']); ?>
<center>
<br>
<table>
<tr>
	<td><a href="formassociado.php?modo=cadastrar"><img src="assets/cadastrarbutton.png">Cadastrar</a></td>
</tr>
</table>
<br>
<h1>Associados</h1>
<table id="tabelaassociados" class="table table-striped">
<thead>
	<th>Nome</th>
	<th>Setor</th>
	<th>Engenharia</th>
	<th></th>
</thead>
<?php

	$sql = "SELECT A.id, A.nome, S.nome as setor, E.nome as engenharia FROM associado A 
					INNER JOIN setor S ON A.id_setor = S.id 
					INNER JOIN engenharia E ON A.id_engenharia = E.id WHERE 1=1 ";

	if($_GET['engenharia']){
		$sql .= " AND E.id = ".$_GET['engenharia'];
	}
	if($_GET['setor']){
		$sql .= " AND S.id = ".$_GET['setor'];
	}

	$sql .= "ORDER BY A.nome;";

	$result = $conn->query($sql);

	if(!$result){
		echo "ERRO NA EXECUÇÃO DA QUERY: <br>";
		echo $sql;

		die;
	}

	while($row = $result->fetch_assoc()){
		echo "<tr>";
		echo "<td>$row[nome]</td>";
		echo "<td>$row[setor]</td>";
		echo "<td>$row[engenharia]</td>";

		$viewbutton = "<a href='formassociado.php?modo=view&idAssociado=$row[id]'><img src='assets/viewbutton.png'></a> ";
		$editbutton = "<a href='formassociado.php?modo=edit&idAssociado=$row[id]'><img src='assets/editbutton.png'></a> ";
		$deletebutton = "<a href='javascript:deletebutton($row[id])'><img src='assets/deletebutton.png'></a> ";
		$links = $viewbutton.$editbutton.$deletebutton;

		echo "<td>".$links."</td>";
		echo "</tr>";
	}

?>
</table>
</center>

</body>
</html>