<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*

4. O preço de um ingresso, para um evento esportivo, varia conforme a idade do usuário.
Se a idade estiver entre 10 e 17 anos, o ingresso terá um desconto de 30%.
Se a idade for maior que 18 anos, o ingresso terá um desconto de 10%.
Elabore um programa que leia o nome (text), o sexo (radio), a idade (text) do usuário e o preço inicial do ingresso (text),
calcule o valor do ingresso conforme a idade e exiba o valor calculado para o usuário.

*/

echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Cargo:".$_POST["cargo"];
echo "<br> Salário:".$_POST["sal"];



echo "<br>Imposto devido:".$_POST["sal"]*0.05;



?>