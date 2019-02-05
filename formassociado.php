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

		$sql = "SELECT A.nome as nome, S.id as setor, E.id as engenharia, DA.data_nascimento as dataNascimento, DA.endereco, DA.bairro, DA.cidade, DA.uf, DA.cep, DA.telefone, DA.celular, DA.email, DA.id_curso as curso, DA.periodo, DA.turno, DA.rg, DA.cpf  FROM associado A 
		INNER JOIN engenharia E ON A.id_engenharia = E.id
		INNER JOIN setor S ON A.id_setor = S.id
		INNER JOIN dados_associado DA on A.id = DA.id_associado
		WHERE A.id = $idAssociado ";
		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		global $nome;
		global $setor;
		global $engenharia;
		global $dataNascimento;
		global $endereco;
		global $bairro;
		global $cidade;
		global $uf;
		global $cep;
		global $telefone;
		global $celular;
		global $email;
		global $curso;
		global $periodo;
		global $turno;
		global $rg;
		global $cpf;
		global $setor;

		$nome = $row['nome'];
		$setor = $row['setor'];
		$engenharia = $row['engenharia'];
		$dataNascimento = $row['dataNascimento'];
		$endereco = $row['endereco'];
		$bairro = $row['bairro'];
		$cidade = $row['cidade'];
		$uf = $row['uf'];
		$cep = $row['cep'];
		$telefone = $row['telefone'];
		$celular = $row['celular'];
		$email = $row['email'];
		$curso = $row['curso'];
		$periodo = $row['periodo'];
		$turno = $row['turno'];
		$rg = $row['rg'];
		$cpf = $row['cpf'];
		$setor = $row['setor'];
	}

	$nome = "";
	$disabled = "";

	if($modo=="view" || $modo=="edit"){
		getFields();
		if($modo == "view"){
			$disabled = "disabled";
		}
	} else {
		$idAssociado = "";
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
	<form action="formActionAssociado.php" method="get" id="formularioAssociado">
	  <div class="form-group">
	    <label>Nome Completo:</label>
	    <input class="form-control" <?php echo $disabled; ?> name="nome" id="nome" value="<?php echo $nome; ?>" required>
	    <label>Data de Nascimento:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="date" name="dataNascimento" id="dataNascimento" value="<?php echo $dataNascimento; ?>">
	    <label>Endereço:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>">
	    <label>Bairro:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" name="bairro" id="bairro" value="<?php echo $bairro; ?>">
	    <label>Cidade:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" name="cidade" id="cidade" value="<?php echo $cidade; ?>">
	    <label>UF:</label>
	    <select class="form-control" <?php echo $disabled; ?> name="uf" id="uf">
	    	<option value=""></option>
	    	<?php
	    	$arrayUf = ['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'];
	    	foreach ($arrayUf as $key => $uf) {
	    		echo "<option value='$uf'>$uf</option>";
	    	}
	    	?>
	    </select>
	    <label>CEP:</label>
		  <input class="form-control" <?php echo $disabled; ?> pattern="[0-9]{8}$" type="text" name="cep" id="cep">
		  <label>Telefone:</label>
		  <input class="form-control" <?php echo $disabled; ?> type="tel" maxlength="15" pattern="[0-9]{7,10}$" name="telefone" id="telefone">
		  <label>Celular:</label>
		  <input class="form-control" <?php echo $disabled; ?> type="tel" maxlength="15" pattern="[0-9]{7,10}$" name="celular" id="celular">
	    <label>E-mail:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="E-mail" name="email" id="email"
	    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
	    <label>Curso:</label>
	    <select class="form-control" name="curso" id="curso" <?php echo $disabled; ?> required>
	    	<option value=""></option>
	    	<?php
	    	$sql = "SELECT id, nome FROM engenharia ORDER BY nome";
	    	$result = $conn->query($sql);
	    	while($row = $result->fetch_assoc()){
	    		$selected = "";
	    		if($engenharia == $row['id']){
	    			$selected = "selected";
	    		}
	    		echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
	    	}
	    	?>
	    </select>
	    <label>Período:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" maxlength="15" pattern="[0-9]{4}.[1-2]$" name="periodo" id="periodo">
	    <label>Turno:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" name="turno" id="turno">
	    <label>RG:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" maxlength="15" pattern="[0-9]{7}$" name="rg" id="rg">
	    <label>CPF:</label>
	    <input class="form-control" <?php echo $disabled; ?> type="text" maxlength="15" pattern="[0-9]{11}$" name="cpf" id="cpf">
	    <label>Setor:</label>
	    <select class="form-control" name="setor" id="setor" <?php echo $disabled; ?> required>
	    	<option value=""></option>
	    	<?php
	    	$sql = "SELECT id, nome FROM setor ORDER BY nome";
	    	$result = $conn->query($sql);
	    	while($row = $result->fetch_assoc()){
	    		$selected = "";
	    		if($setor == $row['id']){
	    			$selected = "selected";
	    		}
	    		echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
	    	}
	    	?>
	    </select>
	  </div>
	  <input type="hidden" name="modo" value="<?php echo $_GET['modo']; ?>">
	  <input type="hidden" name="idAssociado" id="idAssociado" value="<?php echo $idAssociado; ?>">
	  <?php if(!$disabled){ ?>
	  <input type="submit" class="btn btn-warning">
	  <label id="labelResponse"></label>
	  <?php } ?>
	</form>
</body>
</html>