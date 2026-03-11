<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*

5. Elabore um programa que leia os valores de dois números reais (text),
a operação aritmética desejada (select) e calcule a resposta adequada, de acordo com: adição, subtração, divisão ou multiplicação.

*/

echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Cargo:".$_POST["cargo"];
echo "<br> Salário:".$_POST["sal"];



echo "<br>Imposto devido:".$_POST["sal"]*0.05;



?>