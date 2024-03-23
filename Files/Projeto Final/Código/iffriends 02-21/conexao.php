<?php
	define('HOST', 'Localhost:3306');
	define('USUARIO', 'root');
	define('SENHA', '');
	define('DB', 'rede-social2');

	$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');
?>