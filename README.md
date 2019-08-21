<p align="center">
  <a href="http://serverboladao.eu5.org/">
    <img src="http://serverboladao.eu5.org/favicon.ico" alt="Alecrim Social" width=72 height=72>
  </a>
  
  <h3 align="center">Alecrim Social</h3>
  
  
<p align="center"><a href="http://serverboladao.eu5.org/">Acesse Aqui</a> </p>
  <p align="center">
    a plant social network.
    <br>
    <a href="https://reponame/issues/new?template=bug.md">Algum Problema?</a>
    ·
    <a href="https://reponame/issues/new?template=feature.md&labels=feature">Alguma Sugestão?</a>
  </p>
</p>




## Como Feito

Utilizando PHP, MYSQL, Bootstrap (JS, CSS, HTML);

```text
alecrim-social/
└── ├── index.php
    ├── login.php
    ├── register.php
    ...
```

<p align="center"> 
  Versão Web
  <img src="https://github.com/vvesly/alecrim-social/blob/master/screen-alecrim/Captura%20de%20tela%20de%202019-08-20%2000-32-36.png?raw=true" alt="Web">
</p>



## Verificando Sessão:

Ao iniciar o login [C1] eu criei uma verificação [C2] em cada página para que fosse possível iniciar a verificação se
a sessão usuário é existente.

[C1]
```php
 if ($status_login == false) {
        header("location: registerFailed.html");
 }else{
        $_SESSION['USER_INFO'] = fetch_user($login_username);
        header("location: feed.php");
 }

```

```text
fetch_user($login_username);
----------------------------
Função que através do username, entrega um array associtívo que com todos os dados
necessários e os atribuí em uma varíavel de sessão.

```




[C2]
```php
session_start();
    $valueSession = checkSession($_SESSION['USER_INFO']);
    function checkSession($USER_INFO)
    {
        if ($USER_INFO) {
            return true;
        } else {
            header("location: registerFailed.html");
            return false;
        }
    }
    ?>
```

<p align="center"> Versão Mobile </p>

<p align="center"> 
  <img src="https://github.com/vvesly/alecrim-social/blob/master/screen-alecrim/Captura%20de%20tela%20de%202019-08-20%2000-31-42.png?raw=true" alt="Mobile">
</p>

## Feed:
```text
Feed gerado através de uma requisição ao banco de dados a Tabela Postagem. 
Mostrando todos as tuplas de forma descrescente.
```

```mysql
"SELECT * FROM Postagem WHERE idUsuario  ='$idUsuario' ORDER BY idPostagem DESC";
```
## Login Usuario, Registro e Verificações:
```text
Para verificação de usuario existente no registro A[2]. E verificação do Login A[1]
```
Verificação no login:
[A1]
```php
    $login_password = $_POST['password'];
    $login_username = $_POST['username'];
    $login_button = $_POST['loginButton'];
    function isSubscript($login_username, $login_password)
    {
        $queryVerificar = "SELECT * FROM Usuario WHERE username ='$login_username' AND senha = '$login_password'";
        // query_dataBase
        $res = query_dataBase("1166807", $queryVerificar);
        
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

```

```php
   function query_dataBase($banco, $query)
{
    require("./credential.credrential/credential.php");
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
```

Registro Verificação:
A[2] 
```text
Verificação de usuario existente no registro com mensagem de erro para usuario ja cadastrados ou senhas não validas.
```

```php
$username = $_POST['usernameRegister'];
$name = $_POST['nameRegister'];
$senha = $_POST['passwordRegister'];
$query_select = "SELECT username FROM Usuario WHERE username = '$username'";
$res = query_dataBase("1166807", $query_select);
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
        $resInsert = query_dataBase("1166807", $queryInsert);
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
```







Modelo Lógico Banco de Dados mysql:

```text
Usuario(idUsuario, username, nome, senha);
Postagem(idPostagem, message, image);
```

## Um pouco sobre e motivações:

Um cadin de tempo livre e vontade de programar leva a fazer coisas assim.

Utilizado para Desenvolvimento Web - Prof. Renato - 3BINFO. CEFET-RJ.


## Muito Obrigado.


## Copyright and license

[MIT License].

Enjoy :metal:
