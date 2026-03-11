<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*

6. Elaborar um formulário (HTML) para entrada dos seguintes dados: código do produto, nome do produto,
quantidade do produto e preço. Use texts. Com um radio para o tipo da compra (atacado ou varejo) e um select para um tipo de
produto (nacional ou importado). Coloque um titulo (Cadastro de Compras) e uma figura.
O formulário deve acionar o programa em PHP que vai mostrar os dados digitados e os seguintes cálculos:
total da compra = quantidade * preço
total do imposto = total da compra * 0.05
se o produto foi importado, a taxa de importação = preço * 0.08

*/

echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Cargo:".$_POST["cargo"];
echo "<br> Salário:".$_POST["sal"];



echo "<br>Imposto devido:".$_POST["sal"]*0.05;



?>