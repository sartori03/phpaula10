<?php
include "conexao.php";

if (isset($_POST["email"])) {
    $email = mysqli_real_escape_string($conexao, $_POST["email"]);
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    mysqli_query($conexao, "INSERT INTO usuarios (email, nome, senha) VALUES ('$email', '$nome', '$senha')");
    header("Location: login.php");
    exit;
}
?>
<h1>Cadastro</h1>
<form method="post">
    E-mail: <input type="email" name="email"><br>
    Nome: <input type="text" name="nome"><br>
    Senha: <input type="password" name="senha"><br>
    <input type="submit" value="Cadastrar">
</form>
<a href="login.php">Já tenho conta</a>
