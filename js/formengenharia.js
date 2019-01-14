function submit(modo){
	var labelResponse = document.getElementById("labelResponse");
	var nome = document.getElementById("nomeEngenharia").value;
	if(modo){
		$.ajax({
			type:'get',
			url:'formActionEngenharia.php',
			data:{'modo': modo,'nome': nome},
			success: function(response){
				if(response == "SUCCESS"){
					labelResponse.innerHTML = "<font color='green'>Concluido com sucesso</font>";
				} else {
					alert('Erro no modo : '+modo);
				}
			}
		});
	}
	//lembrar de fazer verificações de validação do nome...
}