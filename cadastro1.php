<?php 
ini_set('display_errors', '1');
include 'connection.php';
include 'cadastroaction.php';
echo "  <meta charset='utf-8'>";

echo"aaaaaaa";
?>
<!DOCTYPE html>

<html>

<head>

    <link rel="stylesheet" type="text/css" href="cadastro.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/cadastro.js"></script>
    <title>Cadastro</title>
    <meta charset = "utf-8">

</head>

<body>

 <div class="dados">
     <br>
    <center><h3>Cadastro</h3></center>
    
    <div class="nome">
            <label>Nome</label>
            <br>
            <input id="nome" name="nome" type="text" size="70" maxlength="60">
            <br>
            <br>
        </div>
        <div class="associado">
                <label>Login</label>
                <br>
                <input id="login" name="login" type="text">
                <br>
                <br>
                <label>Senha</label>
                <br>
                <input id="senha" name="senha" type="password">
            </div>    
            <br>
    <div class="setor">
        <select>
   <?php
      $sql = $pdo->prepare("SELECT id FROM setor");
      $sql->execute();
      while($ln = $sql->fetchObject()){
         echo '<option value="'.$ln->id.'">'.$ln->nome.'</option>';
      }
   ?>
</select>

    </div>
    <br>
    <div class="engenharia">
        <tr>
      <td>Engenharia:</td>
      <br>
      <td><select name="eng" id="eng">
        <option>Selecione</option>
        <option value="Eng. Civil">Eng. Civil</option>
        <option value="Eng. da Computação">Eng. da Computação</option>
        <option value="Eng. Elétrica Eletrônica">Eng. Elétrica Eletrônica</option>
        <option value="Eng. Elétrica Eletrotécnica">Eng. Elétrica Eletrotécnica</option>
        <option value="Eng. Elétrica Telecomunicações">Eng. Elétrica Telecomunicações</option>
        <option value="Eng. Mecânica">Eng. Mecânica</option>
        <option value="Eng. de Controle e Automação">Eng. de Controle e Automação</option>
          </select>
    </td>
    </tr>
    </div>
    <br>
    <br>
    <button class="btton" onclick="cadastroaction();">cadastrar</button>
	<font color="red" id="cadastrar"></font>
 </div>

</body>

</html>