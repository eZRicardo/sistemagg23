<?php
	session_start();
	include 'connection.php';

	if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
	} else {
		header("Location:engenharia.php");
	}

	if($modo=="cadastrar"){
			if(isset($_GET['nome'])){
				$nome = $_GET['nome'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}
			$sql = "INSERT INTO engenharia (nome) VALUES ('$nome')";
			$result = $conn->query($sql);

			if($result){
				die("SUCCESS");
			} else {
				die("Erro ao cadastrar engenharia no banco");
			}
	} else {
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		} else {
			die("ERRO: Não foi passado nenhum id como parametro");
		}
		if($modo=="delete"){
			//verificar permissão - Será feito depois no projeto
			$sql = "DELETE FROM engenharia WHERE id = $id ";
			$result = $conn->query($sql);
			if($result){
				header("Location: engenharia.php");
			} else {
				die("Erro ao remover do banco de dados");
			}
		} else if($modo=="edit"){
			if(isset($_GET['nome'])){
				$nome = $_GET['nome'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}
			$sql = "UPDATE engenharia SET nome = '$nome' WHERE id = $id";
			$result = $conn->query($sql);
			if($result){
				die("SUCCESS");
			} else {
				die("Erro ao alterar no banco de dados");
			}
		}
	}
?>