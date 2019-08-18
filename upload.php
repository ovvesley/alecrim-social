<?php
session_start();
$valueSession = checkSession($_SESSION['USER_INFO']);
require("./db_requests.php");
function checkSession($USER_INFO)
{
    if ($USER_INFO) {
        var_dump($USER_INFO);
        echo ('SESSÂO EXISTENTE');
        return true;
    } else {
        header("location: registerFailed.html");
        return false;
    }
}
$USER_INFO = $_SESSION['USER_INFO'];
function create_post($userid)
{
    $image = $_FILES["imageToUpload"]["tmp_name"];
    $imageBin = convert_image_to_blob($image);
    $message = $_POST["message"];
    return array(
        "userid" => $userid,
        "message" => $message,
        "image"   => $imageBin,
    );
}
function insert_post($postagem)
{
    $insert = "INSERT INTO `Postagem`(`message`, `image`, `idUsuario`) VALUES ('{$postagem['message']}', '{$postagem['image']}', {$postagem['userid']})";
    return query_dataBase("1166807", $insert);
}
$postagem = create_post($USER_INFO['userid']);
insert_post($postagem);
header("location: feed.php");
