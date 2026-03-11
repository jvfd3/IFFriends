<meta charset=UTF-8 />
<?php

$conexao = mysql_connect ("localhost:3306", "root", "root") or die (mysql_error());
mysql_select_db("iff", $conexao);

$consulta = "select * from alunos";
$resultado = mysql_query ($consulta, $conexao);
$quant = mysql_num_rows($resultado);

echo "<h1> Alunos Aprovados </h1>";

for($i=0;$i<$quant;$i++){
	$codigo = mysql_result($resultado,$i,"codigo");
	$nome = mysql_result($resultado,$i,"nome");
	$media = mysql_result($resultado,$i,"media");
		
		if($media<6){
		echo "<br>Codigo: ".$codigo;
		echo " - Média: ".$media;
		echo " - Nome: ".$nome;
		}

}
mysql_close ($conexao);
echo "<br><a href=prova.html>Voltar ao Formulário</a>";

?>