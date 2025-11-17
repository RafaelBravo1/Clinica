    <?php 
    include('logado.php')?>
<?php
include("conecta.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $cpf = $_POST['cpf'];
    $medico = $_POST['medico'];
    print $cpf;

    $sql = "SELECT `idpaciente`FROM `paciente` WHERE `cpf` = $cpf";
    $query = $conexao->query($sql) or die($conexao->error);
    $dados = $query->fetch_assoc();
    $paciente_id = $dados['idpaciente'];
    mysqli_query($conexao, "INSERT INTO `consulta` (`data_e_hora`, `paciente_id`, `medico_id`) VALUES ('$data $hora', '$paciente_id', '$medico')");
header('location:cadConsulta.php');
}
