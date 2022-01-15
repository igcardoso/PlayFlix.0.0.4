<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$SenhaAntiga = mysqli_real_escape_string($conexao, trim($_POST['SenhaAntiga']));

$sql = "select count(*) as total from usuario where senha = '$nome'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 2) {
  $_SESSION['usuario_existe'] = true;
  header('Location: renome_senha_form.php');
  exit;
}

$sql = "UPDATE `usuario` SET `senha` = '$senha' WHERE `nome` = '$nome' and `senha` = '$SenhaAntiga'";

if ($conexao->query($sql) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: renome_senha_form.php');
exit;
?>