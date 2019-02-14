function deletebutton(id){
    if(confirm("Tem certeza que deseja deletar?")){
        window.location = "formActionfalta.php?modo=delete&id="+id;
    }
}

function voltar() {
    window.location = "faltas.php";
  }