<?php
define('HOST', '192.168.100.101:3306');
define('USUARIO', 'root');
define('SENHA', 'root');
define('DB', 'login');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');