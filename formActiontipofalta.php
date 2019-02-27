<?php 

session_start();

if(!$_SESSION['id']){
    header("Location: logout.php");
}

INCLUDE 'connection.php';

$modo = $_GET['modo'];

$id = $_GET['id'];

if($modo == "cadastrar"){

    $nome = $_GET['nome'];
    $tipofalta= $_GET['tipofalta'];

    if($tipofalta==""){

    header("Location: formmotivofalta.php?modo=cadastrar&errorresponse=Tipo Selecionado não é válido");

    }else{

    $inserirdados = "INSERT INTO motivofalta(nome, id_tipofalta) VALUES ('$nome','$tipofalta') ";

    $result = $conn->query($inserirdados);
    
    if($result){
        header("Location: formmotivofalta.php?modo=cadastrar&response=Cadastrado com sucesso!");
    } else {
        echo ($inserirdados);
        die("Infelizmente não foi possível cadastrar a falta");
    }
}
} else if($modo == "edit"){
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $tipofalta= $_GET['tipofalta'];

    if($nome=="" AND $tipofalta==""){

        header("Location: formmotivofalta.php?id=$id&modo=edit&errorresponse2=Tipo Selecionado não é válido");
    
        } else if ($tipofalta==""){
            
            header("Location: formmotivofalta.php?id=$id&modo=edit&errorresponse1=Tipo Selecionado não é válido");
            
        }
        else if($nome==""){
    
            header("Location: formmotivofalta.php?id=$id&modo=edit&errorresponse=Tipo Selecionado não é válido");
        }
    else{
    $alterardados = "UPDATE motivofalta SET nome = '$nome', id_tipofalta = '$tipofalta' WHERE id = '$id' ";
    $result = $conn->query($alterardados);

    if($result){
        header("Location: formmotivofalta.php?id=$id&modo=edit&response=Alterado com sucesso!");
    } else {
        echo ($alterardados);
        die("Infelizmente não foi possível alterar a falta");
    }
}
} else if ($modo == "delete"){
    $id = $_GET['id'];
    $deletardados = "DELETE FROM motivofalta WHERE id = '$id' ";

    $result = $conn->query($deletardados);

    if($result){
        header("location: motivofalta.php");
    } else {
        echo ($deletardados);
        die;
    }

}

?>