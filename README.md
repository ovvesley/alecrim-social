<p align="center">
  <a href="https://example.com/">
    <img src="http://serverboladao.eu5.org/favicon.ico" alt="Alecrim Social" width=72 height=72>
  </a>

  <h3 align="center">Alecrim Social</h3>

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

## Feed:
```text
Feed gerado através de uma requisição ao banco de dados a Tabela Postagem. 
Mostrando todos as tuplas de forma descrescente.
```

```mysql
"SELECT * FROM Postagem WHERE idUsuario  ='$idUsuario' ORDER BY idPostagem DESC";
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
