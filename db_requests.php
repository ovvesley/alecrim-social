<?php
    echo "$login_password /// $login_username";
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

    function convert_image_to_blob($image){
        return $imagetmp=addslashes(file_get_contents($image));


    }