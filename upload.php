<?php
require ("./db_requests.php");
function create_post(){
    $image = $_FILES["imageToUpload"]["tmp_name"];
    $imageBin = convert_image_to_blob($image);
    $message = $_POST["message"];
    header("location: login.php");
    return array(
        "userid" => 1,
        "message" => $message,
        "image"   => $imageBin,
    ); 
}
function insert_post($postagem){
    $insert = "INSERT INTO `Postagem`(`message`, `image`, `idUsuario`) VALUES ('{$postagem['message']}', '{$postagem['image']}', {$postagem['userid']})";    
    return query_dataBase("alecrim_social", $insert);
}
$postagem = create_post();
insert_post($postagem);

