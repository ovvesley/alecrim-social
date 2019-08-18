<?php
session_start();
$valueSession = checkSession($_SESSION['USER_INFO']);
require("./db_requests.php");
function checkSession($USER_INFO)
{
    if ($USER_INFO) {
        echo ('SESSÂO EXISTENTE');
        return true;
    } else {
        header("location: registerFailed.html");
        return false;
    }
}

$USER_INFO = $_SESSION['USER_INFO'];
// function insert_foto($postagem)
// {
//     $image = $_FILES["uploadFoto"]["tmp_name"];
//     $imageBin = convert_image_to_blob($image);
//     $insert = "UPDATE `Usuario` SET fotoPerfil = $imageBin where idUsuario = '$postagem' ";
//     return query_dataBase("alecrim_social", $insert);
// }
// $postagem = insert_foto($USER_INFO['userid']);
// echo $postagem;
// header("location: feed.php");
