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
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="js/jquery-3.3.1.js"></script>
</head>
<body>
	<?php include 'navbar.html'; ?>
	<center>
	<h3>Clique em um setor na barra de navegação para abrir o seu menu</h3>	
	</center>
</body>
</html>
