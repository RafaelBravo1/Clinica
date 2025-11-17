<!-- recebe os dados para cadastro do cliente e mostra medicos com a especializaçao e data e hora, retorna para pagina de marcar consulta -->
    <?php 
   include('logado.php')?>
<link rel="stylesheet" href="estilo.css">
<?php

include("conecta.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    $end = $_POST['end'];
    $idade = $_POST['idade'];
    $cpf = $_POST['cpf'];
    $convenio = $_POST['convenio'];
    $id_espec = $_POST['espec'];

    mysqli_query($conexao, "INSERT INTO `paciente`( `nome`, `endereco`, `idade`, `cpf`, `convenio_id`) VALUES ('$nome','$end','$idade','$cpf','$convenio')");

    $medicos = mysqli_query($conexao, "SELECT * FROM `medicos` where especificacao_id = $id_espec") or die($conexao->error);
?>
<form action="marcaConsulta.php" method="POST">
<h1>Paciente <?=$nome?></h1>
<label for="medico"> Medico:</label>
<select name="medico">
<?php
    while ($item = mysqli_fetch_array($medicos)) {
        echo "<option value=" . $item['idmedico'] . ">" . $item['nome'] . "</option>";
    }
}
?>
</select>
<label>Data</label>
<input type="date" name="data">
<label>Horario</label>
<input type="time" name="hora">
<input type="hidden" name="cpf" value="<?= $cpf ?>">
<input type="submit">
</form>
