<?php 
  /* Vai inicializar as variáveis de outros arquivos e não linha 4 não vai permitir que quem longou acesse essa pagina */
	session_start();
	isset($_SESSION['usuario'])?header('Location: pagina-pricipal.php'):"";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  	<title> Cadastro</title>

    <link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
    <link rel="stylesheet" type="text/css" href="_css/cadastro.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="_javascript/funcoes.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="container">
      <!-- Inicio da logo -->
        <div id="logo">
          <header class="text-center">
            <a href="index.php">
              <img src="_imagens/logo3circle.png" class="img-fluid rounded mx-auto d-block">
            </a>
          </header>
        </div>
      <!-- Fim da Primeira logo -->
            
      <!-- Inicio notificação -->
        <?php 
          if(isset($_SESSION['notificacao'])){
            switch ($_SESSION['notificacao']) {
              case 0:
                echo ("
                  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <p class='text-center'>ERRO: Senhas diferentes!</p>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                  </div>
                ");
                break;
              
              case 1:
                echo("
                  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <p class='text-center'>ERRO: Não possui idade suficiente!</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                ");
                break;
                
              case 2:
                echo("
                  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <p class='text-center'>ERRO: O e-mail já está em uso!</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                ");
                break;

              case 3:
                echo("
                  <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <p class='text-center'>Cadastro com sucesso!&nbsp;<a href='index.php'>Clique aqui para fazer login</a></p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                ");
                break;
            }
          }
          unset($_SESSION['notificacao']);
        ?>
      <!-- Fim notificação -->


      <!-- Incio do formulario -->
          <form id="Login" action="cadastrando.php" method="post">
            <div class="input-group mb-3">
                <label for="cNome" class="input-group-prepend input-group-text">Nome:</label>
                <input type="text" name="tNome" id="cNome" class="form-control" size="30" 
                  maxlength="30" placeholder="Nome Completo" required="required"> 
            </div>

            <div class="input-group mb-3">
              <label for="cEmail" class="input-group-prepend input-group-text">E-mail:</label>
              <input type="email" name="tEmail" id="cEmail" class="form-control" size="30" maxlength="113" 
                placeholder="Digite seu E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"required="required"/>
            </div>

            <div class="input-group mb-3">
              <label for="cSenha" class="input-group-prepend input-group-text">Senha:</label>
              <input type="password" name="tSenha" id="cSenha" class="form-control" size="30" 
                minlength="8" maxlength="30" placeholder="Digite a Senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" 
                title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required="required"
              />
            </div>
          
            <div class="input-group mb-3">
              <label for="cRSenha" class="input-group-prepend input-group-text"><span>Senha</span></label>
              <input type="password" name="tRSenha" id="cRSenha" class="form-control" size="30" 
                minlength="8" maxlength="30" placeholder="Digite a Senha Novamente" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}" 
                title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" required="required"
              />
            </div>
              
            <div class="input-group mb-3">
              <label for="cCidade" class="input-group-prepend input-group-text">Cidade:</label>
              <input type="text" name="tCidade" id="cCidade" class="form-control" size="30" maxlength="50" placeholder="Cidade" list="cidade" />
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
            </div>
    
            <div class="input-group mb-3">
              <label for="cBairro" class="input-group-prepend input-group-text">Bairro:</label>
              <input type="text" name="tBairro" id="cBairro" class="form-control" size="30" maxlength="50" placeholder="Bairro"/> 
            </div>
              
            <div class="input-group mb-3">
              <label for="cCurso" class="input-group-prepend input-group-text">Curso:</label>
              <input type="text" name="tCurso" id="cCurso" class="form-control" size="30" maxlength="40" placeholder="Digite o seu Curso"/>
            </div>
              
            <div class="input-group mb-3">
              <label for="cData" class="input-group-prepend input-group-text">Data de Nascimento:</label>
              <input type="date" name="tData" id="cData" class="form-control" size="30" format="dd/MM/yyyy"/>
            </div>
              
            <div class="input-group mb-3">
              <label for="cTele" class="input-group-prepend input-group-text">Telefone:</label>
              <input type="tel" name="tTele" id="cTele" class="form-control" size="30" maxlength="11" placeholder="Digite seu Numero">
            </div>

            <div id="sexo" class="input-group mb-3">
              <label for="Sexo" class="input-group-prepend input-group-text">Gênero:</label>
              <select class="custom-select col-2" name="tSexo" id="Sexo" onchange="mostraCampo(this)"> <!-- Incorporando a função na script -->
                  <option value="" selected="selected">Sexo</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Feminino">Feminino</option>
                  <option value="outros">Outros</option>
                  <input type="text" class="form-control" name="Texto" id="Texto" size="30" 
                  style="visibility: hidden; display: block;">
                  <!-- Torna a parte da escrita visivel -->
              </select>
            </div>

            <div class="input-group mb-3">
              <label for="cNomeS" class="input-group-prepend input-group-text">Nome Social:</label>
              <input type="text" name="tNomeS" id="cNomeS" class="form-control" size="30" maxlength="30" placeholder="Nome exibido na rede social">
            </div>
            
            <div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<button type="submit" class="btn btn-light mb-2">Cadastrar</button>
							</div>

              <div class="btn-group mr-2" role="group" aria-label="Second group">
									<button type="reset" class="btn btn-light mb-2">Apagar</button>
							</div>
						</div>
					</form>
      <!-- Fim do formulario -->    
    </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>