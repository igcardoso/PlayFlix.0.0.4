<?php
session_start();
include('verifica_login.php');
include('conexao.php');

$nome = "%".trim($_POST['nome'])."%";

$dbh = new PDO('mysql:host=192.168.100.101:3306;dbname=login', 'root', 'root');

$sth = $dbh->prepare('SELECT * FROM `usuario` WHERE `nome` LIKE :foto_perfil');
$sth->bindParam(':foto_perfil', $nome, PDO::PARAM_STR);
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
  <link href="../style_index.css" rel="stylesheet" type="text/css" />
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
      <title>Playflix | <?php echo $Resultado['usuario']; ?></title>
    </head>
    <body>
      <header>
        <nav id="menu-header">
          <ul>
            <li class="logo"><h1>PlayFlix</h1></li>
            <li class="options"><a href="#"><button>Filmes</button></a></li>
            <li class="options"><a href="#"><button>Lançamentos</button></a></li>
            <li id="opcoes" class="options"><a href="#"><button>Opções</button></a>
              <ul class="submenu_opcoes">
                <br>
                <li class="options"><a href="#"><button>Pedidos</button></a>
                  <br>
                  <li class="options"><a href="#"><button>Notificações</button></a>
                  </ul>
                </li>
                <li class="options"><a href="IndexPesquisa.php"><button><i class="icon-search"></i></button></a></li>
                <li class="options"><a href="cont.php"><button><img width="30pt" src="<?php echo $Resultado['foto_perfil']; ?>" alt="conta"></button></a></li>
              </ul>
            </nav>
            <!-- menu-header -->
            <section class="destaque">
              <div class="gradient">
                <nav>
                  <ul id="menu-tv" class="menu">
                    <li class="btn"><a class="options" id="first"><button class="optionsfirstbuttons"><i id="img" class="icon-search"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="config.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!--    busca      -->
                    <li class="btn"><a class="options"><button class="optionsbuttons"><i id="img" class="icon-home"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="conta.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!--    inicio    -->
                    <li class="btn"><a class="options" id="first"><button class="optionsbuttons"><i id="img" class="icon-film"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="conta.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!--     filmes    -->
                    <li class="btn"><a class="options" id="first"><button class="optionsbuttons"><i id="img" class="icon-rocket"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="conta.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!-- Lançamentos   -->
                    <li class="btn"><a class="options"><button class="optionsbuttons"><i id="img" class="icon-plus"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="conta.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!--  pedidos   -->
                    <li class="btn"><a class="options"><button class="optionsbuttons"><i id="img" class="icon-share"></i></button></a>
                      <div class="submenu">
                        <p>
                          <a href="conta.php"><button id="submenuoptions"><img src="<?php echo $Resultado['foto_perfil']; ?>"></button></a>
                        </p>
                        <h4>Olá, <?php echo $Resultado['usuario']; ?></h4>
                        <p>
                          <a href="#" class="options"><button class="primatsubmenuoptions"><i class="icon-search">&nbsp;&nbsp;Buscar</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-home">&nbsp;&nbsp;Inicio</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-film">&nbsp;&nbsp;Filmes</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-rocket">&nbsp;&nbsp;Lançamentos</i></button></a>
                        </p>
                        <p>
                          <a href="#" class="options"><button class="submenuoptions"><i class="icon-plus">&nbsp;&nbsp;pedidos</i></button></a>
                        </p>
                        <p>
                          <a href="logout.php" class="options"><button class="submenuoptionsair">&nbsp;&nbsp;sair</button></a>
                        </p>
                      </div>
                    </li><!-- bell  -->
                  </ul>
                </nav>
                <form action="pag_filme.php" method="post" accept-charset="utf-8">
                  <input style="display: none;" type="text" name="filme_select" id="filme_select" value="Um lugar silencioso - Parte II" />
                  <input style="display: none;" type="text" name="voltar" id="voltar" value="index_cont" />
                  <h1 id="title">Um Lugar Silencioso - Parte II</h1>
                  <br>
                  <h3><a id="clasific"> 14 </a>&nbsp; 2020 ‧ Terror/Thriller ‧ 1h 37m </h3>
                  <p id="sinopsiCl">
                    A família Abbott precisa enfrentar os terrores do mundo exterior enquanto luta pela sobrevivência em silêncio. Forçados a se aventurar no desconhecido, eles percebem que as criaturas que caçam pelo som não são as únicas ameaças no caminho da areia.
                  </p>
                  <p id="sinopsi">
                    A família Abbott precisa enfrentar os terrores do mundo exterior enquanto luta pela sobrevivência em silêncio. Forçados a se aventurar no desconhecido, eles percebem que as criaturas que caçam pelo som não são as únicas ameaças no caminho da areia.</i>
                </p>
                <a><button id="play" class="players" type="submit"><i class="icon-play">&nbsp;&nbsp;Assistir</i></button></a>
                <a id="playT" class="players" style="text-decoration: none;" href="https://youtu.be/BpdDN9d9Jio"><i class="icon-play">&nbsp;&nbsp;Trailer</i></a>
                <p id="assessments">
                  <i>93%</i> gostaram desse filme
                </p>
              </form>
            </div>
          </section>
        </header>
        <!-- destaque -->
        <style>
          .conteudo .card {
            color: white;
            text-decoration: none;
          }
        </style>
        <!-- text-carde -->
        <h3 class="h3">Adicionados recentemente</h3>
        <section class="conteudo">
          <form action="pag_filme.php" method="post" class="card">
            <input style="display: none;" type="text" name="filme_select" value="Cruella" />
            <input style="display: none;" type="text" name="voltar" id="voltar" value="index_cont" />
            <div id="img-card">
              <a href="#"><button id="button" style="background:none; border:none;"><img id="img-tv" style="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6nmZ-dk8N_XpMC4wGgK-hzgKKKDrlNBjsgw&usqp=CAU" draggable="false"alt=""><img id="img-celular" style="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGBWlDFriKzvpZqYDHaRvVeOR_bkvkecejZA&usqp=CAU" draggable="false"alt=""></button></a>
            </div>
            <p>
              Cruella
            </p>
            <p id="p">
              <a> 12 </a>&nbsp; Crime/Aventura • 2h 14m
            </p>
          </form>
        </section>
        <h3 class="h3">Em alta</h3>
        <section class="conteudo">
          <form action="pag_filme.php" method="post" class="card">
            <input style="display: none;" type="text" name="filme_select" value="Maquinas mortais" />
            <input style="display: none;" type="text" name="voltar" id="voltar" value="index_cont" />
            <div id="img-card">
              <a href="maquinas_mortais.php"><button id="button" style="background:none; border:none;"><img id="img-tv" style="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsNu2IMO4jsuMnbhAs5xvVf3F8vDEezVXPGA&usqp=CAU" draggable="false"alt=""><img id="img-celular" style="" src="https://i.pinimg.com/474x/04/29/38/042938ceb59640dd52ad8473ec3cb205.jpg" draggable="false"alt=""></button></a>
            </div>
            <p>
              Maquinas mortais
            </p>
            <p id="p">
              <a> 14 </a>&nbsp; Ação/Ficção • 2h 8m
            </p>
          </form>
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