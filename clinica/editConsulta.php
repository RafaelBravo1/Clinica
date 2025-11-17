<!DOCTYPE html>
<html lang="pt-br">
    <?php 
    include('logado.php')?>
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marcar Consulta</title>
</head>

<body>
    
    <form action="" method="POST">
        <input type="button" value="Voltar" onclick="voltar()">
        <input type="number" placeholder="insira o CPF do Paciente" name="cpf" required>
        <input type="submit" value="Confirma"> <!-- pega o cpf do paciente para verificar se já há registro no sistema -->
    </form>
    <?php
    function pesquisa($cpf)
    {
        include("conecta.php");
        $sql = "SELECT * FROM paciente WHERE cpf = $cpf";
        $query = $conexao->query($sql) or die($conexao->error);
        $dados = $query->fetch_assoc();
        return $dados;
    }
    function convenio()
    {
        include("conecta.php");
        /*         $sql = "SELECT * FROM convenio";
        $query = $conexao->query($sql) or die($conexao->error);
        $dados = $query->fetch_assoc(); */

        $sql_convenio = "SELECT * FROM `convenio`";
        $dadosc = mysqli_query($conexao, $sql_convenio) or die($conexao->error);
        return $dadosc;
    }
    function medico()
    {
        include("conecta.php");
        $sql_medicos = "SELECT * FROM `medicos`";
        $dadosm = mysqli_query($conexao, $sql_medicos) or die($conexao->error);
        return $dadosm;
    }
    function especificacoes()
    {
        include("conecta.php");
        $sql_medicos = "SELECT * FROM `especificacoes`";
        $dadose = mysqli_query($conexao, $sql_medicos) or die($conexao->error);
        return $dadose;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include("conecta.php");
        $pesq = pesquisa($_POST['cpf']);
        if (!$pesq) {
            
            echo "cadastrar";
    ?>
            <form action="cadpac.php" method="POST">
                <label>Nome </label>
                <input type="text" name="nome">
                <label>Endereço </label>
                <input type="text" name="end">
                <label>Idade </label>
                <input type="number" name="idade">
                <label>CPF </label>
                <input type="number" name="cpf" value="<?= (int)$_POST['cpf'] ?>" readonly>
                <label>Convenio</label>
                <select name="convenio">
                    <option selected disabled value="0">Selecione um convenio</option>
                    <?php
                    $convenios = convenio();
                    while ($convenio = mysqli_fetch_array($convenios)) {
                        echo "<option value=" . $convenio['idconvenio'] . ">" . $convenio["nome"] . "</option>";
                    }
                    ?>
                </select>
                <label>especialização do medico</label>
                <select name="espec">
                    <?php
                    $espec = especificacoes();
                    while ($esp = mysqli_fetch_array($espec)) {
                        echo "<option value=" . $esp['idespecificacao'] . ">" . $esp["especificacao"] . "</option>";
                    }
                    ?>

                </select>
            <input type="submit" value="Marcar">
            </form>
        <?php
        } else {
            echo "consulta";
        ?>

            <form action="editpac.php" method="POST">
                <label>Nome </label>
                <input type="text" name="nome" value=<?= $pesq['nome']; ?>>
                <label>Endereço </label>
                <input type="text" name="end" value=<?= $pesq['endereco']; ?>>
                <label>Idade </label>
                <input type="number" name="idade" value=<?= $pesq['idade']; ?>>
                <label>Cpf </label>
                <input type="number" name="cpf" value=<?= $pesq['cpf']; ?> readonly>
                <label>Convenio</label>
                <select name="convenio">
                    <?php
                    $convenios = convenio();
                    while ($convenio = mysqli_fetch_array($convenios)) {
                        if ($convenio['idconvenio'] == $pesq['convenio_id']) {
                            echo "<option selected value=" . $convenio['idconvenio'] . ">" . $convenio["nome"] . "</option>";
                        } else {
                            echo "<option value=" . $convenio['idconvenio'] . ">" . $convenio["nome"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label>especialização do medico</label>
                <select name="espec">
                    <?php
                    $espec = especificacoes();
                    while ($esp = mysqli_fetch_array($espec)) {
                        echo "<option value=" . $esp['idespecificacao'] . ">" . $esp["especificacao"] . "</option>";
                    }
                    ?>

                </select>
                <input type="submit" value="Marcar">

            </form>


    <?php
        }
    }
    ?>
</body>
<script>     function voltar() {
        window.location="consulta.php";
    }
    </script>
</html>