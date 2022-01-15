<?php
session_start();
if(!$_SESSION['nome']) {
	header('Location: entrar.php ');
	exit();
}