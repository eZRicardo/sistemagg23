function cadastroaction(){

    var nome = document.getElementById("nome").value;
    var engenharia = document.getElementById("engenharia").value;
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;
    var setor = document.getElementById("setor").value;

    $.ajax({

        type: 'post',
        url:'cadastroaction.php',
        data:{ 'setor': setor, 'senha' :  senha, 'login' : login, 'engenharia' : engenharia, 'nome' : nome },
		success: function(cadastrar){

			if(cadastrar == "SUCCESS"){

				window.location.href = "google.com";

			} else {
                
				var label = document.getElementById("response");
				label.innerHTML = "valores inválidos";
			}
		},
        error: function()
        {
            alert('Erro no cadastro');
		}
    });

}