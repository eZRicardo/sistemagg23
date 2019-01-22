<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}

	include 'connection.php';
	
	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
	} else {
		header("Location: associado.php");
	}

	function getId(){
		global $idAssociado;
		if(isset($_GET['idAssociado'])){	
			$idAssociado = $_GET['idAssociado'];
		} else {
			header("Location: associado.php");
		}
	}

	function getFields(){
		
		global $idAssociado;
		global $conn;

		getId();

		$sql = "SELECT A.id, A.nome as nome, E.nome as engenharia, E.id as idEngenharia, S.nome as setor, S.id as idSetor FROM associado A 
		INNER JOIN engenharia E ON A.id_engenharia = E.id
		INNER JOIN setor S ON A.id_setor = S.id WHERE A.id = $idAssociado ";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		global $nome;
		global $engenharia;
		global $idEngenharia;
		global $setor;
		global $idSetor;

		$nome = $row['nome'];
		$engenharia = $row['engenharia'];
		$idEngenharia = $row['idEngenharia'];
		$setor = $row['setor'];
		$idSetor = $row['idSetor'];
	}

	$nome = "";
	$disabled = "";

	if($modo=="view" || $modo=="edit"){
		getFields();
		if($modo == "view")
			$disabled = "disabled";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario Associado</title>
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/formassociado.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/formassociado.css">
</head>
<body>
	<?php include 'navbar.html'; ?>
	<div id="formularioAssociado">
	  <div class="form-group">
	    <label>Nome:</label>
	    <input class="form-control" <?php echo $disabled; ?> name="nome" id="nomeAssociado" value="<?php echo $nome; ?>">
	    <label>Engenharia:</label>
	    <select class="form-control" name="idEngenharia" id="idEngenharia" <?php echo $disabled; ?>>
	    	<option value=""></option>
	    	<?php
	    	$sql = "SELECT id, nome FROM engenharia ORDER BY nome";
	    	$result = $conn->query($sql);
	    	while($row = $result->fetch_assoc()){
	    		$selected = "";
	    		if($idEngenharia == $row['id']){
	    			$selected = "selected";
	    		}
	    		echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
	    	}
	    	?>
	    </select>
	    <label>Setor:</label>
	    <select class="form-control" name="idSetor" id="idSetor" <?php echo $disabled; ?>>
	    	<option value=""></option>
	    	<?php
	    	$sql = "SELECT id, nome FROM setor ORDER BY nome";
	    	$result = $conn->query($sql);
	    	while($row = $result->fetch_assoc()){
	    		$selected = "";
	    		if($idSetor == $row['id']){
	    			$selected = "selected";
	    		}
	    		echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
	    	}
	    	?>
	    </select>
	  </div>
	  <input type="hidden" name="modo" value="<?php echo $_GET['modo']; ?>">
	  <input type="hidden" name="id" id="idAssociado" value="<?php echo $_GET['idAssociado']; ?>">
	  <?php if(!$disabled){ ?>
	  <button onclick="javascript:submit(this.value);" class="btn btn-warning" value="<?php echo $modo; ?>">Enviar</button>
	  <label id="labelResponse"></label>
	  <?php } ?>
	</div>
</body>
</html>