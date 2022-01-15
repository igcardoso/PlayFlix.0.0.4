<?php
if (!isset($_POST['Filme'])) {
  header("Location: index_cont.php");
  exit;
}

$nome = "%".trim($_POST['Filme'])."%";

$dbh = new PDO('mysql:host=0.0.0.0:3306;dbname=pesquisa', 'root', 'root');

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
  <link href="jlplayer.css" rel="stylesheet" type="text/css" />
  <script src="jlplayer.js" async></script>
</head>
<body style="background:black; font-family: Sans-Serif;">
  <?php
  if (count($resultados)) {
    foreach ($resultados as $Resultado) {
      ?>
      <style type="text/css" media="all">

        #voltar {
          width: 40pt;
          height: 40pt;
          padding: 10pt;
          margin-top: -1%;
          margin-left: 1%;
          background-color: transparent;
          border: none;
          border-radius: 10em;

          -webkit-transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
          transition: 0.5s left,0.5s width,0.5s opacity,0.5s;
        }

        #voltar:hover {
          background: #6c6c6cc7;

          -webkit-animation: jlplayer-sk-bouncedelay1sease-in-out both;
          animation: jlplayer-sk-bouncedelay1sease-in-out both;
        }

@keyframes jlplayer-sk-bouncedelay {
          0%, 80%, 100% {
            -webkit-transform: scale(0);
            transform: scale(0);
          }
          40% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
          }
        }

      </style>
      <section class="destaque">
        <div class="gradient">

          <div class="video-container">

            <!-- Chamar elemento vídeo com class jlplayer-video -->
            <video preload="none" class="jlplayer-video">
              <source src="<?php echo $Resultado['endereco_vfilme']; ?><?php echo $_POST['number']; ?>.mp4" type="video/mp4">
              <track kind="subtitles" srclang="pt-br" label="Português" src="<?php echo $Resultado['endereco_vfilme']; ?><?php echo $_POST['number']; ?>.vtt" />
              <track kind="subtitles" srclang="en-eu" label="Inglês" src="legenda.vtt" />
            </video>

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