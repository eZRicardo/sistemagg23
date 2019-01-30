<?php 

include 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="css/cadastro.css">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/cadastro.js"></script>
    <title>Cadastro</title>
    <meta charset = "utf-8">

</head>

<body>

 <div class="dados-cadastro">
     <br>
    <center><h3>Cadastro</h3></center>
    <div id = dados class="dados">
    <div class="nome">
            <label>Nome</label>
            <br>
            <input id="nome" name="nome" value="" type="text" size="70" maxlength="60">
            <br>
            <br>
        </div>
        <div class="associado">
                <label>Login</label>
                <br>
                <input id="login" name="login" value="" type="text">
                <br>
                <br>
                <label>Senha</label>
                <br>
                <input id="senha" name="senha" value="" type="password">
            </div>    
            <br>
    <div class="setor">
        <td>Setor:</td>
        <br>
<<<<<<< HEAD
        <td><select name="setor" id="setor">
=======
        <td><select  name="setor" id="setor">
>>>>>>> 6b549b0d826980acdf7389841e39315eafadcee9
          <option>Selecione</option>
              <?php
              $sql = "SELECT id,nome FROM setor WHERE id > -1 ";
              $result = $conn->query($sql);
              
              $row = $result->fetch_assoc();
             
              while($row){
                $selected = "";
                echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                $row = $result->fetch_assoc();
              }
              ?>
<<<<<<< HEAD
              <option value="" <?php if($row['id'] == '-1') echo "selected"; ?>>Outros</option>
=======
>>>>>>> 6b549b0d826980acdf7389841e39315eafadcee9
        </select></td>
    </div>
    <br>
    <div class="engenharia">
        <tr>
      <td>Engenharia:</td>
      <br>
<<<<<<< HEAD
      <td><select name="engenharia" id="engenharia">
=======
      <td><select  name="engenharia" id="engenharia">
>>>>>>> 6b549b0d826980acdf7389841e39315eafadcee9
          <option>Selecione</option>
              <?php
              $sql = "SELECT id,nome FROM engenharia WHERE id > -1 ";
              $result = $conn->query($sql);
              
              $row = $result->fetch_assoc();
             
              while($row){
                $selected = "";
                echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                $row = $result->fetch_assoc();
              }
              ?>
<<<<<<< HEAD
              <option value="" <?php if($row['id'] == '-1') echo "selected"; ?>>Outros</option>
=======
>>>>>>> 6b549b0d826980acdf7389841e39315eafadcee9
        </select>
    </td>
    </tr>
    </div>
    <br>
    <br>
    <button name = "modo" id="modo" class="botton" onclick="javascript:cadastroaction(this.value);" value="cadastrar">cadastrar</button>
    <label id="labelResponse"></label>
	<font color="red" id="response"></font>
 </div>
</div>

</body>

</html>