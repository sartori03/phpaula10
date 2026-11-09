<?php
include "conexao.php";

$id = (int) $_GET["id"];


if (isset($_POST["comentario"]) && isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
    $comentario = mysqli_real_escape_string($conexao, $_POST["comentario"]);

    mysqli_query($conexao, "INSERT INTO comentarios (id_usuario, id_oferta, comentario)
        VALUES ('$id_usuario', '$id', '$comentario')");

    header("Location: oferta.php?id=$id");
    exit;
}

$resultado = mysqli_query($conexao, "SELECT * FROM ofertas WHERE id = $id");
$oferta = mysqli_fetch_assoc($resultado);
?>
<a href="ofertas.php">Voltar</a>

<h1><?php echo $oferta["nome"]; ?></h1>
<img src="fotos/<?php echo $oferta["foto"]; ?>" width="300">
<p><?php echo $oferta["descricao"]; ?></p>
<p>R$ <?php echo $oferta["valor"]; ?></p>
<p><a href="<?php echo $oferta["link"]; ?>">Ir para a oferta</a></p>

<?php

if (isset($_SESSION["id_usuario"]) && $_SESSION["id_usuario"] == $oferta["id_usuario"]) {
?>
    <a href="apagar_oferta.php?id=<?php echo $oferta["id"]; ?>">Apagar oferta</a>
<?php } ?>

<hr>
<h2>Comentários</h2>

<?php if (isset($_SESSION["id_usuario"])) { ?>
    <form method="post">
        <textarea name="comentario"></textarea><br>
        <input type="submit" value="Comentar">
    </form>
<?php } else { ?>
    <p><a href="login.php">Entre</a> para comentar.</p>
<?php } ?>

<?php

$comentarios = mysqli_query($conexao, "SELECT comentarios.*, usuarios.nome FROM comentarios
    INNER JOIN usuarios ON usuarios.id = comentarios.id_usuario
    WHERE id_oferta = $id ORDER BY comentarios.id DESC");

while ($c = mysqli_fetch_assoc($comentarios)) {
?>
    <p>
        <b><?php echo $c["nome"]; ?>:</b>
        <?php echo $c["comentario"]; ?>
        <?php if (isset($_SESSION["id_usuario"]) && $_SESSION["id_usuario"] == $c["id_usuario"]) { ?>
            <a href="apagar_comentario.php?id=<?php echo $c["id"]; ?>&id_oferta=<?php echo $id; ?>">Apagar</a>
        <?php } ?>
    </p>
<?php
}
?>
