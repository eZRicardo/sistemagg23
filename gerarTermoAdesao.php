<?php
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';

	$id = "";
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
	    <select class="form-control" <?php echo $disabled; ?> name="id" id="idAssociado" value="<?php echo $id; ?>">
	    	<option value=""></option>
	    	<?php
	    	$sql = "SELECT id, nome FROM associado ORDER BY nome";
	    	$result = $conn->query($sql);
	    	while($row = $result->fetch_assoc()){
	    		echo "<option value='".$row['id']."'>".$row['nome']."</option>";
	    	}
	    	?>
	    	<option value="TODOS">TODOS</option>
	    </select>
      <label>Data:</label>
      <input type="date" class="form-control" <?php echo $disabled; ?> name="data" id="dataAssociacao" value="<?php echo $data; ?>">
	  </div>
	  <button onclick="javascript:enviar();" class="btn btn-warning" <?php echo $disabled; ?>>Gerar Formulário</button>
	  <label id="labelResponse"></label>
	</div>
</body>
</html>
