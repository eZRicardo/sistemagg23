<?php
	if(!$_SESSION['id']){
		header("Location: logout.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<script src="js/jquery-3.3.1.js"></script>
</head>
<body>
	<?php include 'navbar.html'; ?>
	<br>
	<br>
	<center>
		<a class="btn btn-secondary" href="associado.php">Associado</a>
	</center>
</body>
</html>