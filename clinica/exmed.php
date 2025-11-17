    <?php 
    include('logado.php')?>
<?php 
include_once("conecta.php");
$recid=intval($_GET['id']);
mysqli_query($conexao, "DELETE FROM `medicos` WHERE idmedico=$recid");
header('location:listamedico.php');

?>