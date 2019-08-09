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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="./login.php">Feed</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link fa fa-plus mt-2" id="addPostagemModal" class="btn btn-primary"
                        data-toggle="modal" data-target="#modalExemplo" href="#"></a>
                </li>
                <li class="nav-item">
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
            <div class="col-12 col-md-6 row-content">
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="https://picsum.photos/50/50" alt="">
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0">@LeeCross</div>
                                    <div class="h7 text-muted">Miracles Lee Cross</div>
                                </div>
                            </div>
                            <div>
                                <div class="dropdown">
                                    <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                                        <div class="h6 dropdown-header">Configuration</div>
                                        <a class="dropdown-item" href="#">Save</a>
                                        <a class="dropdown-item" href="#">Hide</a>
                                        <a class="dropdown-item" href="#">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i>10 min ago</div>
                        <a class="card-link" href="#">
                            <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adip.</h5>
                        </a>
                        <img class="rounded card-img"
                            src="https://cdn.ecvol.com/s/www.gardenmania.com.br/produtos/sementes-de-alecrim-rosmarinus-officinalis/z/0.jpg?v="
                            alt="">
                        <p class="m-2 card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa
                            praesentium esse magnam nemo dolor
                            sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-link"><i class="fa fa-gittip"></i> Like</a>
                        <a href="#" class="card-link"><i class="fa fa-comment"></i> Comment</a>
                        <a href="#" class="card-link"><i class="fa fa-mail-forward"></i> Share</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="lib/js/jquery-3.4.1.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/popper.min.js"></script>
    <script src="lib/js/mdb.min.js"></script>
    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>



</body>

</html>