<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*
2.
Altere o programa para que, calcule o imposto de acordo com a faixa salarial:
Abaixo de 1.000,00: 2%
Entre 1.000,00 e 2.000,00: 5%
Acima de 2.000,00: 7%
*/

echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Cargo:".$_POST["cargo"];
echo "<br> Salário:".$_POST["sal"];

$sal=$_POST["sal"];

echo "<br>local:".$sal;
echo "<br>post:".$_POST["sal"];

		if ($sal>=0 && $sal<1000)		{echo "<br>Imposto devido:".$sal*0.02;}
else	if ($sal>=1000 && $sal<=2000)	{echo "<br>Imposto devido:".$sal*0.05;}
else	if ($sal>2000)				{echo "<br>Imposto devido:".$sal*0.07;}
else								{echo "Valor não condiz";}





?>