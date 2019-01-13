<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';
	
	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
	} else {
		header("Location: engenharia.php");
	}

	function getId(){
		global $id;
		if(isset($_GET['id'])){	
			$id = $_GET['id'];
		} else {
			header("Location: engenharia.php");
		}
	}

	function getFields(){
		
		global $id;
		global $conn;

		getId();

		$sql = "SELECT id, nome FROM engenharia WHERE id = $id";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		global $nome;

		$nome = $row['nome'];
	}

	if($modo=="view" || $modo=="edit"){
		getFields();
	} else if($modo=="delete"){
		//verificar permissão - Será feito depois no projeto
		getId();
		$sql = "DELETE FROM engenharia WHERE id = $id ";
		$result = $conn->query($sql);
		if($result){
			die("SUCCESS");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario Engenharia</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script type="js/formengenharia.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formengenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php include 'navbar.html'; ?>
	<center>
		<table class="table table-striped">
			<thead>
				<th>Nome</th>
			</thead>
			<tr>
				<td><?php echo $nome; ?></td>
			</tr>
		</table>
	</center>
</body>
</html>