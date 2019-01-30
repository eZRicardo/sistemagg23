<?php
session_start();

if(!isset($_SESSION['id'])){
	header("Location: logout.php");
}

include 'connection.php';

global $setor;
global $engenharia;
global $nome;
global $login;
global $senha;
global $modo;

$setor = $_POST['setor'];
$engenharia = $_POST['engenharia'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];

if(isset($_GET['modo'])){
		$modo = $_GET['modo'];
	} else {
		header("Location:engenharia.php");
	}

	if($modo=="cadastrar"){
			if(isset($_GET['nome']) AND !empty($_POST['nome'])){
				$nome = $_GET['nome'];
			} else {
				die("ERRO: Não foi passado nome como parametro para o cadastro");
			}if(isset($_GET['senha']) AND !empty($_POST['senha'])){
				$senha = $_GET['senha'];
			} else {
				die("ERRO: Não foi passado senha como parametro para o cadastro");
			}if(isset($_GET['login']) AND !empty($_POST['login'])){
				$login = $_GET['login'];
			} else {
				die("ERRO: Não foi passado login como parametro para o cadastro");
			}
			$sql = "INSERT INTO associado(nome,login,senha,id_engenharia,id_setor) VALUES('$nome','$login','$senha','$engenharia','$setor')";

			$result = $conn->query($sql);
		
			if($result){
				echo "SUCCESS";
			} else {
				die("Erro ao cadastrar no banco");
			}
		}
?>