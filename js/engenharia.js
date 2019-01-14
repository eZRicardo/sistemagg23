function deletebutton(id){
	if(confirm("Tem certeza de que deseja deletar este item?")){
		window.location = "formActionEngenharia.php?modo=delete&id="+id;
	}
}