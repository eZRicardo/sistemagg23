<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: logout.php");
}

include 'connection.php';

global $setor;
global $nome;
global $engenharia;

if(isset($_GET['setor'])){
	$setor = $_GET['setor'];
}
if(isset($_GET['nome'])){
	$nome = $_GET['nome'];
}
if(isset($_GET['engenharia'])){
	$engenharia = $_GET['engenharia'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Associados</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/associado.css">
	<script src="js/jquery-3.3.1.js"></script>
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
<h1>Associados</h1>
<table id="tabelaassociados" class="table table-striped">
<thead>
	<th>Nome</th>
	<th>Setor</th>
	<th>Engenharia</th>
	<th></th>
</thead>
<?php

	$sql = "SELECT A.nome, S.nome as setor, E.nome as engenharia FROM associado A 
					INNER JOIN setor S ON A.id_setor = S.id 
					INNER JOIN engenharia E ON A.id_engenharia = E.id ";

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
		echo "<td></td>";
		echo "</tr>";
	}

?>
</table>
</center>

</body>
</html>