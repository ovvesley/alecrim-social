<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
    @import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");

    body {
        font-family: 'Montserrat', sans-serif;
        background: #112233;
    }

    #loginButton {
        background-color: white;

    }

    .custom-control-label {
        color: white;
    }
</style>


<?php
require("./db_requests.php");
$username = $_POST['usernameRegister'];
$name = $_POST['nameRegister'];
$senha = $_POST['passwordRegister'];

$query_select = "SELECT username FROM Usuario WHERE username = '$username'";
$res = query_dataBase("alecrim_social", $query_select);
$array = mysqli_fetch_array($res);
$usernameArray = $array['username'];
if ($username == "" || $username == null) {
    echo "
    <script language='javascript' type='text/javascript'>
        alert('O campo login deve ser preenchido');window.location.href='
        cadastro.html';
        window.location.href = 'index.php'
    </script>";
} else {
    if ($usernameArray == $username) {
        echo "
        <script language='javascript' type='text/javascript'>
            alert('Esse login já existe');
            window.location.href = 'index.php'
        </script>
        ";
    } else {
        $queryInsert = "INSERT INTO Usuario (nome, username, senha) VALUES ('$name','$username','$senha')";
        $resInsert = query_dataBase("alecrim_social", $queryInsert);
        if ($resInsert) {
            echo " 
            <script language='javascript' type='text/javascript'>
                alert('Usuário cadastrado com sucesso!');
                window.location.href = 'index.php'
          </script>
          ";
        } else {
            echo "<script language='javascript' type='text/javascript'>
                        alert('Não foi possível cadastrar esse usuário')
                        window.location.href = 'index.php'
                  </script>
          
          ";
        }
    }
}
    // header("location: index.php")
