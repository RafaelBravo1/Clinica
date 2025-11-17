<!DOCTYPE html>
    <?php 
    include('logado.php')?>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Médicos</title>
    <style>
        body {
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>
</head>

<body>
    <h1>Listagem de Consultas</h1>
    <input type="submit" value="Voltar" name="voltar" onclick="voltar()">
    <table border="1">
        <thead>
            <th>ID</th>
            <th>paciente</th>
            <th>medico</th>
            <th>data e hora</th>
            <th colspan="2">Ação</th>
        </thead>
        <?php
        include_once("conecta.php");
        $dados = mysqli_query($conexao, "SELECT * FROM `consulta`");
        $paciente = mysqli_query($conexao, "SELECT * FROM  paciente");
        $medicos = mysqli_query($conexao, "SELECT * FROM  medicos");

        function medico($id)
        {
            include("conecta.php");
            $sql = "SELECT nome FROM medicos WHERE idmedico = $id";
            $query = $conexao->query($sql) or die($conexao->error);
            $dados = $query->fetch_assoc();
            return $dados['nome'];
        }

        function paciente($id)
        {
            include("conecta.php");
            $sql = "SELECT nome FROM paciente WHERE idpaciente = $id";
            $query = $conexao->query($sql) or die($conexao->error);
            $dados = $query->fetch_assoc();
            return $dados['nome'];
        }
        while ($item = mysqli_fetch_array($dados)) {

            echo "<tr>";
            echo "<td>" . $item['idconsulta'] .  "</td>" .
                "<td>" . paciente($item['paciente_id']); 
             echo "</td>".
                "<td>" . medico($item['medico_id']); 
                echo "</td><td>".$item['data_e_hora']."</td>";
                ?>
        <?php
            echo   "<td bgcolor='red' onclick='verifica(" . $item['idconsulta'] . ")'> <a href='#'>🗑️</a> </td>" .
                "</tr>";
        }  ?>
    </table>
    <script>
        function verifica(recid) {
            if (confirm("Deseja realmente excluir o agendadmento?")) {
                window.location = "exconsul.php?id=" + recid;
            }
        }

        function voltar() {
            window.location = "consulta.php";
        }
    </script>

</body>

</html>