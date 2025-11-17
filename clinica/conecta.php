<?php
mysqli_report(MYSQLI_REPORT_OFF);
$host="localhost";
$usuario="root";
$senha="";
$nomedobanco="clinica";
$conexao=@mysqli_connect($host,$usuario,$senha,$nomedobanco);
if(!$conexao)
    {
         echo ("Conexão falhou: ".mysqli_connect_error());
        header('location:sem_con.php');
            
        }
?>