<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$nome_completo = mysqli_real_escape_string($conexao, trim($_POST['nome_completo']));
$idade = mysqli_real_escape_string($conexao, trim($_POST['idade']));
$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
$fp = mysqli_real_escape_string($conexao, trim($_POST['fp']));

$sql = "select count(*) as total from usuario where nome = '$nome'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;
}

$sql = "INSERT INTO usuario (nome, usuario, nome_completo, idade, senha, foto_perfil, data_cadastro) VALUES ('$nome', '$usuario', '$nome_completo', '$idade', '$senha', '$fp', NOW())";

if($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>