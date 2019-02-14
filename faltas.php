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
	<title>Faltas</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/falta.js"></script>
	<link rel="stylesheet" type="text/css" href="css/falta.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
	<br>
	<table>
	<tr>
		<td><a href="formfalta.php?modo=cadastrar"><img src="assets/cadastrarbutton.png">Cadastrar</a></td>
	</tr>
	</table>
	<br>
	<h2>Faltas Registradas</h2>
	<table id="tabelamotivofaltas" class="table table-striped">
		<thead>
			<th>Nome do associado</th>
			<th>Data</th>
			<th>Motivo da falta</th>
		</thead>
			<?php 
			$sql = "SELECT F.id, F.data as faltadata,MF.nome as motivofalta, A.nome as associadonome FROM falta F 
			INNER JOIN associado A ON F.id_associado = A.id
			INNER JOIN motivofalta MF ON F.id_motivofalta = MF.id ";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row['associadonome']."</td>";
				echo "<td>".$row['faltadata']."</td>";
				echo "<td>".$row['motivofalta']."</td>";

				$viewbutton = "<a href='formfalta.php?modo=view&id=$row[id]'><img src='assets/viewbutton.png'></a> ";
				$editbutton = "<a href='formfalta.php?modo=edit&id=$row[id]'><img src='assets/editbutton.png'></a> ";
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
