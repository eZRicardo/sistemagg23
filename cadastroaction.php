<?php
session_start();
include 'connection.php';

global $setor;
global $engenharia;
global $nome;
global $login;
global $senha;

$setor = $_POST['setor'];
$engenharia = $_POST['eng'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];


$sql = "INSERT INTO associado(nome,login,senha,id_engenharia) VALUES('$nome','$login','$senha',
	   '$engenharia','$setor')";

$result = $conn->query($sql);


if($result){

	echo "SUCCESS";

}else{

	echo "Falha ao inserir os dados do cadastro";
}

if($setor == " " || $engenharia == " " || $login == " " || $senha == " " || $nome == " ")

    echo "Dados insuficientes para o cadastro";

?>
