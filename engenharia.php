<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';
	include 'util/filtro.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Engenharias</title>
	<link rel="stylesheet" type="text/css" href="css/engenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
	<h2>Engenharias</h2>
	<table id="tabelaengenharias" class="table table-striped">
		<thead>
			<th>Nome</th>
			<th>Qtd de pessoas</th>
		</thead>
		<?php 
			$sql = "SELECT E.id, E.nome, (SELECT count(*) FROM associado A WHERE A.id_engenharia = E.id) as qtdpessoas FROM engenharia E ";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row['nome']."</td>";
				echo "<td>".$row['qtdpessoas']."</td>";
				echo "</tr>";
			}
		?>
	</table>
</center>
</body>
</html>