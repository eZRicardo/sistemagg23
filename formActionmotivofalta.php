<?php 

session_start();

if(!$_SESSION['id']){
    header("Location: logout.php");
}

INCLUDE 'connection.php';

$id = $_GET['id'];
$nome = $_GET['nome'];
$tipofalta = $_GET['tipofalta'];

$consulta = "SELECT nome, id_tipofalta FROM motivofalta WHERE id='$id'";
$check = $conn->query($consulta);
$check->fetch_assoc();


if($nome=="" or $id_tipofalta==""){
die("Campo em branco, favor preencher.");
}

else{
if($check->num_rows>0){
die("Motivo já cadastrado");
}

else{
$inserirdados = "INSERT INTO motivofalta (nome,id_tipofalta) VALUES ('$nome','$id_tipofalta') ";
$result = $conn->query($inserirdados);

if($result){
    die("Cadastrado no sistema com sucesso");
    header("location: motivofalta.php");
}
 else{
     echo ($inserirdados);
    die("Infelizmente não foi possível realizar seu cadastro");
}
}
}
?>