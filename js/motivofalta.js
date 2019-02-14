function deletebutton(id){
    if(confirm("Tem certeza que deseja deletar?")){
        window.location = "formActionmotivofalta.php?modo=delete&id="+id;
    }
}

function voltar() {
    window.location = "motivofalta.php";
  }