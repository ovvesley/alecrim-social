<?php
require("./db_requests.php");
$username = $_POST['usernameRegister'];
$name = $_POST['nameRegister'];
$senha = $_POST['passwordRegister'];

$query_select = "SELECT username FROM Usuario WHERE username = '$username'";
$res = query_dataBase("alecrim_social", $query_select);
$array = mysqli_fetch_array($res);
$usernameArray = $array['username']; 
var_dump($usernameArray)."<br>";
var_dump($username);
  if($username == "" || $username == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>"; 
    }else{
      if($usernameArray == $username){ 
        echo"
        <script language='javascript' type='text/javascript'>
        alert('Esse login já existe');</script>
        ";
      }else{
        $queryInsert = "INSERT INTO Usuario (nome, username, senha) VALUES ('$name','$username','$senha')";
        $resInsert = query_dataBase("alecrim_social", $queryInsert);
        if($resInsert){
          echo" <script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');</script>
          ";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário')</script>";
        }
      }
    }
?>