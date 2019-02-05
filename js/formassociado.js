// function submit(modo){
// 	var labelResponse = document.getElementById("labelResponse");

// 	var idAssociado = document.getElementById("idAssociado").value;
// 	var nome = document.getElementById("nome").value;
// 	var dataNascimento = document.getElementById("dataNascimento").value;
// 	var endereco = document.getElementById("endereco").value;
// 	var bairro = document.getElementById("bairro").value;
// 	var cidade = document.getElementById("cidade").value;
// 	var uf = document.getElementById("uf").value;
// 	var cep = document.getElementById("cep").value;
// 	var telefone = document.getElementById("telefone").value;
// 	var celular = document.getElementById("celular").value;
// 	var email = document.getElementById("email").value;
// 	var curso = document.getElementById("curso").value;
// 	var periodo = document.getElementById("periodo").value;
// 	var turno = document.getElementById("turno").value;
// 	var rg = document.getElementById("rg").value;
// 	var cpf = document.getElementById("cpf").value;
// 	var setor = document.getElementById("setor").value;

// 	if(modo){
// 		$.ajax({
// 			type:'get',
// 			url:'formActionAssociado.php',
// 			data:{	'modo': modo,
// 							'idAssociado': idAssociado,
// 							'nome': nome,
// 							'dataNascimento': dataNascimento,
// 							'endereco': endereco,
// 							'bairro': bairro,
// 							'cidade': cidade,
// 							'uf': uf,
// 							'cep': cep,
// 							'telefone': telefone,
// 							'celular': celular,
// 							'email': email,
// 							'curso': curso,
// 							'periodo': periodo,
// 							'turno': turno,
// 							'rg': rg,
// 							'cpf': cpf,
// 						  'setor': setor 
// 					 },
// 			success: function(response){
// 				if(response == "SUCCESS"){
// 					labelResponse.innerHTML = "<font color='green'>Concluido com sucesso</font>";
// 				} else {
// 					console.log(response);
// 					alert('Erro no modo:'+modo);
// 				}
// 			}
// 		});
// 	}
// }