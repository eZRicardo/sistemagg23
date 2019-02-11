<?php
	session_start();
	include 'connection.php';

	$campos = $_SESSION['formassociado'] = $_GET;

	if(isset($campos['modo'])){
		$modo = $campos['modo'];
	} else {
		header("Location:associado.php");
	}

	$idAssociado = $campos['idAssociado'];

	// Validar se nome e cpf são únicos
	$sql = "SELECT nome, cpf FROM associado A
					INNER JOIN dados_associado DA ON A.id = DA.id_associado ";
				if($idAssociado){
					$sql .= "WHERE A.id <> ".$idAssociado;
				}
	$result = $conn->query($sql);
	if($result){
		while($row = $result->fetch_assoc()){
			$tabela['nome'][] = $row['nome'];
			$tabela['cpf'][] = $row['cpf'];
		}
	} else {
		die("Erro na query: ".$sql);
	}

	$msgerro = [];
	$invalido = false;

	foreach ($tabela['nome'] as $key => $value) {
		if($value && $campos['nome'] == $value){
			$msgerro['nome'] = "(Nome já está cadastrado!)";
			$invalido = true;
		}
	}

	foreach ($tabela['cpf'] as $key => $value) {
		if($value && $campos['cpf'] == $value){
			$msgerro['cpf'] = "(Cpf já cadastrado!)";
			$invalido = true;
		}
	}

	if($invalido){
		$_SESSION['formassociado']['msgerro'] = $msgerro;
		$urlvoltar = "modo=".$modo;
		if($modo != "cadastrar"){
			$urlvoltar .= "&idAssociado=$idAssociado";
		}
		header('Location: formassociado.php?'.$urlvoltar);
		die;
	}
	//Fim da Validação

	if($modo=="cadastrar"){
			$nome = $campos['nome'];
			$setor = $campos['setor'];
			$engenharia = $campos['curso'];
			$dataNascimento = $campos['dataNascimento'];
			$endereco = $campos['endereco'];
			$bairro = $campos['bairro'];
			$cidade = $campos['cidade'];
			$uf = $campos['uf'];
			$cep = $campos['cep'];
			$telefone = $campos['telefone'];
			$celular = $campos['celular'];
			$email = $campos['email'];
			$curso = $campos['curso'];
			$periodo = $campos['periodo'];
			$turno = $campos['turno'];
			$rg = $campos['rg'];
			$cpf = $campos['cpf'];
			$setor = $campos['setor'];

			$sql = "INSERT INTO associado (nome, id_setor, id_engenharia) 
							VALUES ('$nome', $setor, $engenharia);";
			$sql .= "INSERT INTO dados_associado (id_associado, id_curso,data_nascimento, endereco, 
								bairro,cidade, uf, cep, telefone, celular, email, periodo, turno, rg, cpf) 
							VALUES (LAST_INSERT_ID(), $engenharia, '$dataNascimento', '$endereco', '$bairro', '$cidade'
								, '$uf', '$cep', '$telefone', '$celular', '$email', '$periodo', '$turno', '$rg', '$cpf')";
			$result = $conn->multi_query($sql);
			if($result){
				$_SESSION['formassociado'] = "";
				header("Location: formassociado.php?modo=cadastrar&response=Cadastro realizado com sucesso");
			} else {
				echo $conn->error;
				die($sql);
			}
	} else {
		if(isset($campos['idAssociado'])){
			$idAssociado = $campos['idAssociado'];
		} else {
			die("ERRO: Não foi passado nenhum id como parametro");
		}
		if($modo=="delete"){
			//verificar permissão - Será feito depois no projeto
			$sql = "DELETE FROM associado WHERE id = $idAssociado ";
			$result = $conn->query($sql);
			if($result){
				header("Location: associado.php");
			} else {
				echo $sql;
				die("Erro ao remover do banco de dados");
			}
		} else if($modo=="edit"){
			if(isset($campos['nome'])){
				$nome = $campos['nome'];
				$setor = $campos['setor'];
				$engenharia = $campos['curso'];
				$dataNascimento = $campos['dataNascimento'];
				$endereco = $campos['endereco'];
				$bairro = $campos['bairro'];
				$cidade = $campos['cidade'];
				$uf = $campos['uf'];
				$cep = $campos['cep'];
				$telefone = $campos['telefone'];
				$celular = $campos['celular'];
				$email = $campos['email'];
				$curso = $campos['curso'];
				$periodo = $campos['periodo'];
				$turno = $campos['turno'];
				$rg = $campos['rg'];
				$cpf = $campos['cpf'];
				$setor = $campos['setor'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}
			$sql = "UPDATE associado SET nome = '$nome', id_setor = $setor, id_engenharia = $engenharia WHERE id = $idAssociado;";
			$sql .= "UPDATE dados_associado SET data_nascimento = '$dataNascimento', endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', uf = '$uf', cep = '$cep', telefone = '$telefone', celular = '$celular', email = '$email', id_curso = '$curso', periodo = '$periodo', turno = '$turno', rg = '$rg', cpf = '$cpf' WHERE id_associado = $idAssociado";

			$result = $conn->multi_query($sql);
			if($result){
				$_SESSION['formassociado'] = "";
				header("Location: formassociado.php?idAssociado=$idAssociado&modo=edit&response=Alterado com sucesso");
			} else {
				die("Erro ao alterar no banco de dados");
			}
		}
	}
?>