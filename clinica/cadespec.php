
<!DOCTYPE html>
    <?php 
    include('logado.php')?>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Especificação</title>
</head>

<body>
    <h1>Cadastro de Especificação</h1>

    <form action="" method="POST">

        <label for="text">Especificação</label>
        <input type="text" id="espec" name="espec" required>

        <input type="submit" value="cadastrar" name="cadastrar">
        <input type="button" value="Voltar" onclick="voltar()">
    </form>
</body>
<script>
    function voltar() {
        window.location = "cadmedico.php";
    }
</script>
<?php
include("conecta.php");
if($_POST){
$espec=$_POST['espec'];
$sql_especificacao = "INSERT INTO `especificacoes`(`especificacao`) VALUES ('$espec')";
$dadose = mysqli_query($conexao, $sql_especificacao) or die($conexao->error);} 
?>
</html>