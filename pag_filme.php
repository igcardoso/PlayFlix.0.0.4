<?php
if (!isset($_POST['filme_select'])) {
  header("Location: index_cont.php");
  exit;
}

$nome = "%".trim($_POST['filme_select'])."%";

$dbh = new PDO('mysql:host=192.168.100.101:3306;dbname=pesquisa', 'root', 'root');

$sth = $dbh->prepare('SELECT * FROM `filmes` WHERE `nome` LIKE :nome');
$sth->bindParam(':nome', $nome, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta content="PlayFlix, Filmes online, Séries online, Filme online, Séries online, Filmes dublado, Filmes legendado, Séries dublado, Séries legendado, Filmes online dublado, Filmes grátis, Assistir filmes, Assistir filmes online, Assistir filmes grátis, Assistir filmes dublado, Assistir filmes legendado, Assistir séries grátis, Assistir séries dublado, Assistir séries legendado, PlayFlix, PlayFlix filmes, PlayFlix séries, Assistir PlayFlix, Assistir filmes 1080p, Assistir filmes 720p, Assistir filmes no celular, Assistir filmes mobile, Assistir séries no celular, PlayFlix grátis" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="icon" type="image/jpeg" href="/icon-guia.png" />
  <link href="style_filmes.css" rel="stylesheet" type="text/css" />
</head>
<body style="background:black; font-family: Sans-Serif;">
  <?php
  if (count($resultados)) {
    foreach ($resultados as $Resultado) {
      ?>
      <style type="text/css" media="all">


        section.destaque {
          position: relative;
          background-image: url('<?php echo $Resultado['nome_imagem_fund'];
          ?>');
          background-size: 100%;
          background-position: center;
          width: 100%;
          padding-bottom: 30.1%;
          z-index: 2;
        }


@media screen and (max-width: 1000px) {


          section.destaque {
            position: relative;
            background-size: cover;
            background-position: center;
            width: 100%;
            padding-bottom: 97%;
            z-index: 2;
            text-align: left;
          }
        }

      </style>
      <section class="destaque">
        <div class="gradient">
          <br>
          <button id="voltar"><a style="width: 30pt; height: 30pt;" href="<?php echo $_POST['voltar']; ?>.php"><img width="100%" src="icon_voltar.png" alt="voltar"></a></button>
          <form action="<?php echo $Resultado['tipo']; ?>.php" method="post" accept-charset="utf-8">
            <input style="display: none;" type="text" name="<?php echo $Resultado['tipo']; ?>'" value="<?php echo $Resultado['nome']; ?>" />
            <button id="play" type="submit"><img style="z-index: 1;" width="100%" src="icon_play_filme.png" alt="Play" /></button>
          </form>
          <h1 id="title"><?php echo $Resultado['nome']; ?></h1>
          <br>
          <h3><a style="background: #<?php echo $Resultado['color_fachetare']; ?>;" id="clasific"> <?php echo $Resultado['idade']; ?> </a>&nbsp; <?php echo $Resultado['inform']; ?></h3>
          <h3 id="assessments"><i><?php echo $Resultado['relevanse']; ?></i> gostaram desse filme</h3>
          <h3 id="assessments">Elenco: <?php echo $Resultado['elenco_imagem1']; ?>, <?php echo $Resultado['elenco_imagem2']; ?>, <?php echo $Resultado['elenco_imagem3']; ?></h3>
          <p id="sinopsiCl">
            <?php echo $Resultado['sinopsi']; ?>
          </p>
          <p id="sinopsi">
            <?php echo $Resultado['sinopsi']; ?>
          </p>
          <button id="button_trailler" type="submit">Trailler</button>
          <h3 id="title_elenco">Elenco:</h3>
          <br>
          <div class="conteudo">
            <div class="card">
              <div id="img-card">
                <button id="button"></button>
                <img id="img-celular" src="<?php echo $Resultado['elenco_imagemlink1']; ?>" draggable="false" alt="<?php echo $Resultado['elenco_imagem1']; ?>">
              </div>
              <p style="color: white;">
                <?php echo $Resultado['elenco_imagem1']; ?>
              </p>
            </div>
            <div class="card">
              <div id="img-card">
                <button id="button"></button>
                <img id="img-celular" src="<?php echo $Resultado['elenco_imagemlink2']; ?>" draggable="false" alt="<?php echo $Resultado['elenco_imagem2']; ?>">
              </div>
              <p style="color: white;">
                <?php echo $Resultado['elenco_imagem2']; ?>
              </p>
            </div>
            <div class="card">
              <div id="img-card">
                <button id="button"></button>
                <img id="img-celular" src="<?php echo $Resultado['elenco_imagemlink3']; ?>" draggable="false" alt="<?php echo $Resultado['elenco_imagem3']; ?>">
              </div>
              <p style="color: white;">
                <?php echo $Resultado['elenco_imagem3']; ?>
              </p>
            </div>
          </div>
        </div>
      </section>
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
      <li><a href="pag_filme.php" style="color: white;"><button id="erro_p">Tentar novamente</button></a></li>
    </ul>
    <?php
  }
  ?>
</body>
</html>