<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php


/*
1.Elabore um formulário que solicite o nome, o cargo e o salário da pessoa. O programa em PHP deve informar o imposto devido: 5% do salário.
*/

echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Cargo:".$_POST["cargo"];
echo "<br> Salário:".$_POST["sal"];



echo "<br>Imposto devido:".$_POST["sal"]*0.05;



?>