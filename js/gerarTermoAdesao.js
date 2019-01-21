function submit(){
	var nome = document.getElementById("nomeAssociado").value;
	var dataAssociacao = document.getElementById("dataAssociacao").value;
		$.ajax({
			type:'get',
			url:'imprimeTermoAdesao.php',
			data:{'nome': nome,'dataAssociacao': dataAssociacao},
			success: function(response){
				if(response == "SUCCESS"){
					labelResponse.innerHTML = "<font color='green'>Concluido com sucesso</font>";
				} else {
					console.log(response);
					alert('Erro!!');
				}
			}
		});
	//lembrar de fazer verificações de validação do nome...
}
