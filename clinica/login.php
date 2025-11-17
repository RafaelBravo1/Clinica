<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografia</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>
        <input type="submit" value="Login"></button>
    </form>
    <?php
session_start();

if (!empty($_POST['email']) && !empty($_POST['senha'])) {
    include('conecta.php');
    $usuario = $_POST['email'];
    $senha = $_POST['senha'];
    $query = "SELECT * FROM `usuarios` WHERE `email`='$usuario'";
    $sql = mysqli_query($conexao, $query);

    if (mysqli_num_rows($sql) >= 1) {
        $dadosBanco = mysqli_fetch_assoc($sql);//pega os dados do usuário e coloca na variavel
        $senhaCriptografada = $dadosBanco['senha'];//separa o dado expecifico "senha" para outra variavel
        if (password_verify($senha, $senhaCriptografada))/* verifica se a senha digitada($senha) é a descriptografia da senha que está no banco($senhaCriptografada) */ {
            $_SESSION['usuario'] = $dadosBanco['usuario'];
            header('location:index.php');
        } else {
            unset($_SESSION['usuario']);
            echo "usuario ou senha inválido";
        }
    } else {
        unset($_SESSION['usuario']);
        header('location:index.php');
    }
}

    ?>
</body>

</html>