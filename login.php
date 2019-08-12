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

    require("./db_requests.php");

    $login_password = $_POST['password'];
    $login_username = $_POST['username'];
    $login_button = $_POST['loginButton'];
    function isSubscript($login_username, $login_password)
    {
        $queryVerificar = "SELECT * FROM Usuario WHERE username ='$login_username' AND senha = '$login_password'";
        $res = query_dataBase("alecrim_social", $queryVerificar);
        if (mysqli_fetch_assoc($res)) {
            return true;
        } else {
            header("Location: registerFailed.html");
            return false;
        }
    }
    $status_login = (isSubscript($login_username, $login_password));
    echo $status_login;
    if ($status_login == false) {
        header("location: registerFailed.html");
    }else{
        $_SESSION['USER_INFO'] = fetch_user($login_username);
        header("location: feed.php");
    }
    ?>
        <script src="lib/js/jquery-3.4.1.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/mdb.min.js"></script>
</body>

</html>