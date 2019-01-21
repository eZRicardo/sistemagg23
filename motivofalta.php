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
	<title>Motivo Falta</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/motivofalta.js"></script>
	<link rel="stylesheet" type="text/css" href="css/motivofalta.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
	<br>
	<table>
	<tr>
		<td><a href="formmotivofalta.php?modo=cadastrar"><img src="assets/cadastrarbutton.png">Cadastrar</a></td>
	</tr>
	</table>
	<br>
	<h2>Motivos Falta</h2>
	<table id="tabelamotivofaltas" class="table table-striped">
		<thead>
			<th>Nome</th>
			<th>Tipo de Falta</th>
			<th></th>
		</thead>
		<?php 
			$sql = "SELECT MF.id, MF.nome as motivonome, TF.nome as tiponome FROM motivofalta MF 
			INNER JOIN tipofalta TF ON MF.id_tipofalta = TF.id ";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row['motivonome']."</td>";
				echo "<td>".$row['tiponome']."</td>";

				$viewbutton = "<a href='formmotivofalta.php?modo=view&id=$row[id]'><img src='assets/viewbutton.png'></a> ";
				$editbutton = "<a href='formmotivofalta.php?modo=edit&id=$row[id]'><img src='assets/editbutton.png'></a> ";
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