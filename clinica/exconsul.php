    <?php 
    include('logado.php')?>
<?php 
include_once("conecta.php");
$recid=intval($_GET['id']);
mysqli_query($conexao, "DELETE FROM `consulta` WHERE idconsulta=$recid");
header('location:pesConsulta.php');

?>