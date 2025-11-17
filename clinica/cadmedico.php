
    <?php 
    include('logado.php')?><?php
include("conecta.php");
$sql_especificacao = "SELECT * FROM `especificacoes`";
$dadose = mysqli_query($conexao, $sql_especificacao) or die($conexao->error); 
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Medicos</title>
</head>

<body>
    <h1>Cadastro de Médicos</h1>

    <form action="cadm.php" method="POST">

        <label for="text">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label for="text">CRM</label>
        <input type="text" id="crm" name="crm">
        <label for="text">Especificação</label>
        <select name="especificacao" required>
            <option selected disabled>Selecione uma especificação</option>

            <?php while ($item = mysqli_fetch_array($dadose)) {
                echo "<option value=" . $item['idespecificacao'] . ">" . $item['especificacao'] . "</option>";
            }
            ?>
        </select>

        <input type="submit" value="cadastrar" name="cadastrar">
        <input type="button" value="Voltar" onclick="voltar()">
        <a href="cadespec.php">Cadastrar especificação</a>
    </form>
</body>
<script>
    function voltar() {
        window.location = "medico.php";
    }
</script>

</html>