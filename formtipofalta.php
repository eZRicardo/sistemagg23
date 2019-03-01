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

    $sql = "SELECT nome, peso FROM tipofalta WHERE id = '$id' ";
    $result = $conn->query($sql);

    if($result){
        $row = $result->fetch_assoc();

        global $nome;
        global $peso;

        $nome = $row['nome'];
        $peso = $row['peso'];
    } else {
        die("Erro na query: $sql");
    }
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro tipo falta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="js/jquery-3.3.1.js"></script>
	<script src="js/tipofalta.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formengenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<form method="GET" action="formActiontipofalta.php">
<font color = "green"><?php echo $_GET['response']; ?></font>

<br>
            Bandeira:
                <p>
                    <input type="text" name="nome" <?php echo $disabled; ?> 
                     value="<?php echo $nome; ?>">
                </p>
                <font color = "red"><?php echo $_GET['errorresponse']; ?></font>
                <font color = "red"><?php echo $_GET['errorresponse2']; ?></font>
                <br>
            Peso:
            <p>

            <input type="number" name="peso" <?php echo $disabled; ?> 
                     value="<?php echo $peso; ?>">

            </p>
            <?php 
            $sql = "SELECT nome, peso FROM tipofalta";
            $result = $conn->query($sql);

            if($result) {
                while($row = $result->fetch_assoc()){

                    $selected = "";

                    if($row['id'] == $tipofalta){
                        $selected = "selected";
                    }
                }
            } else {
                die("erro na query $sql");
            }
            ?>
            </select>
            <!-- procurar como dar response em placeholder -->
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