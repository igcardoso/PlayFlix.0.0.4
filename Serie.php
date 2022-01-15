<?php
session_start();

$nome = "%".trim($_POST['nome'])."%";

$dbh = new PDO('mysql:host=192.168.100.101:3306;dbname=pesquisa', 'root', 'root');

$sth = $dbh->prepare('SELECT * FROM `series` WHERE `nome` LIKE :nome');
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
  <script src="index.js"></script>
  <style type="text/css" media="all">
    body {
      background-color: #000;
    }
  </style>
  <?php
  if (count($resultados)) {
    foreach ($resultados as $Resultado) {
      ?>
      <title></title>
    </head>
    <body>
      <header>
        <style type="text/css" media="all">
          header {
            color: white;
            font-family: Sans-Serif;
          }

          #title {
            width: 100%;
            text-align: center;
          }

          #title p {
            font-size: 16pt;
          }

          .A1 {
            padding-left: 1.4%;
          }

          .A1 button {
            width: 140pt;
            border: none;
            border-radius: 0.8em;
            background: none;
          }

          .A1 img {
            border-radius: 0.8em;
          }

          .A1 form li {
            display: inline-block;
            text-align: left;
          }

          #li_inform {
            margin-top: -2%;
            position: absolute;
          }

          /*Temporada nao existe*/

          .A0 {
            display: none;
          }

          #temporada1 .child {
            display: none;
          }

          .A1 {
            display: block;
          }

        </style>
        <div id="title">
          <br>
          <p>
            <?php echo $Resultado['nome']; ?>
          </p>
          <br>
        </div>
        <br>
        <br>
        <div class="<?php echo $Resultado['tmp1']; ?>" id="temporada1">
          <h3><?php echo $Resultado['temParM']; ?> 1</h3>
          <div id="container">
            <div class="child">
              <form action="">
                <input style="display: none;" name="endereco" type="text" value="<?php echo $Resultado['endereco_serie']; ?>_ep1.mp4">
                <li><button type="submit"><img width="100%" src="<?php echo $Resultado['nome_imagem_fund']; ?>_ep1.jpg" alt="episodio"></button></li>
                <li id="li_inform"><h2>1. <?php echo $Resultado['episodio']; ?> 1</h2>
                  <p>
                    <?php echo $Resultado['resume_episodio']; ?>
                  </p>
                </li>
              </form>
            </div>
            <div class="child">
              02
            </div>
            <div class="child">
              03
            </div>
            <div class="child">
              04
            </div>
            <div class="child">
              05
            </div>
            <div class="child">
              06
            </div>
            <div class="child">
              07
            </div>
            <div class="child">
              08
            </div>
            <div class="child">
              09
            </div>
            <div class="child">
              10
            </div>
            <div class="child">
              11
            </div>
            <div class="child">
              12
            </div>
          </div>
        </div>
        <div class="<?php echo $Resultado['tmp2']; ?>" id="temporada1">
          <h3><?php echo $Resultado['temParM']; ?> 2</h3>
          <div id="container">
            <div class="child2">
              <form action="">
                <input style="display: none;" name="endereco" type="text" value="<?php echo $Resultado['endereco_serie']; ?>_ep2.mp4">
                <li><button type="submit"><img width="100%" src="<?php echo $Resultado['nome_imagem_fund']; ?>_ep2.jpg" alt="episodio"></button></li>
                <li id="li_inform"><h2>2. <?php echo $Resultado['episodio']; ?> 2</h2>
                  <p>
                    <?php echo $Resultado['resume_episodio']; ?>
                  </p>
                </li>
              </form>
            </div>
          </div>
        </div>
        <script type="text/javascript" charset="utf-8">
          const divs = document.querySelectorAll('.child')
          let selectedDivs = <?php echo $Resultado['epdT1_number']; ?>;

          for (let i = 0; i < selectedDivs; i++) {
            const element = divs[i]
            element.style.display = 'block';
          }
          
          const divs = document.querySelectorAll('.child2')
          let selectedDivs = <?php echo $Resultado['epdT1_number']; ?>;

          for (let i = 0; i < selectedDivs; i++) {
            const element = divs[i]
            element.style.display = 'block';
          }

        </script>
      </header>
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
</section>
<script type="text/javascript" charset="utf-8">

</script>
</body>
</html>