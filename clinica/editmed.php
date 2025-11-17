<<?php
    include("conecta.php");
    $sql_medico = "SELECT * FROM `medicos` WHERE `idmedico`=" . $_GET['id'];
    $query = $conexao->query($sql_medico) or die($conexao->error);
    $dados = $query->fetch_assoc();
    $sql_espec = "SELECT * FROM `especificacoes`";
    $dadose = mysqli_query($conexao, $sql_espec) or die($conexao->error);
    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <?php 
 include('logado.php')?>
    <head>
        <link rel="stylesheet" href="estilo.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de livros</title>
    </head>

    <body>
        <h1>Editar livro</h1>
        <form action="" method="POST">
                <label for="text">Nome</label>
                <input type="text" id="nome" name="nome" required value="<?= $dados['nome']; ?>">
                <label for="text">CRM</label>
                <input type="text" id="crm" name="crm" value="<?= $dados['crm']; ?>">
                <label for="text">Especificação</label>
                <select name="espec" required>
                    <?php while ($item = mysqli_fetch_array($dadose)) {
                        if ($dados['especificacao_id'] == $item['idespecificacao']) {
                            echo "<option selected value=" . $item['idespecificacao'] . ">" . $item['especificacao'] . " (Selecionada) </option>";
                        } else {
                            echo "<option value=" . $item['idespecificacao'] . ">" . $item['especificacao'] . "</option>";
                        }
                    }; ?>
                </select>
                <input type="submit" value="Gravar">
            </form>
    </body>
    <?php
    if ($_POST) {
        if (empty($_POST['nome']) || empty($_POST['crm']) || empty($_POST['espec'])) {
            echo "<h2 style='color:red;'>Por favor, preencha todos os campos</h2>";
            die("<p style='color:red;'>erro, não foi possível editar o cadastro</p>");
            exit;
        }
        $nome =$_POST['nome'];
        $crm= $_POST['crm'];
        $espec =$_POST['espec'];
        $id=$_GET['id'];


        mysqli_query($conexao, "UPDATE `medicos` SET `nome`='$nome',`crm`='$crm',`especificacao_id`='$espec' WHERE `idmedico` = '$id'");
        header("Location: listamedico.php");
    }
    ?>

    </html>