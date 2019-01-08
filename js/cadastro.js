function cadastroaction(){
    var nome = document.getElementById("nome").value;
    var engenharia = document.getElementById("eng").value;
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;
    var setor = document.getElementById("setor").value;
    $.ajax({
        type: 'post',
        url:'cadastroaction.php',
        data:{ 'setor': setor },
		success: function(response){
			if(response == "SUCCESS"){
				window.location.href = "google.com";
			} else {
				var label = document.getElementById("response");
				label.innerHTML = "Setor inválido";
			}
		},
        error: function()
        {
            alert('Erro no cadastro');
		}
    });

}