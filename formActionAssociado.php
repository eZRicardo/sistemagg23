<?php
	session_start();
	include 'connection.php';

	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
	} else {
		header("Location:engenharia.php");
	}

	if($modo=="cadastrar"){
			if(isset($_GET['nomeAssociado'])){
				$nomeAssociado = $_GET['nomeAssociado'];
				$idSetor = $_GET['idSetor'];
				$idEngenharia = $_GET['idEngenharia'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}
			$sql = "INSERT INTO associado (nome, id_setor, id_engenharia) VALUES ('$nomeAssociado', $idSetor, $idEngenharia)";
			$result = $conn->query($sql);

			if($result){
				die("SUCCESS");
			} else {
				die("Erro ao cadastrar engenharia no banco");
			}
	} else {
		if(isset($_GET['idAssociado'])){
			$idAssociado = $_GET['idAssociado'];
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
				die("Erro ao remover do banco de dados");
			}
		} else if($modo=="edit"){
			if(isset($_GET['nomeAssociado'])){
				$nomeAssociado = $_GET['nomeAssociado'];
				$idSetor = $_GET['idSetor'];
				$idEngenharia = $_GET['idEngenharia'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}
			$sql = "UPDATE associado SET nome = '$nomeAssociado', id_setor = $idSetor, id_engenharia = $idEngenharia WHERE id = $idAssociado";
			$result = $conn->query($sql);
			if($result){
				die("SUCCESS");
			} else {
				die("Erro ao alterar no banco de dados");
			}
		}
	}
?>