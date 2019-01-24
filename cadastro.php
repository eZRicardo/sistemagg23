<?php 

include 'connection.php';

echo "  <meta charset='utf-8'>";

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
            <input id="nome" name="nome" value="<?php echo $nome; ?>" type="text" size="70" maxlength="60">
            <br>
            <br>
        </div>
        <div class="associado">
                <label>Login</label>
                <br>
                <input id="login" name="login" value="<?php echo $login; ?>" type="text">
                <br>
                <br>
                <label>Senha</label>
                <br>
                <input id="password" name="password" value="<?php echo $password; ?>" type="password">
            </div>    
            <br>
    <div class="setor">
        <td>Setor:</td>
        <br>
        <td><select>
          <option name="setor">Selecione</option>
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
              <option value="-1" <?php if($row['id'] == '-1') echo "selected"; ?>>Outros</option>
        </select></td>
    </div>
    <br>
    <div class="engenharia">
        <tr>
      <td>Engenharia:</td>
      <br>
      <td><select>
          <option name="engenharia">Selecione</option>
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
              <option value="-1" <?php if($row['id'] == '-1') echo "selected"; ?>>Outros</option>
        </select>
    </td>
    </tr>
    </div>
    <br>
    <br>
    <button name = "modo" value="cadastrar" class="botton" onclick="javascript:submit(cadastrar);">cadastrar</button>
    <label id="labelResponse"></label>
	<font color="red" id="response"></font>
 </div>

</body>

</html>