<?php
include "conexao.php";

$erro = "";

if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $resultado = mysqli_query($conexao, "SELECT * FROM usuarios WHERE email = '$email'");
    $usuario = mysqli_fetch_assoc($resultado);

    if ($usuario && password_verify($_POST["senha"], $usuario["senha"])) {
        $_SESSION["id_usuario"] = $usuario["id"];
        $_SESSION["nome"] = $usuario["nome"];
        header("Location: ofertas.php");
        exit;
    } else {
        $erro = "E-mail ou senha incorretos.";
    }
}
?>
<h1>Login</h1>
<p><?php echo $erro; ?></p>
<form method="post">
    E-mail: <input type="email" name="email"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Entrar">
</form>
<a href="cadastro.php">Criar conta</a>
