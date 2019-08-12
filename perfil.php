<!DOCTYPE html>
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
function render_post($username, $name, $image, $message)
{
    echo "           
                    <div class='card gedf-card m-2'>
                        <div class='card-header'>
                            <div class='d-flex align-items-center'>
                                <div class='d-flex align-items-center'>
                                    <div class=''>
                                        <div class=' m-0'>@{$username}</div>
                                        <div class=' text-muted'>{$name}</div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class='card-body'>
                            <img class='rounded card-img' src='data:image/jpg;base64, {$image}' />
                            <p class='m-0 card-text'>
                                <h5> {$message} </h5>                                
                            </p>
                        </div>
                    </div>
            
        ";
}
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
                    <a class="nav-link" href="./feed.php">Feed</a>
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


    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="row">
                  
                        <?php
                        for ($i = 1; $i <= 10; $i++) {
                            echo("  <div class='col-md-4 col-12'>");
                            render_post("vvesly", 'Wesley Santos', null, "aaaasjkasssssssssssssaa");
                            echo("</div>");
                        }                       

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <script src="lib/js/jquery-3.4.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/popper.min.js"></script>
    <script src="lib/js/mdb.min.js"></script>
</body>

</html>