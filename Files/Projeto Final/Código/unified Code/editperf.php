<meta charset="utf-8">
<?php
	include('verifica-login.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<script src='nightly.min.js'></script>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/perfil.css">
		<link rel="stylesheet" type="text/css" href="_css/editperf.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
			
		<!-- Script que permite que na opção o usuario escreva qual é o seu sexo -->
	      <script type="text/javascript">
	        function mostraCampo(obj) {
	            var select=document.getElementById('Sexo')
	            var txt = document.getElementById("Texto")
	            txt.style.visibility = (select.value == 'outros') 
	            ? "visible"
	            : "hidden"; 
	        }
	      </script>
    	<!-- Fim do script -->
	</head>
	<body>
		<!-- menu da pagina -->
			<div id="interface">
				<table>
					<tr>
						<td>
							<!-- Incio da barra de pesquisa -->
								<div id="divBusca">
									<input type="text" id="txtBusca" placeholder="Buscar..."/>
									<a href="pesquisa.html"><button id="btnBusca"><img src="_imagens/1.png"/></button>
								</div>
							<!-- Fim da barra de pesquisa -->
						</td>
						<td>
								<div id="sair"><a href="logout.php">sair</a></div>
						</td>
					</tr>
				</table>
			</div>
		<!-- Fim de menu -->

		<!-- ver amigos online -->
			<div id="online">
				<center><h1>Online</h1></center>
				<hr>
			</div>
			<div id="amigo">
				<center>
					<table>
						<tr><td></td></tr><!-- aqui ira aparecer os amigos online -->
					</table>
				</center>
			</div>
		<!-- fim de amigos online -->
		<!-- pesqusa de amigos -->
			<div id="busca">
				<table id="busca">
					<tr>
						<td id="pesquisa">
							<div id="divPesquisa">
								<input type="text" id="tBusca" placeholder="Pesquisar"/>
								<button id="bBusca"><img src="_imagens/1.png"/></button>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<!-- Fim da pesquisa de amigos-->

		<!-- editar seus dados -->
			<div id="postagens">
				<center>
					<table id="or">
						<tr> <td rowspan="4">
						<a href=profpic.jpg> <img src="_imagens/profpic.jpg" width=200></a><br></td>

						</tr>
					</table>
					<br><br>
					<div id="or">
						<form id="Login" method="post" action="atualiza-dados.php">
	            			<table id="ajuste" align="center">
	            				<?php 
	            					$id=$_SESSION['id'];
	            					$nome=$_SESSION['nome'];
	            					$email=$_SESSION['email'];
	            					$cidade=$_SESSION['cidade'];
	            					$bairro=$_SESSION['bairro'];
	            					$curso=$_SESSION['curso'];
	            					$data=$_SESSION['data'];
	            					$telefone=$_SESSION['telefone'];
	            					$genero=$_SESSION['genero'];
	            					$nome_social=$_SESSION['nome_social'];
	            					$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$senha = $rows['senha'];
										$rsenha = $rows['rsenha'];
									}
									$_SESSION['senha'] = $senha;
									$_SESSION['rsenha'] = $rsenha;
	            				?>
	              				<tr>
					                <td><label for="cNome">Nome:</label></td>
					                <td>
					                	<?php 
					                		echo "<input type='text' name='tNome' id='cNome' size='30' maxlength='50' placeholder='$nome'>"; 
					                	?> 
					                </td>
				              	</tr>

				              	<tr>
				                	<td><label for="cEmail">E-mail:</label></td>
				                	<td>
				                		<?php 
					                	echo "<input type='email' name='tEmail' id='cEmail' size='30' maxlength='113' placeholder='$email'>";
					                	?>
					                </td>
				              	</tr>

				              	<tr>
				              		<td><label for="">Senha:</label></td>
				              		<td><input type="password" name="tSenha" id="cSenha" size="30" maxlength="30" placeholder="digite a senha"></td>
				              	</tr>

				              	<tr>
				              		<td><label for="">Re-Senha:</label></td>
				              		<td><input type="password" name="tRSenha" id="cRSenha" size="30" maxlength="30" placeholder="digite a senha novamente"></td>
				              	</tr>

								<tr>
					                <td><label for="cCidade">Cidade:</label></td>
					                <td>
					                	<?php
					                	echo"<input type='text' name='tCidade' id='cCidade' size='30' maxlength='50' placeholder='$cidade' list='cidade' />";
					                	?>
					                  <datalist id="cidade">
					                      <option value="Angra dos Reis"></option>
					                      <option value="Aperibe"></option>
					                      <option value="Araruama"></option>
					                      <option value="Areal"></option>
					                      <option value="Armacao de Buzios"></option>
					                      <option value="Arraial do Cabo"></option>
					                      <option value="Barra Mansa"></option>
					                      <option value="Barra do Pirai"></option>
					                      <option value="Belford Roxo"></option>
					                      <option value="Bom Jardim"></option>
					                      <option value="Bom Jesus do Itabapoana"></option>
					                      <option value="Cabo Frio"></option>
					                      <option value="Cachoeiras de Macacu"></option>
					                      <option value="Cambuci"></option>
					                      <option value="Campos dos Goytacazes"></option>
					                      <option value="Cantagalo"></option>
					                      <option value="Carapebus"></option>
					                      <option value="Cardoso Moreira"></option>
					                      <option value="Carmo"></option>
					                      <option value="Casimiro de Abreu"></option>
					                      <option value="Comendador Levy Gasparian"></option>
					                      <option value="Conceicao de Macabu"></option>
					                      <option value="Cordeiro"></option>
					                      <option value="Duas Barras"></option>
					                      <option value="Duque de Caxias"></option>
					                      <option value="Engenheiro Paulo de Frontin"></option>
					                      <option value="Guapimirim"></option>
					                      <option value="Iguaba Grande"></option>
					                      <option value="Itaborai"></option>
					                      <option value="Itaguai"></option>
					                      <option value="Italva"></option>
					                      <option value="Itaocara"></option>
					                      <option value="Itaperuna"></option>
					                      <option value="Itatiaia"></option>
					                      <option value="Japeri"></option>
					                      <option value="Laje do Muriae"></option>
					                      <option value="Macae"></option>
					                      <option value="Macuco"></option>
					                      <option value="Mage"></option>
					                      <option value="Mangaratiba"></option>
					                      <option value="Marica"></option>
					                      <option value="Mendes"></option>
					                      <option value="Miguel Pereira"></option>
					                      <option value="Miracema"></option>
					                      <option value="Natividade"></option>
					                      <option value="Nilopolis"></option>
					                      <option value="Niteroi"></option>
					                      <option value="Nova Friburgo"></option>
					                      <option value="Nova Iguacu"></option>
					                      <option value="Paracambi"></option>
					                      <option value="Paraiba do Sul"></option>
					                      <option value="Parati"></option>
					                      <option value="Paty do Alferes"></option>
					                      <option value="Petropolis"></option>
					                      <option value="Pinheiral"></option>
					                      <option value="Pirai"></option>
					                      <option value="Porciuncula"></option>
					                      <option value="Porto Real"></option>
					                      <option value="Quatis"></option>
					                      <option value="Queimados"></option>
					                      <option value="Quissama"></option>
					                      <option value="Resende"></option>
					                      <option value="Rio Bonito"></option>
					                      <option value="Rio Claro"></option>
					                      <option value="Rio das Flores"></option>
					                      <option value="Rio das Ostras"></option>
					                      <option value="Rio de Janeiro"></option>
					                      <option value="Santa Maria Madalena"></option>
					                      <option value="Santo Antonio de Padua"></option>
					                      <option value="Sao Fidelis"></option>
					                      <option value="Sao Francisco de Itabapoana"></option>
					                      <option value="Sao Goncalo"></option>
					                      <option value="Sao Joao da Barra"></option>
					                      <option value="Sao Joao de Meriti"></option>
					                      <option value="Sao Jose de Uba"></option>
					                      <option value="Sao Jose do Vale do Rio Preto"></option>
					                      <option value="Sao Pedro da Aldeia"></option>
					                      <option value="Sao Sebastiao do Alto"></option>
					                      <option value="Sapucaia"></option>
					                      <option value="Saquarema"></option>
					                      <option value="Seropedica"></option>
					                      <option value="Silva Jardim"></option>
					                      <option value="Sumidouro"></option>
					                      <option value="Tangua"></option>
					                      <option value="Teresopolis"></option>
					                      <option value="Trajano de Morais"></option>
					                      <option value="Tres Rios"></option>
					                      <option value="Valenca"></option>
					                      <option value="Varre-Sai"></option>
					                      <option value="Vassouras"></option>
					                      <option value="Volta Redonda"></option>
					                  </datalist>
					              	</td>
		              			</tr>

		              			<tr>
	              					<td><label for="cCurso">Bairro:&nbsp;</label></td>
	              					<td><input type="text" name="tBairro" id="cBairro" size="30" maxlength="40" placeholder="<?php echo $bairro; ?>"/></td>
	            				</tr>

								<tr>
	              					<td><label for="cCurso">Curso:&nbsp;</label></td>
	              					<td><input type="text" name="tCurso" id="cCurso" size="30" maxlength="40" placeholder="<?php echo $curso; ?>"/></td>
	            				</tr>

					            <tr>
					              <td><label for="cDate" id="cData">Data de Nascimento:</label></td>
					                <td><input type="date" name="TData" id="cData" size="30" /></td>
					            </tr>
					            
					            <tr>
					              <td><label for="cTele">Telefone:</label></td>
					              <td><input type="tel" name="tTele" id="cTele" size="30" maxlength="11" placeholder="<?php echo $telefone; ?>"></td>
					            </tr>

					            <tr id="sexo">
					              	<td><label for="gene">Gênero:</label></td>
					              	<td><select class="form-group" name="Sexo" id="Sexo" onchange="mostraCampo(this);"> <!-- Incorporando a função na opção -->
					                  	<option value="" selected="selected"><?php echo $genero; ?></option>
					                  	<option value="Masculino">Masculino</option>
						                <option value="Feminino">Feminino</option>
						                <option value="outros">Outros</option>
					                  	<input type="text" class="form-control" name="Texto" id="Texto" size="30" style="visibility: hidden; display: block; float: left; margin-top: -8%; height: 30%; position: relative;"><!-- Torna a parte da escrita visivel -->
					              	</select></td>
					          	</tr>

					            <tr>
					              <td><label for="cNomeS">Nome Social:</label></td>
					              <td><input type="text" name="tNomeS" id="cNomeS" size="30" maxlength="30" placeholder="<?php echo $nome_social; ?>"></td>
					            </tr>

					            <tr id="apagar">
					              	<td><label for="gene">Excluir conta:</label></td>
					              	<td>
					              		<select name="apagar" id="apagar">
						                  	<option value="1" selected="selected">selecionar</option>
						                  	<option value="0">Excluir</option>
							                <option value="1">Não Excluir</option>
					              		</select>
					              </td>
					          	</tr>
	          				</table>
	          				<br><input type="submit" value="Salvar" id="s"> </a>
						</form>
					</div>
				</center>
			</div>
		<!-- fim de editar seus dados -->
	</body>
</html>