<!DOCTYPE html>
<html lang="pt-br">
  <head>
  	<meta charset="utf-8"/>
  	<title> Cadastro</title><!-- Nome que pagina tem -->
  	<!-- Onde fica o arquivo de estilo da pagina -->
      <link rel="stylesheet" type="text/css" href="_css/estilo.css">
      <link rel="stylesheet" type="text/css" href="_css/estilo-1.css" media="screen and (max-width: 870px) and(min-width: 420px)">
      <link rel="stylesheet" type="text/css" href="_css/estilo-2.css" media="screen and (max-width: 414px)">
    <!-- Reaproveitando o arquivo de estilo da pagin index -->
  	<!-- Onde fica o arquivo de estilo da pagina -->
    <link rel="stylesheet" type="text/css" href="_css/cadastro.css" media="screen and (min-width:0px)">
    <link rel="stylesheet" type="text/css" href="_css/cadastro-1.css" media="screen and (width: 640px)">
    
    <!-- Icone que fica na pagina -->
    <link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" />

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
    <!-- Primeira divisão da pagina -->
      <!-- Criar a logo da pagina -->
        <div id="primeira">
        <header id="cabecalho">
          <a id="icone" href="pagina1.html"><img id="icone" src="_imagens/Logo2.png"></a><!-- Cria um link na logo OBS: tem que trocar o href no futuro -->
        </header>
        </div>
      <!-- Fim da Primeira divisão da pagina -->
    <!--terceira divisão da pagina -->
      <div id="inicio">
        <!-- Inicio do formulario -->
          <form id="Login" action="cadastro.php" method="post">
            <table id="ajuste" align="center">
              <tr>
                <td><label for="cNome">Nome:</label></td>
              </tr>

              <tr>
                <td><label for="cEmail">E-mail:</label></td>
              </tr>

              <tr>
                <td><label for="cSenha" id="cSenha">Senha:</label></td>
              </tr>

              <tr>
                <td><label for="cRSenha">&nbsp;</label></td>
              </tr>

              <tr>
                <td><label for="cCidade">Cidade:</label></td>
              </tr>

              <tr>
                <td><label for="cBairro">Bairro:</label></td>
              </tr>

              <tr>
                <td><label for="cCurso">Curso:</label></td>
              </tr>

              <tr>
                <td><label for="cDate" id="cData">Data de Nascimento:</label></td>
              </tr>

              <tr>
                <td><label for="cTele">Telefone:</label></td>
              </tr>

              <tr>
                <td><label for="gene">Gênero:</label></td>
              </tr>

              <tr>
                <td><label for="cNomeS">Nome Social:</label></td>
              <tr>
            </table>
            <table id="ajuste1" align="center">
              <tr>
                <td><input type="text" name="tNome" id="cNome" size="30" maxlength="50" placeholder="Nome Completo" required="required"></td>
              </tr>

              <tr>
                <td><input type="email" name="tEmail" id="cEmail" size="30" maxlength="113" placeholder="Digite seu E-mail" required="required"/></td>
              </tr>

              <tr>
                <td><input type="password" name="tSenha" id="cSenha" size="30" minlength="8" maxlength="30" pattern="[0-9a-fA-F]{4,8}" placeholder="Digite a Senha" required="required"/><br></td>
              </tr>
              <tr>
                  <td><input type="password" name="tRSenha" id="cRSenha" size="30" minlength="8" maxlength="30" placeholder="Digite a Senha Novamente" required="required"/></td>
              </tr>

              <tr>
                <td><input type="text" name="tCidade" id="cCidade" size="30" maxlength="50" placeholder="Cidade" list="cidade" />
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
                  </datalist></td>
              </tr>

            <tr>
                <td><input type="text" name="tBairro" id="cBairro" size="30" maxlength="50" placeholder="Bairro"/></td>
            </tr>

            <tr>
              <td><input type="text" name="tCurso" id="cCurso" size="30" maxlength="40" placeholder="Digite o seu Curso"/></td>
            </tr>

            <tr>
                <td><date-util format="dd/MM/yyyy"><input type="date" name="tData" id="cData" size="30" format="dd/MM/yyyy"/></date-util></td>
            </tr>
            
            <tr>
              <td><input type="tel" name="tTele" id="cTele" size="30" maxlength="11" placeholder="Digite seu Numero"></td>
            </tr>

            <tr id="sexo">
              <td><select class="form-group" name="tSexo" id="Sexo" onchange="mostraCampo(this);"> <!-- Incorporando a função na opção -->
                  <option value="" selected="selected">Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="outros">Outros</option>
                  <input type="text" class="form-control" name="Texto" id="Texto" size="30" style="visibility: hidden; display: block; float: left; margin-top: -45px; height: 45px; position: relative;"><!-- Torna a parte da escrita visivel -->

              </select></td></tr>

            <tr>
              <td><input type="text" name="tNomeS" id="cNomeS" size="30" maxlength="30" placeholder="Nome exibido na rede social"></td>
            </tr>
          </table>
            
            <div id="button">
              <button type="submit" class="button">Cadastrar</button>
            </div>

            <div id="button1">
              <button type="reset" class="button">Apagar</button>
            </div>
            </form>
          </form>
        <!-- Fim do formulario -->
      </div>
    <!-- Fim da terceira divisão da pagina -->
    <?php
      error_reporting(0);
      ini_set(“display_errors”, 0 );

      $nome = isset($_POST["tNome"])?$_POST["tNome"]:"";
      $email = isset($_POST["tEmail"])?$_POST["tEmail"]:"";
      $senha = isset($_POST["tSenha"])?$_POST["tSenha"]:"";
      $rsenha = isset($_POST["tRSenha"])?$_POST["tRSenha"]:"";
      $cidade = isset($_POST["tCidade"])?$_POST["tCidade"]:"";
      $bairro = isset($_POST["tBairro"])?$_POST["tBairro"]:"";
      $curso = isset($_POST["tCurso"])?$_POST["tCurso"]:"";
      $data = isset($_POST["tData"])?$_POST["tData"]:"";
      $tele = isset($_POST["tTele"])?$_POST["tTele"]:"";
      $sexo = isset($_POST["tSexo"])?$_POST["tSexo"]:"";
      $nomes = isset($_POST["tNomeS"])?$_POST["tNomeS"]:"";
      $ano = date("Y-m-d");
      $ano -= $data;
      if($nome === ""){}
      else{
      if($senha != $rsenha){
      echo "senha invalida tente novamente<br>";
      }
      elseif($ano < 14){
      echo "você não tem idade para se cadastra nesse site";
      }
      else{
      if($sexo === outros){
      $sexo = $_POST["Texto"];
      }

      $conn = new mysqli('Localhost:3306','root','','rede social') or die ('erro ao conedar');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $teste = "INSERT INTO `usuario` (nome, email, senha, rsenha, cidade, bairro, curso, data_de_nascimento, telefone, genero, nome_social)VALUES ";
      $teste .= "('$nome', '$email', '$senha', '$rsenha', '$cidade', '$bairro', '$curso', '$data', '$tele', '$sexo', '$nomes')";

      if (mysqli_query($conn, $teste)) {
               echo "cadastro com sucesso!<br>";
               echo "<a href='index.php'>Clique aqui para fazer login</a>";
            } else {
               echo "Error: " . $teste . "" . mysqli_error($conn);
            }
      mysqli_close($conn);
    }}
    ?>
</body>
</html>