<!DOCTYPE html>
<?php
session_start();
$login_password = $_POST['password'];
$login_username = $_POST['username'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photogram</title>
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/mdb.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Alecrim</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                <li class="nav-item ">
                    <a class="nav-link" href="./login.php">Feed</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link fa fa-plus mt-2" id="addPostagemModal" href="#"></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="./perfil.php">Minhas Publicações<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>



        <span class="">Bem Vindo
            <?php
            echo "$login_username"
            ?>
        </span>
    </nav>

    <?php
    echo "$login_password /// $login_username";
    function exibir_mensagem($login_username)
    {
        connect_dataBase($login_username, $login_password);
    }




    function connect_dataBase($banco, $query)
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
    ?>

    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="col-12 col-md-8 row-content">

            </div>
        </div>
    </div>


    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/mdb.min.js"></script>
</body>

</html>