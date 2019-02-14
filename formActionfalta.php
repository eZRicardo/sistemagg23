<?php 

session_start();

if(!$_SESSION['id']){
    header("Location: logout.php");
}

INCLUDE 'connection.php';

$modo = $_GET['modo'];

if($modo == "cadastrar"){

    $data = $_GET['data'];
    $motivofalta = $_GET['motivofalta'];
    $associado = $_GET['associado'];

    if($associado=="" AND $motivofalta==""){

    header("Location: formfalta.php?modo=cadastrar&errorresponse2=Tipo Selecionado não é válido");

    } else if ($motivofalta==""){
        
        header("Location: formfalta.php?modo=cadastrar&errorresponse1=Tipo Selecionado não é válido");
        
    }
    else if($associado==""){

        header("Location: formfalta.php?modo=cadastrar&errorresponse=Tipo Selecionado não é válido");
    }

    
    else{

    $inserirdados = "INSERT INTO falta (data, id_motivofalta, id_associado) VALUES ('$data','$motivofalta', $associado) ";
    $result = $conn->query($inserirdados);
    
    if($result){
        header("Location: formfalta.php?idAssociado=$idAssociado&modo=cadastrar&response=Cadastrado com sucesso!");
    } else {
        echo ($inserirdados);
        die("Infelizmente não foi possível cadastrar a falta");
    }
}
} else if($modo == "edit"){
    $id = $_GET['id'];
    $data = $_GET['data'];
    $motivofalta = $_GET['motivofalta'];
    $associado = $_GET['associado'];

    if($associado=="" AND $motivofalta==""){

        header("Location: formfalta.php?id=$id&modo=edit&errorresponse2=Tipo Selecionado não é válido");
    
        } else if ($motivofalta==""){
            
            header("Location: formfalta.php?id=$id&modo=edit&errorresponse1=Tipo Selecionado não é válido");
            
        }
        else if($associado==""){
    
            header("Location: formfalta.php?id=$id&modo=edit&errorresponse=Tipo Selecionado não é válido");
        }
        else{
    $alterardados = "UPDATE falta SET data = '$data', id_motivofalta = '$motivofalta', id_associado = '$associado' WHERE id = '$id' ";
    $result = $conn->query($alterardados);

    if($result){
        header("Location: formfalta.php?id=$id&modo=edit&response=Alterado com sucesso!");
    } else {
        echo ($alterardados);
        die("Infelizmente não foi possível alterar a falta");
    }
}
} else if ($modo == "delete"){
    $id = $_GET['id'];
    $deletardados = "DELETE FROM falta WHERE id = '$id' ";

    $result = $conn->query($deletardados);

    if($result){
        header("location: faltas.php");
    } else {
        echo ($deletardados);
        die;
    }

}

?>