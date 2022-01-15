<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));

$sql = "select count(*) as total from usuario where nome = '$nome'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
  $_SESSION['usuario_existe'] = true;
  header('Location: entrar.php');
  exit;
}

if ($row['total'] == 0) {
  $_SESSION['sem-cadastro'] = true;
  header('Location: cadastro.php');
  exit();
}
?>