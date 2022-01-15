<?php
session_start();
include("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="forms.css" title="style_login" type="text/css" />
  <title>Login-account | PlayFlix</title>
</head>
<body>
  <header id="header">
    <h2 class="voltar"><a href="logout.php"><img width="21pt" src="icon_multiple.svg" alt="voltar"></a></h2>
    <h2 class="title_thu">Login</h2>
    <h1 class="title_center">Faça login da sua conta e aproveite diversos filmes, series, desenhos e muito mais</h1>
    <?php
    if (isset($_SESSION['nao_autenticado'])):
    ?>
    <div style="border: 2px solid red;" class="notification">
      <p>
        ERRO: Usuário ou senha inválidos.
      </p>
    </div>
    <style type="text/css" media="all">
      #form input {
        position: relative;
        width: 100%;
        height: 45pt;
        font-size: 18pt;
        border-radius: 3em;
        border: 2px solid red;
        background: #E8F0FE;
        padding-left: 4.4%;
        color: black;
      }
    </style>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <?php
    if (isset($_SESSION['usuario_existe'])):
    ?>
    <div style="border: 2px solid #00fe00;" class="notification">
      <h3>Existe um usuario com esse endereço de email, faça login.</h3>
    </div>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
    <form id="form" action="login.php" method="POST">
      <li class="input"><input required="required" placeholder="Digite seu e-Mail" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br />
      <br />
      <li class="input"><input required="required" placeholder="Digite sua senha" type="password" name="senha" id="senha" /></li>
      <li id="mostrar"><a onclick="mostrarSenha()"><img width="64pt" src="mostrar_icon.png" alt="" /></a></li>
      <li><button type="submit"><img src="icon_set_left.svg" alt="enviar"></button></li>
    </form>
    <style>
      #form input {
        position: relative;
      }

      #mostrar {
        position: absolute;
        margin-left: -70pt;
        margin-top: 1.6%;
        opacity: 0.2;
      }

      #mostrar:hover {
        opacity: 1;
      }
    </style>
    <div class="open">
      <p>
        <a href="#">Esqueceu a senha?</a>
      </p>
      <p>
        não tem uma conta? <a href="cadastro.php">Cadastre-se.</a>
      </p>
    </div>
  </header>
  <script type="text/javascript" charset="utf-8">
    function mostrarSenha() {
      var tipo = document.getElementById("senha");
      if (tipo.type == "password") {
        tipo.type = "text";
      } else {
        tipo.type = "password";
      }
    }
  </script>
</body>
</html>