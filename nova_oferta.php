<?php
include "conexao.php";

if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST["nome"])) {
    $id_usuario = $_SESSION["id_usuario"];
    $nome = mysqli_real_escape_string($conexao, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conexao, $_POST["descricao"]);
    $link = mysqli_real_escape_string($conexao, $_POST["link"]);
    $valor = $_POST["valor"];

   
    $foto = time() . "_" . $_FILES["foto"]["name"];
    move_uploaded_file($_FILES["foto"]["tmp_name"], "fotos/" . $foto);

    mysqli_query($conexao, "INSERT INTO ofertas (id_usuario, nome, descricao, foto, link, valor)
        VALUES ('$id_usuario', '$nome', '$descricao', '$foto', '$link', '$valor')");

    header("Location: ofertas.php");
    exit;
}
?>
<h1>Nova oferta</h1>
<form method="post" enctype="multipart/form-data">
    Nome: <input type="text" name="nome"><br>
    Descrição: <textarea name="descricao"></textarea><br>
    Foto: <input type="file" name="foto"><br>
    Link: <input type="text" name="link"><br>
    Valor: <input type="number" step="0.01" name="valor"><br>
    <input type="submit" value="Salvar">
</form>
<a href="ofertas.php">Voltar</a>
