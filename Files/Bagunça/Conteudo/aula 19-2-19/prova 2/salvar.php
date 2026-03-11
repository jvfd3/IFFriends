<meta charset=UTF-8 />
<?php

echo "<h1>Resumo das informações</h1>";

$codigo = $_POST["codigo"];
$nome = $_POST["nome"];
$media = $_POST["media"];

echo "<br>Código: ".$codigo;
echo "<br>Nome: ".$nome;
echo "<br>Média: ".$media;
echo "<br>Aluno salvo no banco";
echo "<br><br> <a href=prova.html> Voltar ao Formulário </a>";



//a)Conectar com o MySQL

$conexao = mysql_connect ("localhost:3306", "root", "root") or die (mysql_error());

//b)Selecionar o banco de dados

mysql_select_db("iff", $conexao);

//d)Inserir os dados do formulário na tabela

$insere = "insert into alunos values('$codigo','$nome','$media')";
mysql_query ($insere, $conexao) or die (mysql_error());

//f)Encerrar a conexão

mysql_close ($conexao);

?>