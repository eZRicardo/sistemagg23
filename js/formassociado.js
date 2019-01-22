function submit(modo){
	var labelResponse = document.getElementById("labelResponse");
	var nomeAssociado = document.getElementById("nomeAssociado").value;
	var idAssociado = document.getElementById("idAssociado").value;
	var idSetor = document.getElementById("idSetor").value;
	var idEngenharia = document.getElementById("idEngenharia").value;
	if(modo){
		$.ajax({
			type:'get',
			url:'formActionAssociado.php',
			data:{ 'modo': modo,'nomeAssociado': nomeAssociado,
						 'idAssociado': idAssociado, 'idSetor': idSetor,
						 'idEngenharia': idEngenharia },
			success: function(response){
				if(response == "SUCCESS"){
					labelResponse.innerHTML = "<font color='green'>Concluido com sucesso</font>";
				} else {
					console.log(response);
					alert('Erro no modo : '+modo);
				}
			}
		});
	}
	//lembrar de fazer verificações de validação do nome...
}