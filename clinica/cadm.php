    <?php 
   include('logado.php')?>
<?php

include("conecta.php");

$nome=$_POST['nome'];
$crm=$_POST['crm'];
$espec=$_POST['especificacao'];

mysqli_query($conexao," INSERT INTO `medicos`( `nome`, `crm`, `especificacao_id`) VALUES ('$nome','$crm','$espec')");
if($_POST){header("location:cadmedico.php");}
?>