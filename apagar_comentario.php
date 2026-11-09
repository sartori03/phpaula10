<?php
include "conexao.php";

$id = (int) $_GET["id"];
$id_oferta = (int) $_GET["id_oferta"];

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];
   
    mysqli_query($conexao, "DELETE FROM comentarios WHERE id = $id AND id_usuario = $id_usuario");
}

header("Location: oferta.php?id=$id_oferta");
