<?php
include "conexao.php";
?>
<h1>Ofertas</h1>

<?php if (isset($_SESSION["id_usuario"])) { ?>
    Olá, <?php echo $_SESSION["nome"]; ?> |
    <a href="nova_oferta.php">Nova oferta</a> |
    <a href="sair.php">Sair</a>
<?php } else { ?>
    <a href="login.php">Entrar</a> |
    <a href="cadastro.php">Cadastrar</a>
<?php } ?>

<hr>

<?php

$resultado = mysqli_query($conexao, "SELECT * FROM ofertas ORDER BY id DESC");

while ($oferta = mysqli_fetch_assoc($resultado)) {
?>
    <a href="oferta.php?id=<?php echo $oferta["id"]; ?>">
        <img src="fotos/<?php echo $oferta["foto"]; ?>" width="150">
    </a>
    <p>R$ <?php echo $oferta["valor"]; ?></p>
    <hr>
<?php
}
?>
