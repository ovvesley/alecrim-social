<?php
function exibir_mensagem($login_username)
{
    connect_dataBase($login_username, $login_password);
}
function query_dataBase($banco, $query)
{
    $host = "localhost";
    $usuario = "vvesley";
    $senha = "1334";
    $connect = mysqli_connect($host, $usuario, $senha, $banco);
    if (!$connect) {
        echo $mysqli_error($connect);
    }

    $resposta = mysqli_query($connect, $query);
    if ($resposta) {
        return $resposta;
    } else {
        echo mysqli_error($connect);
    }
}

function convert_image_to_blob($image)
{
    return $imagetmp = addslashes(file_get_contents($image));
}

function db_select_post()
{
    // header("content-type:image/jpeg");
    $select = "select * from Postagem ORDER BY idPostagem DESC";
    $res = query_dataBase("alecrim_social", $select);
    return $res;
}

function db_select_my_post($idUsuario)
{
    // header("content-type:image/jpeg");
    $select = "SELECT * FROM Postagem WHERE idUsuario  ='$idUsuario' ORDER BY idPostagem DESC";
    $res = query_dataBase("alecrim_social", $select);
    return $res;
}

function fetch_user($username)
{
    $queryVerificar = "SELECT * FROM Usuario WHERE username ='$username'";
    $res = query_dataBase("alecrim_social", $queryVerificar);
    $arrRes = mysqli_fetch_assoc($res);
    
    return array(
        "userid" => intval($arrRes['idUsuario']),
        "name" => $arrRes['nome'],
        "username"   =>  $arrRes['username'],
    );
}
function fetch_user_id($userId)
{
    $queryVerificar = "SELECT * FROM Usuario WHERE idUsuario ='$userId'";
    $res = query_dataBase("alecrim_social", $queryVerificar);
    $arrRes = mysqli_fetch_assoc($res);
    
    return array(
        "userid" => intval($arrRes['idUsuario']),
        "name" => $arrRes['nome'],
        "username"   =>  $arrRes['username'],
    );
}
