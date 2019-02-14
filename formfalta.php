<?php
    error_reporting(0);

	session_start();
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
    }

    INCLUDE 'connection.php';

    $modo = $_GET['modo']; 

    $disabled = "";
    if($modo == "view"){
        $disabled = "disabled";
    }

    function getField(){
        global $id;
        global $conn;

        $id = $_GET['id'];

        $sql = "SELECT F.id, F.data as faltadata,MF.nome as motivofalta, MF.id as idMotivofalta, A.id as idAssociado, A.nome as associadonome FROM falta F 
        INNER JOIN associado A ON F.id_associado = A.id
        INNER JOIN motivofalta MF ON F.id_motivofalta = MF.id 
        WHERE F.id = $id ";

        $result = $conn->query($sql);

        if($result){
            $row = $result->fetch_assoc();

            global  $associadonome;
            global $motivofalta;
            global $idAssociado;
            global $idMotivofalta;
            global $data;

            $associadonome = $row['associadonome'];
            $idAssociado = $row['idAssociado'];
            $idMotivofalta = $row['idMotivofalta'];
            $data = $row['faltadata'];
            $motivofalta = $row['motivofalta'];
        } else {
            die("Erro na query: $sql");
        }
    }

    if($modo != "cadastrar" ){
        getField();
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
	<script src="js/falta.js"></script>
	<link rel="stylesheet" type="text/css" href="css/formengenharia.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.html'; ?>
<form method="GET" action="formActionfalta.php">
<font color = "green"><?php echo $_GET['response']; ?></font>
<br>
            <font color = "red"><?php echo $_GET['errorresponse']; ?></font>
            <font color = "red"><?php echo $_GET['errorresponse2']; ?></font>
            <br>
            Nome do associado:
                <p>
                <select name = "associado" <?php echo $disabled; ?>>
                <option value=""></option>
                <?php 
                $sql = "SELECT id, nome FROM associado";
                $result = $conn->query($sql);
                if($result) {
                    while($row = $result->fetch_assoc()){
    
                        $selected = "";
    
                        if($row['id'] == $idAssociado){
                            $selected = "selected";
                        }
    
                        echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                    }
                } else {
                    die("erro na query $sql"); }
                    
                ?>
                </select>
                </p>
                

                Data:
                <p>
                <input type="date" name="data" <?php echo $disabled; ?> 
                value ="<?php echo $data; ?>">
                </p>

            <font color = "red"><?php echo $_GET['errorresponse1']; ?></font>
            <font color = "red"><?php echo $_GET['errorresponse2']; ?></font>
            
            <br>
            Motivo da falta:
            <p>

             <select name = "motivofalta" <?php echo $disabled; ?>>
                <option value=""></option>
                <?php 
                $sql = "SELECT id, nome FROM motivofalta";
                $result = $conn->query($sql);
                if($result) {
                    while($row = $result->fetch_assoc()){
    
                        $selected = "";
    
                        if($row['id'] == $idMotivofalta){
                            $selected = "selected";
                        }
    
                        echo "<option value='".$row['id']."' $selected>".$row['nome']."</option>";
                    }
                } else {
                    die("erro na query $sql"); }
                    
                ?>
                </select>
            
                        </p>
                        <input type="hidden" name="modo" value="<?php echo $modo; ?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">

                            <input type="button" class="btn btn-warning" onclick="voltar()" value="Voltar">
                            &nbsp;
                            <?php if(!$disabled) { 

                                echo "<input class='btn btn-warning' type='submit'>";

                            } ?>
                    </form>
</body>
</html>