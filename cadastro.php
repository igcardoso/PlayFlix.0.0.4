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
  <link rel="stylesheet" href="FormsCadastro.css" title="style_login" type="text/css" />
  <title>Registring-account | PlayFlix</title>
</head>
<body>
  <header id="header">
    <h2 class="voltar"><a href="logout.php"><img width="21pt" src="icon_multiple.svg" alt="voltar"></a></h2>
    <h2 class="title_thu">Cadastrar</h2>
    <h1 class="title_center">Não tem uma conta? O que está esperando, cadastre-se e faça parte dos mais de 3,543mil usuarios.</h1>
    <?php
    if (isset($_SESSION['status_cadastro'])):
    ?>
    <a style="color: white; text-decoration: none;" href="login.php"><div class="notification">
      <p>
        Cadastro efetuado!
      </p>
      <p>
        Click aqui para fazer login.
      </p>
    </div>
    </a>
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>
    <?php
    if (isset($_SESSION['usuario_existe'])):
    ?>
    <div style="border: 2px solid #00fe00;" class="notification">
      <h3>Existe um usuario com esse endereço de email, tente fazer login.</h3>
    </div>
    <style type="text/css" media="all">
      #form input {
        position: relative;
        width: 100%;
        height: 45pt;
        font-size: 18pt;
        border-radius: 3em;
        border: 2px solid #00fe00;
        background: #E8F0FE;
        padding-left: 4.4%;
        color: black;
      }
    </style>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
    <form id="form" action="cadastrar.php" method="post">
      <li class="input"><input required="required" placeholder="Digite seu e-Mail" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <li style="display: none;" class="input"><input type="text" name="fp" value="fp_0.jpg" /></li>
      <br>
      <br>
      <li class="input"><input id="usuario" name="usuario" type="text" placeholder="Nome de usuario" required="required"></li>
      <br>
      <br>
      <li class="input"><input id="idade" name="idade" type="number" placeholder="Idade" required="required"></li>
      <br>
      <br>
      <li class="input"><input id="nome_completo" name="nome_completo" type="text" placeholder="Nome completo" required="required"></li>
      <br />
      <br />
      <li class="input"><input required="required" placeholder="Crie uma senha" type="password" name="senha" id="senha" /></li>
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
        já tenho uma conta. <a href="login.php">Fazer login.</a>
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