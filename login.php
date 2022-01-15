<?php
session_start();
include('conexao.php');

if (empty($_POST['nome']) || empty($_POST['senha'])) {
  header('Location: entrar.php');
  exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT * FROM usuario WHERE nome = '{$usuario}' and senha = ('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
  $_SESSION['nome'] = $usuario;
  header('Location: account_verification.php');
  exit();
} else {
  $_SESSION['nao_autenticado'] = true;
  header('Location: entrar.php');
  exit();
}