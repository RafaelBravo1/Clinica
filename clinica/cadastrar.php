<!DOCTYPE html>
<html lang="pt-br">
    <?php 
   include('logado.php')
   ?>
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografia</title>
</head>

<body>
    <h1>Cadastrar usuário</h1>
    <form method="POST" action="">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>
        <input type="submit" value="Cadastrar"></button>
        <input type="button" value="Voltar" onclick="voltar()">
    </form>
    <?php
    include("conecta.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $senha =password_hash($_POST['senha'], PASSWORD_DEFAULT);
        mysqli_query($conexao, "INSERT INTO `usuarios`(`usuario`, `email`, `senha`) VALUES ('$usuario','$email','$senha')");
    }
    
    ?>
    <script>
    function voltar() {
        window.location = "index.php";
    }
</script>

</body>

</html>