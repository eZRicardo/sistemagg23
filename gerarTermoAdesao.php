<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';


	$nome = "";
  $data = "";
	$disabled = "";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario Adesao</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/gerarTermoAdesao.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formengenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php include 'navbar.html'; ?>
	<div id="formularioEng">
	  <div class="form-group">
	    <label>Nome:</label>
	    <input class="form-control" <?php echo $disabled; ?> name="nome" id="nomeAssociado" value="<?php echo $nome; ?>">
      <label>Data:</label>
      <input class="form-control" <?php echo $disabled; ?> name="data" id="dataAssociacao" value="<?php echo $data; ?>">
	  </div>
	  <input type="hidden" name="modo" value="<?php echo $_GET['modo']; ?>">
	  <input type="hidden" name="id" id="idEngenharia" value="<?php echo $_GET['id']; ?>">
	  <button onclick="window.open('imprimeTermoAdesao.php');" class="btn btn-warning" <?php echo $disabled; ?>>Gerar Formulário</button>
	  <label id="labelResponse"></label>
	</div>
</body>
</html>
