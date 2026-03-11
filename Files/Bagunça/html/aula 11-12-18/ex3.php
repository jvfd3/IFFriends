<meta http-equiv=Content-Type content=text/xhtml; charset=UTF-8 />
<?php

/*

3.Elabore um formulário em HTML para cadastro de 
nome (text),
curso (select),
turno (radio com manhã, tarde e noite)
disciplinas (checkbox) de interesse de um aluno.
Utilize os botões submit e reset.

Ao enviar os dados, o programa em PHP deve exibir os dados recebidos e, com o comando if, exibir as seguintes mensagens:
Caso turno = manhã: Matrícula efetuada com sucesso. (em verde)
Caso turno = tarde: Turno indisponível no momento. (itálico)
Caso turno = noite: Matrícula deve ser confirmada em até 30 dias. (em negrito)

*/

echo "Confirmando os dados:";

echo "<br> Nome:".$_POST["nome"];
echo "<br> Curso:".$_POST["curso"];
echo "<br> Turno:".$_POST["turno"];
echo "<br> Disciplinas:".$_POST["disc"];		/*vários checkbox to be explained*/

/*
Caso turno = manhã: Matrícula efetuada com sucesso. (em verde)
Caso turno = tarde: Turno indisponível no momento. (itálico)
Caso turno = noite: Matrícula deve ser confirmada em até 30 dias. (em negrito)
*/

		if ($_POST["turno"]=='M') 	{echo "<font color='#/008000'> <br>Matrícula efetuada com sucesso. </font>";}
else	if ($_POST["turno"]=='T')	{echo "<i><br>Turno indisponível no momento.</i>";}
else 	if ($_POST["turno"]=='N')	{echo "<b><br>Matrícula deve ser confirmada em até 30 dias. </b>";}


?>