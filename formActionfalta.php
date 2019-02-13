<?php 

session_start();

if(!$_SESSION['id']){
    header("Location: logout.php");
}

INCLUDE 'connection.php';

$id = $_GET['id'];
$data = $_GET['data'];
$id_motivofalta = $_GET['id_motivofalta'];
$id_associado = $_GET['id_associado'];

$consulta = "SELECT data, id_motivofalta, id_associado FROM falta WHERE id='$id'";

$check = $conn->query($consulta);
$check->fetch_assoc();


if($id_motivofalta=="" or $data==""){
die("Campo em branco, favor preencher.");
}


else{
$inserirdados = "INSERT INTO falta (data,id_motivofalta, id_associado) VALUES ('$data','$id_motivofalta', $id_associado) ";
$result = $conn->query($inserirdados);

if($result){
    die("Cadastrado no sistema com sucesso");
    header("location: falta.php");
}
 else{
     echo ($inserirdados);
    die("Infelizmente não foi possível cadastrar a falta");
}
}
}
?>