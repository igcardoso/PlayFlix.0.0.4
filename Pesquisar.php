<?php
if (!isset($_GET['busca'])) {
  header("Location: IndexPesquisa.php");
  exit;
}

$nome = "%".trim($_GET['busca'])."%";

$dbh = new PDO('mysql:host=192.168.100.101:3306;dbname=pesquisa', 'root', 'root');

$sth = $dbh->prepare('SELECT * FROM `filmes` WHERE `nome` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="icon" type="image/jpeg" href="/icon-guia.png" />
  <title>Result | PlayFlix</title>
  <style type="text/css" media="all">

    * {
      margin: 0;
      padding: 0;
    }

    body {
      background: black;
      color: white;
      font-family: Sans-Serif;
    }

    #header {
      text-align: center;
    }


    #form li {
      display: inline-block;
    }

    #form {
      width: 100%;
    }

    #form .input {
      margin: 0;
      width: 90%;
    }

    #form .input:hover input {
      height: 45pt;
      font-size: 16pt;
    }

    #form input {
      position: relative;
      width: 99.1%;
      height: 30pt;
      margin: 0;
      font-size: 12pt;
      border-radius: 0.2em;
      border: none;
      padding-left: 0.9%;
      background: #1A1A1A;
      color: white;

      -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
      transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
    }

    #busca::-webkit-input-placeholder {
      position: absolute;
      top: 25%;
      color: #B6B6B6;

      -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
      transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
    }

    #busca:hover::-webkit-input-placeholder {
      font-size: 16pt;
    }

    #form button {
      position: absolute;
      margin-left: -45pt;
      margin-top: -19pt;
      width: 30pt;
      height: 30pt;
      border: none;
      background: none;
      cursor: pointer;
    }

    #endereco_filme .button_filme {
      width: 89%;
      background-color: transparent;
      border: none;
      border-radius: 0.3em;
      display: inline-block;
      text-align: left;
    }

    #card_filme {
      border-bottom: 2px solid #222222;
      width: 100%;
      padding-bottom: 2%;
      padding-top: 2%;
    }

    #endereco_filme .button_filme img {
      width: 92pt;
      border-radius: 0.8em;
    }

    #endereco_filme {
      position: relative;
      z-index: 1;
    }

    #sinopsi {
      position: absolute;
      font-size: 18pt;
      color: white;
      margin-left: 10pt;
      margin-top: 49pt;
    }

    #title {
      position: absolute;
      margin-left: 104pt;
      font-size: 23pt;
      color: white;
    }

    #label {
      position: absolute;
      background: rgba(0,0,0,0.57);
      border-bottom-right-radius: 0.3em;
      padding: 3pt;
      z-index: 2;
    }

    #idade {
      position: absolute;
      font-size: 14pt;
      color: white;
      margin-left: 10pt;
      margin-top: 27pt;
    }

    #class_idade {
      padding: 2pt;
      border-radius: 0.1em;
    }

    #erro {
      font-size: 16pt;
      font-family: Sans-Serif;
    }

    #erro_p {
      font-size:;
      font-family: Sans-Serif;
      opacity: 0.8;
    }

@media screen and (max-width: 1000px) {

      #sinopsi {
        position: absolute;
        font-size: 13pt;
        color: white;
        margin-left: 10pt;
        margin-top: 49pt;
      }

      #title {
        position: absolute;
        margin-left: 104pt;
        font-size: 18pt;
        color: white;
      }

      #form input {
        position: relative;
        width: 99.1%;
        height: 45pt;
        margin: 0;
        font-size: 16pt;
        border-radius: 0.2em;
        border: none;
        padding-left: 0.9%;
        background: #1A1A1A;
        color: white;

        -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
        transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
      }
    }

  </style>
</head>
<body>
  <header id="header">
    <br>
    <form id="form" action="Pesquisar.php" method="get">
      <li class="input"><input value="<?php echo $_GET['busca']; ?>" required="required" placeholder="Busque por s??ries, filme, g??nero etc." type="text" name="busca" id="busca" /></li>
      <li><button type="submit"><i style="color: white;" class="icon-search"></i></button></li>
    </form>
    <br>

    <?php
    if (count($resultados)) {
      foreach ($resultados as $Resultado) {
        ?>
        <br>
        <br>
        <form action="pag_filme.php" method="post" id="card_filme">
          <label id="label"><?php echo $Resultado['tipo']; ?></label>
          <input style="display: none;" type="text" name="filme_select" value="<?php echo $Resultado['nome']; ?>">
          <input style="display: none;" type="text" name="voltar" id="voltar" value="Pesquisar" />
          <a id="endereco_filme"><button type="submit" class="button_filme"><h1 id="title"><?php echo $Resultado['nome']; ?></h1><img src="<?php echo $Resultado['nome_imagem']; ?>.jpg" alt="<?php echo $Resultado['nome']; ?>"><label id="idade"><label id="class_idade" style="background: #<?php echo $Resultado['color_fachetare']; ?>;"> <?php echo $Resultado['idade']; ?> </label>&nbsp;&nbsp;&nbsp;<?php echo $Resultado['inform']; ?></label><label id="sinopsi"><?php echo $Resultado['sinopsi']; ?></label></button></a>
        </form>
        <br>
        <?
      }
    } else {
      ?>
      <br>
      <br>
      <br>
      <h1 id="erro" style="color: white;">N??o foram encontrados resultados.</h1>
      <p id="erro_p" style="color: white;">
        Busque s??ries para assistir no caminho para o trabalho, filmes para descontrair ou seus g??neros favoritos.
      </p>
      <?php
    }
    ?>
  </header>
</body>
</html>