<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['idade']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));

$sql = "UPDATE `usuario` SET `nome` = '$email', `usuario` = '$usuario', `idade` = '$idade', `nome_completo` = '$nome_completo' WHERE `nome` = '$nome' and `senha` = '$senha'";

if ($conexao->query($sql) === TRUE) {
  $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: renome_email_form.php');
exit;
?>