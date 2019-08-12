<!DOCTYPE html>
<?php
session_start();
$login_password = $_POST['password'];
$login_username = $_POST['username'];
var_dump($_SESSION['USER_INFO']);

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

<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
    @import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");

    body {
        font-family: 'Montserrat', sans-serif;
        background: #112233;

    }
</style>



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
    <i class="fa fa-cloud-upload" aria-hidden="true"></i>



    </div>

    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/mdb.min.js"></script>
</body>

</html>