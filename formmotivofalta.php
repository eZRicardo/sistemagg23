<?php
    error_reporting(0);
	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
    }

    INCLUDE 'connection.php';

    $modo = $_GET['modo'];
    $id = $_GET['id'];

    $disabled = "";
    if($modo == "view"){
        $disabled = "disabled";
    }

    $sql = "SELECT nome, id_tipofalta as tipofalta FROM motivofalta WHERE id = '$id' ";
    $result = $conn->query($sql);

    if($result){
        $row = $result->fetch_assoc();

        global $nome;
        global $tipofalta;

        $nome = $row['nome'];
        $tipofalta = $row['tipofalta'];
    } else {
        die("Erro na query: $sql");
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro motivo falta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="js/jquery-3.3.1.js"></script>
	<script src="js/motivofalta.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formengenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<form method="GET" action="formActionmotivofalta.php">
<font color = "green"><?php echo $_GET['response']; ?></font>

<br>
            Motivo da falta:
                <p>
                    <input type="text" name="nome" <?php echo $disabled; ?> 
                     value="<?php echo $nome; ?>">
                </p>
                <font color = "red"><?php echo $_GET['errorresponse']; ?></font>
                <font color = "red"><?php echo $_GET['errorresponse2']; ?></font>
                <br>
            Bandeira:
            <p>
            <select name = "tipofalta" <?php echo $disabled; ?>>
            <option value="">Selecione um tipo</option>
            <?php 
            $sql = "SELECT id, nome FROM tipofalta";
            $result = $conn->query($sql);

            if($result) {
                while($row = $result->fetch_assoc()){

                    $selected = "";

                    if($row['id'] == $tipofalta){
                        $selected = "selected";
                    }

                    echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                }
            } else {
                die("erro na query $sql");
            }
            ?>
            </select>
            <font color = "red"><?php echo $_GET['errorresponse1']; ?></font>
            <font color = "red"><?php echo $_GET['errorresponse2']; ?></font>
                        </p>
                        <input type="hidden" name="modo" value="<?php echo $modo;?>">

                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        
                        <input type="button" class="btn btn-warning" onclick="voltar()" value="Voltar">
                        &nbsp;
                         <?php if(!$disabled) { 

                                echo "<input class='btn btn-warning' type='submit' name='cadastro'>";
                                

                            } ?>
                    </form>
</body>
</html>