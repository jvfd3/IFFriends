<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

echo "Disciplinas selecionadas:<br>";
for($i = 0; $i < count($_POST["dis"]); $i++)
echo $_POST["dis"][$i]."<br>";
?>