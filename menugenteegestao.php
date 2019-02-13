<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/menugenteegestao.css">
	<script src="js/jquery-3.3.1.js"></script>
</head>
<body>
	<?php include 'navbar.html'; ?>
	<br>
	<br>
	<center>
		<a class="btn btn-secondary" href="associado.php">Associado</a><br>
		<a class="btn btn-secondary" href="engenharia.php">Engenharia</a><br>
		<a class="btn btn-secondary" href="associado.php">Setor</a><br>
		<a class="btn btn-secondary" href="faltas.php">Faltas</a><br>
		<a class="btn btn-secondary" href="motivofalta.php">Motivo Falta</a><br>
		<a class="btn btn-secondary" href="gerarTermoAdesao.php">Gerar Documento</a><br>
	</center>
</body>
</html>