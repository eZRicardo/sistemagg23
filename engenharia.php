<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Engenharias</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/engenharia.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/engenharia.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
	<br>
	<table>
	<tr>
		<td><a href="formengenharia.php?modo=cadastrar"><img src="assets/cadastrarbutton.png">Cadastrar</a></td>
	</tr>
	</table>
	<br>
	<h2>Engenharias</h2>
	<table id="tabelaengenharias" class="table table-striped">
		<thead>
			<th>Nome</th>
			<th>Qtd de pessoas</th>
			<th></th>
		</thead>
		<?php 
			$sql = "SELECT E.id, E.nome, (SELECT count(*) FROM associado A WHERE A.id_engenharia = E.id) as qtdpessoas FROM engenharia E ORDER BY E.nome";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row['nome']."</td>";
				echo "<td>".$row['qtdpessoas']."</td>";

				$viewbutton = "<a href='formengenharia.php?modo=view&id=$row[id]'><img src='assets/viewbutton.png'></a> ";
				$editbutton = "<a href='formengenharia.php?modo=edit&id=$row[id]'><img src='assets/editbutton.png'></a> ";
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