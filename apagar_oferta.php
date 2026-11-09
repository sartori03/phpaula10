<?php
include "conexao.php";

$id = (int) $_GET["id"];

if (isset($_SESSION["id_usuario"])) {
    $id_usuario = $_SESSION["id_usuario"];

    
    $resultado = mysqli_query($conexao, "SELECT * FROM ofertas WHERE id = $id AND id_usuario = $id_usuario");

    if (mysqli_num_rows($resultado) > 0) {
       
        mysqli_query($conexao, "DELETE FROM comentarios WHERE id_oferta = $id");
        mysqli_query($conexao, "DELETE FROM ofertas WHERE id = $id");
    }
}

header("Location: ofertas.php");
