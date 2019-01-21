function enviar(){
	var idAssociado = document.getElementById("idAssociado").value;
	var dataAssociacao = document.getElementById("dataAssociacao").value;
	window.open('imprimeTermoAdesao.php?id='+idAssociado+'&data='+dataAssociacao);
}
