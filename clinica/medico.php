<!DOCTYPE html>
    <?php 
    include('logado.php')?>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médicos</title>
</head>
<body>
    <div class="menu-links">
    <input type="submit" value="Voltar" name="voltar" onclick="voltar()">
    <a href="cadmedico.php">Cadastrar Médico</a>
    <a href="listamedico.php">Lista de Médicos</a>
    </div>
    <script>     function voltar() {
        window.location="index.php";
    }
</script>
</body>
</html>