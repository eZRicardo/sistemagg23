function deletebutton(id){
	if(confirm("Tem certeza de que deseja deletar este item?")){
		window.location = "formActionAssociado.php?modo=delete&idAssociado="+id;
	}
}