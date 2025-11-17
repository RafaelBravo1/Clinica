<!DOCTYPE html>
 <?php
 include("logado.php")
 ?>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
</head>
  <body>
    <div class="menu-links">
    <input type="submit" value="Voltar" name="voltar" onclick="voltar()">
    <a href="cadConsulta.php">Marcar Consulta</a>
    <a href="pesConsulta.php">Pesquisar Consulta</a>
    </div>
    <script>     function voltar() {
        window.location="index.php";
    }
</script>
</body>
</html>  
</body>
</html>