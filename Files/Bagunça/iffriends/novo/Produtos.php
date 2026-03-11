<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*

echo "
<form action=Produtos.php method=POST>

<h1> Cadastro de produtos </h1>	<br>

Código		<input type=text name=codigo>		<br>
Produto		<input type=text name=produto>		<br>
Preço		<input type=text name=preco>		<br>
Quantidade	<input type=text name=quantidade>	<br>

<input type=submit>
</form>
";


*/

//a)Conectar com o MySQL

echo "<br>Conectando o MySQL<br>";
$conexao = mysql_connect ("localhost:3306", "root", "root") or die (mysql_error());

//b)Selecionar o banco de dados

echo "<br>Selecionando o banco de dados<br>";
mysql_select_db("mercado", $conexao);

//c)Inicializar variáveis


echo "<br>Inicializando variáveis<br>";
$codigo = $_POST["codigo"];
$produto = $_POST["produto"];
$preco = $_POST["preco"];
$quantidade = $_POST["quantidade"];

//d)Inserir os dados do formulário na tabela

echo "<br>Inserindo o dado<br>";
$insere = "insert into Produtos values('$codigo','$produto','$preco','$quantidade')";
mysql_query ($insere, $conexao) or die (mysql_error());

//e)Exibir os dados inseridos na tabela com o seguinte cálculo: total = preço * quantidade

echo "<h1>Exibindo o dado</h1>";
$consulta = "select * from Produtos";
$resultado = mysql_query ($consulta, $conexao);
$quant = mysql_num_rows($resultado);

for($i=0;$i<$quant;$i++){
$codigo = mysql_result($resultado,$i,"codigo");
$produto = mysql_result($resultado,$i,"produto");
$preco = mysql_result($resultado,$i,"preco");
$quantidade = mysql_result($resultado,$i,"quantidade");

echo "<br>Código: ".$codigo;
echo "<br>produto: ".$produto;
echo "<br>preco: ".$preco;
echo "<br>quantidade: ".$quantidade;

$total=$preco*$quantidade;
echo"<br>Total: R$".$total;
echo"<br><br>";
}

//f)Encerrar a conexão

echo "<br><br>Encerrando a conexão com o MySQL<br>";
mysql_close ($conexao);
echo "<br><a href=Produtos.html>Voltar ao formulário</a>";

?>