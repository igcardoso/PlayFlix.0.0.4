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
  <title>Edit Foto Perfil | PlayFlix</title>
</head>
<body>
  <header id="header">
    <h2 class="voltar"><a href="cont.php"><img width="21pt" src="icon_multiple.svg" alt="voltar"></a></h2>
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
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_2.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_2.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_3.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_3.jpg" alt="enviar"></button></li>
    </form>
    <br><br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_3.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_3.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_4.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_4.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_5.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_5.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_6.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_6.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_7.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_7.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_8.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_8.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_9.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_9.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_10.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_10.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_11.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_11.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_12.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_12.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_13.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_13.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_14.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_14.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_15.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_15.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_16.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_16.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_17.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_17.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_18.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_18.jpg" alt="enviar"></button></li>
    </form>
    <br>
    <br>
    <form id="form" action="FotoPerfil_enviar.php" method="POST">
      <li style="display: none;" class="input"><input required="required" placeholder="Digite sua senha atual" type="email" name="nome" id="email" value="<?php echo $_SESSION['nome']; ?>" /></li>
      <br>
      <br>
    
      <li style="display:none;" class="input"><input value="fp_19.jpg"type="text" name="foto" id="senha2" /></li>
      <li><button type="submit"><img src="fp_19.jpg" alt="enviar"></button></li>
    </form>
  </header>
</body>
</html>