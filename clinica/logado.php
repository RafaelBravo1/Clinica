   <?php 
   include("conecta.php");
    session_start();
    if($_SESSION['usuario']){
        echo "<div class='nome'>".$_SESSION['usuario']." logado";
        ?>
        <input type="button" value="Logoff" onclick="window.location='logoff.php'">
        </div>
    
        <?php
    }
    else{
        session_abort();
        header('location:login.php');
    }?>
