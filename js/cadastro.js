function cadastroaction(){
    var nome = document.getElementById("nome").value;
    var engenharia = document.getElementById("engenharia").value;
    var login = document.getElementById("login").value;
    var password = document.getElementById("password").value;
    var setor = document.getElementById("setor").value;
    var modo = document.getElementById("modo").value;

    $.ajax({
        type: 'post',
        url:'cadastroaction.php',
        data:{ 'setor': setor, 'password': password, 'login': login, 'engenharia': engenharia, 'nome': nome, 'modo': modo },
		success: function(response){
			if(responde == "SUCCESS"){
				window.location.href = "engenharia.php";
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