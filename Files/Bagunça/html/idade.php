<?php
echo "Confirmando os dados: Nome, Idade";
echo "<br> Nome:".$_POST["nome"];
echo "<br> Idade:".$_Post["idade"];



if($_POST["idade"])
	echo "<br> Maior de idade";
else echo "<br> Menor de idade";


?>