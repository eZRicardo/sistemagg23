<?php
    error_reporting(0);
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
	<title>Tipo Falta</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/tipofaltatable.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<center>
	<br>
	<table>
	<tr>
		<td><a href="formtipofalta.php?modo=cadastrar"><img src="assets/cadastrarbutton.png">Cadastrar</a></td>
    </tr>
    
    <input type="button" class="btn btn-warning" onclick="voltar()" value="Voltar">
    <br>
    <br>
    
	</table>
	<br>
	<h2>Tipo Falta</h2>
	<table id="tabelatipofalta" class="table table-striped">
		<thead>
			<th>Bandeira</th>
			<th>Peso</th>
			<th></th>
		</thead>
		<?php 
			$sql = "SELECT id ,nome , peso FROM tipofalta ORDER BY peso ASC";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$row['nome']."</td>";
				echo "<td>".$row['peso']."</td>";
				 $viewbutton = "<a href='formtipofalta.php?modo=view&id=$row[id]'><img src='assets/viewbutton.png'></a> ";
				 $editbutton = "<a href='formtipofalta.php?modo=edit&id=$row[id]'><img src='assets/editbutton.png'></a> ";
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