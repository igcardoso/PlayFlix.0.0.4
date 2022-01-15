<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$foto = mysqli_real_escape_string($conexao, trim($_POST['foto']));

$sql = "select count(*) as total from usuario where senha = '$nome'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 2) {
  $_SESSION['usuario_existe'] = true;
  header('Location: foto_perfil.php');
  exit;
}

$sql = "UPDATE `usuario` SET `foto_perfil` = '$foto' WHERE `nome` = '$nome' ";

if ($conexao->query($sql) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: foto_perfil.php');
exit;
?>