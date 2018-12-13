<?php
session_start();
include 'connection.php';

$modo = "";
if(isset($_SESSION['modo']))
    $modo = $_SESSION['modo'];

$login = "";
if(isset($_SESSION['login'])){
    $login = $_SESSION['login'];
}    
$senha = "";
if(isset($_SESSION['password'])){
    $senha = $_SESSION['password'];
}
if($modo == 'inserir'){

    $sql = "SELECT `login`,`senha` FROM `info` WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row){
		echo "<script> alert('Login realizado com sucesso');</script>";
	}else{
		echo "<script> alert('Senha ou Login incorreto');</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
	<title>Login</title>
</head>
<body class="bod">
	<div class="dados">
		<br>
		<br>
		<center><h2 style=" color:blackS;">Login:</h2></center>
		<form method="post" action="login.php">
			<div class="dados-forma">
				<label>Login:</label>
				<input placeholder="Digite o seu login" name="login" type="text" required>
			</div>
			<div class="dados-forma2">
				<br>
				<label>Senha:</label>
				<input placeholder="Digite a sua senha" name="password" type="password" required>
			</div>
			<br>
			<input type="hidden" name="modo" value="inserir">
			<button class="btton" type="submit">login</button>
			<br>		
		</form>
	</div>
</body>
</html>