<!DOCTYPE html>
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
    ?>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Alecrim</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="./feed.php">Feed</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link fa fa-plus mt-2" id="addPostagemModal" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./perfil.php">Minhas Publicações<span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
        <span class="">
            <form action="destruir.php">
                <<button class="btn btn-sm">
                    SAIR<span class="badge badge-warning "></span>
                    </button>
            </form>

        </span>
        <span class="">Bem Vindo
            <?php
            echo $_SESSION['USER_INFO']['name'];
            ?>
        </span>
    </nav>
    <div class="container">
        <?php
        function render_post($username, $name, $image, $message)
        {
            echo "           
                    <div class='card gedf-card m-md-5 mt-2'>
                        <div class='card-header'>
                            <div class='d-flex justify-content-between align-items-center'>
                                <div class='d-flex justify-content-between align-items-center'>
                                    <div class='mr-2'>
                                        <img class='rounded-circle' width='45' src='https://picsum.photos/50/50' alt=''>
                                    </div>
                                    <div class='ml-2'>
                                        <div class='h5 m-0'>@{$username}</div>
                                        <div class='h7 text-muted'>{$name}</div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class='card-body'>
                            <div class='text-muted h7 mb-2'> <i class='fa fa-clock-o'></i>10 min ago</div>
                            <img class='rounded card-img' src='data:image/jpg;base64, {$image}' />
                            <p class='m-2 card-text'>
                                <h5> {$message} </h5>
                                
                            </p>
                        </div>
                    </div>
            
        ";
        }
        $res = db_select_post();
        $post = mysqli_fetch_assoc($res);

        echo "
            <div class='row d-flex justify-content-center '>
            <div class='col-12 col-md-8 row-content'>";
        while ($post) {
            $userInfoPost = fetch_user_id($post['idUsuario']);
            render_post($userInfoPost['username'], $userInfoPost['nome'], base64_encode($post['image']), $post['message']);
            $post = mysqli_fetch_assoc($res);
        }
        echo "
            </div>
            </div>
        ";
        ?>
        <!-- Modal -->

        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova Publicação</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="card gedf-card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Make
                                                a publication </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="images-tab" data-toggle="tab" role="tab" aria-controls="images" aria-selected="false" href="#images">Images</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                            <div class="form-group">
                                                <label class="sr-only" for="message">post</label>
                                                <textarea class="form-control" id="message" rows="3" placeholder="What are you thinking?" name="message"></textarea>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="imageToUpload" id="imageToUpload">
                                                    <label class="custom-file-label" for="customFile">Upload image</label>
                                                </div>
                                            </div>
                                            <div class="py-4"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="modal-footer">
                            <div class="btn-toolbar justify-content-between">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-primary">share</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="lib/js/jquery-3.4.1.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/mdb.min.js"></script>
</body>

</html>