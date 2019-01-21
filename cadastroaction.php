<?php
session_start();
include 'connection.php';

global $setor;
global $engenharia;
global $nome;
global $login;
global $password;
global $modo;

$setor = $_POST['setor'];
$engenharia = $_POST['engenharia'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$password = $_POST['password'];
$modo = $_POST['modo'];


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
			}if(isset($_GET['password'])){
				$password = $_GET['password'];
			} else {
				die("ERRO: Não foi passado senha como parametro para o cadastro");
			}
			$md5_password = md5($password);
			$sql = "INSERT INTO associado(nome,login,senha,id_engenharia,id_setor) VALUES('$nome','$login','$password','$engenharia','$setor')";
			$result = $conn->query($sql);

			if($result){
				echo "SUCCESS";
			} else {
				die("Erro ao cadastrar engenharia no banco");
			}
		}
?>

