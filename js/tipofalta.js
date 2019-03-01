function deletebutton(id){
    if(confirm("Tem certeza que deseja deletar?")){
        window.location = "formActiontipofalta.php?modo=delete&id="+id;
    }
}

function voltar() {
    window.location = "tipofalta.php";
  }