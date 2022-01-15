<?php
session_start();
include("conexao.php");

$usuario = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select usuario from usuario where nome = '{$usuario}'";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="forms.css" title="style_login" type="text/css" />
  <title>Edit password | PlayFlix</title>
</head>
<body>
  <header id="header">
    <h2 class="voltar"><a href="cont.php"><img width="21pt" src="icon_multiple.svg" alt="voltar"></a></h2>
    <h2 class="title_thu">Editar senha</h2>
    <h1 class="title_center"></h1>
    <?php
    if (isset($_SESSION['status_cadastro'])):
    ?>
    <div style="border: 2px solid #01ff00" class="notification">
      <p>
        sua senha foi editada com sucesso!
      </p>
    </div>
    <?php
    endif;
    unset($_SESSION['status_cadastro']);
    ?>
    <?php
    if (isset($_SESSION['usuario_existe'])):
    ?>
    <div style="border: 2px solid rgb(254,0,0);" class="notification">
      <h3>ops! algo deu errado.</h3>
    </div>
    <style type="text/css" media="all">
      #form input {
        position: relative;
        width: 100%;
        height: 45pt;
        font-size: 18pt;
        border-radius: 3em;
        border: 2px solid rgb(254,0,0);
        background: #E8F0FE;
        padding-left: 4.4%;
        color: black;
      }
    </style>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>
    <form id="form" action="renomear_senha.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
      <li class="input"><input required="required" placeholder=" Digite sua senha" type="password" name="SenhaAntiga" id="senha" /></li>
      <li id="mostrar"><a onclick="mostrarSenha()"><img width="64pt" src="mostrar_icon.png" alt="" /></a></li>
      <style>
        #form input {
          position: relative;
        }

        #mostrar {
          position: absolute;
          margin-left: -37pt;
          margin-top: 1.6%;
          opacity: 0.2;
        }

        #mostrar:hover {
          opacity: 1;
        }
      </style>
      <br>
      <br>
      <li class="input"><input required="required" placeholder="Nova senha" type="password" name="senha" id="senha2" /></li>
      <li id="mostrar2"><a onclick="mostrarSenha2()"><img width="64pt" src="mostrar_icon.png" alt="" /></a></li>
      <li><button type="submit"><img src="icon_set_left.svg" alt="enviar"></button></li>
    </form>
    <style>
      #form input {
        position: relative;
      }

      #mostrar2 {
        position: absolute;
        margin-left: -70pt;
        margin-top: 1.6%;
        opacity: 0.2;
      }

      #mostrar2:hover {
        opacity: 1;
      }
    </style>
    <div class="open">
      <p>
        <a href="#">Esqueceu a senha?</a>
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
    
    function mostrarSenha2() {
      var tipo = document.getElementById("senha2");
      if (tipo.type == "password") {
        tipo.type = "text";
      } else {
        tipo.type = "password";
      }
    }
  </script>
</body>
</html>