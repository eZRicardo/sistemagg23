function deletebutton(id){
    if(confirm("Tem certeza que deseja deletar?")){
        window.location = "formActiontipofalta.php?modo=delete&id="+id;
    }
}

function voltarform() {
    window.location = "tipofalta.php";
  }
  function voltartipofalta() {
    window.location = "menugenteegestao.php";
  }