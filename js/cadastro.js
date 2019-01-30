function cadastroaction(modo){
    var labelResponse = document.getElementById("labelResponse");
    var nome = document.getElementById("nome").value;
    var engenharia = document.getElementById("engenharia").value;
    var login = document.getElementById("login").value;
    var senha = document.getElementById("senha").value;
    var setor = document.getElementById("setor").value;
    
if(modo){
    $.ajax({
        
        type: 'GET',
        
        url:'cadastroaction.php',
        
        data:{ 'setor': setor, 'senha': senha, 'login': login, 'engenharia': engenharia,
         'nome': nome, 'modo': modo},

		success: function(response){
			if(response == "SUCCESS"){
                labelResponse.innerHTML = "<font color='green'>Concluido com sucesso</font>";
				window.location = "engenharia.php";
			} else {
				alert('Erro no cadastro');
			}
		},
  //       error: function()
  //       {
  //           alert('Erro no cadastro');
		// }
    });
        }
}