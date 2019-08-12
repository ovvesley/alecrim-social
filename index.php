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
        header("Location: feed.php");
        return true;
    } else {
        return false;
    }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alecrim</title>
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

    #loginButton {
        background-color: white;

    }

    .custom-control-label {
        color: white;
    }
</style>

<body>
    <div class="container d-flex justify-content-center h-100">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
            </li>
        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form action="login.php" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control input_user" value="" placeholder="username">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember
                                            me</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <button type="submit" id="loginButton" name="loginButton" class="btn login_btn">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="container h-100">
                <div class="d-flex justify-content-center h-100">
                    <div class="user_card">
                        <div class="d-flex justify-content-center">
                        </div>
                        <div class="d-flex justify-content-center form_container">
                            <form action="register.php" method="POST">
                                <div class="input-group mb-3">

                                    <input type="text" name="nameRegister" class="form-control input_user" value="" placeholder="name">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="usernameRegister" class="form-control input_user" value="" placeholder="username">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fa fa-key"></i></span>
                                    </div>
                                    <input type="password" name="passwordRegister" class="form-control input_pass" value="" placeholder="password">
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember
                                            me</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <button type="submit" id="loginButton" name="button" class="btn login_btn">Login</button>
                                </div>
                            </form>
                        </div>
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