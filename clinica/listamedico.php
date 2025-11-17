<!DOCTYPE html>
<html lang="pt-br">
    <?php 
    include('logado.php')?>
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Médicos</title>
    <style>body{
        margin-left: 100px;
        margin-right: 100px;
    }</style>
</head>

<body>
    <h1>Listagem de Médicos</h1>
    <input type="submit" value="Voltar" name="voltar" onclick="voltar()">
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>CRM</th>
            <th>Especificação</th>
            <th colspan="2">Ação</th>
        </thead>
        <?php
        include_once("conecta.php");
        $dados = mysqli_query($conexao, "SELECT * FROM `medicos`");
        $editora = mysqli_query($conexao, "SELECT * FROM  especificacoes");

        function Espec($id) //mostra o nome da editora ao invés do id comparando os dois bancos. precisa ser função pois não é possivel usar fetch dentro de outro fetch.
        {
            include("conecta.php");
            $sql = "SELECT especificacao FROM especificacoes WHERE idespecificacao = $id";
            $query = $conexao->query($sql) or die($conexao->error);
            $dados = $query->fetch_assoc();
            return $dados['especificacao'];
        }

        while ($item = mysqli_fetch_array($dados)) {

            echo "<tr>" ;
            echo "<td>" . $item['idmedico'] .  "</td>" .
                "<td>" . $item['nome'] . "</td>" .
                "<td>" . $item['crm'] . "</td>" .
                "<td>" . Espec($item['especificacao_id']) ; ?>
                <td bgcolor='green'> <a href="editmed.php?id=<?=$item['idmedico'];?>">✏️ </td>
                <?php
             echo   "<td bgcolor='red' onclick='verifica(" . $item['idmedico'] . ")'> <a href='#'>🗑️</a> </td>" .
                "</tr>";
        }  ?>
    </table>
    <script>
        function verifica(recid) {
            if (confirm("Deseja realmente excluir o médico?")) {
                window.location= "exmed.php?id=" + recid;
            }
        }
    function voltar() {
        window.location="medico.php";
    }
</script>

</body>

</html>