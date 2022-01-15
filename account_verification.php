<?php
session_start();

$nome = "%".trim($_POST['nome'])."%";

$dbh = new PDO('mysql:host=192.168.100.101:3306;dbname=login', 'root', 'root');

$sth = $dbh->prepare('SELECT * FROM `usuario` WHERE `nome` LIKE :usuario');
$sth->bindParam(':usuario', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/icon-guia.png" title="icon" type="image/png" />
  <title>account-verification</title>
  <style type="text/css" media="all">
@charset"utf-8";

    * {
      margin: 0;
      padding: 0;
    }

    body {
      text-align: center;
      font-family: Sans-Serif;
      background: black;
    }

    h1 {
      margin-top: 5%;
      margin-left: 2%;
      margin-right: 2%;
      font-size: 20pt;
      color: white;
    }

    #img_falha {
      width: 7%;
    }

    #options li {
      margin-top: 6%;
      display: inline-block;
    }

    #options li  .button_ir, .button_voltar {
      border: none;
      border-radius: 3em;
      padding: 18pt;
      font-size: 15pt;
    }

    #options li  .button_voltar {
      border: none;
      border-radius: 3em;
      padding: 18pt;
      font-size: 15pt;
      background: white;
      text-decoration: none;
      color: #0a00ff;
    }

    #options li  .button_ir {
      background: #0a00ff;
      border: none;
      border-radius: 3em;
      padding: 18pt;
      color: white;
    }

    #options li {
      margin-left: 20pt;
    }

    #form li {
      display: inline-block;
    }

    #form {
      width: 100%;
    }

    #form .input {
      width: 62%;
    }

    #form input {
      position: relative;
      width: 100%;
      height: 45pt;
      font-size: 18pt;
      border-radius: 3em;
      border: none;
      padding-left: 4.4%;
      background: #1A1A1A;
      color: white;

      -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
      transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
    }

    #text::-webkit-input-placeholder {
      position: absolute;
      top: 25%;
      color: #B6B6B6;

      -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
      transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
    }

    #text:hover::-webkit-input-placeholder {
      top: -80%;
      font-size: 13pt;
    }

@media screen and (max-width: 1000px) {

      h1 {
        margin-top: 5%;
        margin-left: 5%;
        margin-right: 5%;
        font-size: 20pt;
        color: white;
        width: 90%;
      }

      #form .input {
        width: 87%;
      }

      #img_falha {
        width: 12%;
      }
    }

  </style>
</head>
<body>
  <?php
  if (count($resultados)) {
    foreach ($resultados as $Resultado) {
      ?>
      <h1>Olá, <?php echo $Resultado['usuario']; ?>. Está gostando do nosso site?<br> Visite nossas rededes sociais!</h1>
      <br>
      <a href="#">
        <img id="img_falha" src="icon_instagram.png" alt="instagram" />
        <br>
      </a>
      <h3 style="color: white;">@PlayFlix_72</h3>
      <br>
      <div id="options">
        <li><a href="index_cont.php"><button class="button_ir" type="submit">Continuar</button></a></li>
        <li><a class="button_voltar" href="logout.php">Voltar ao inicio</a></li>
      </div>
      <?
    }
  } else {
    ?>
    <br>
    <br>
    <br>
    <style type="text/css" media="all">
      #error li {
        text-align: center;
      }

      #error {
        width: 100%;
        font-family: Sans-Serif;
      }

      #erro {
        opacity: 0.4;
      }

      #erro_p {
        padding: 5pt;
        font-size: 13pt;
      }
    </style>
    <ul id="error">
      <li><h2 id="erro" style="color: white;">"Não foi possível conectar ao PlayFlix"</h2></li>
      <br>
      <li><a href="index_cont.php" style="color: white;"><button id="erro_p">Tentar novamente</button></a></li>
    </ul>
    <?php
  }
  ?>
</body>
</html>