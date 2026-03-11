<?php
echo "Confirmando os dados:";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Idade:".$_POST["idade"];



if($_POST["idade"]>=18)
	echo "<br> Maior de idade";
else echo "<br> Menor de idade";


?>