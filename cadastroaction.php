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

$sql_1 = "INSERT INTO setor(nome) VALUES('$setor')";
$sql_2 = "INSERT INTO engenharia(nome) VALUES('$engenharia')";
$sql_3 = "INSERT INTO associado(nome,login,senha) VALUES('$nome','$login','$senha')";

if($setor == " " || $engenharia == " " || $login == " " || $senha == " " || $nome == " "){

    echo "Dados insuficientes para o cadastro";

}else{

$inserir = mysql_query($sql_1,sql_2,sql_3);

}
?>

