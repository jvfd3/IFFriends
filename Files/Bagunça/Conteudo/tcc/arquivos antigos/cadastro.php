<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title> IFFTool cadastro</title>
	<a href="index.php"><img src="_imagens/LogoIFF1.png" width="100%"></a>
	<link rel="stylesheet" type="text/css" href="_css/inicio.css">
	<link rel="stylesheet" type="text/css" href="_css/cadastro.css">
  <link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" />
  <script type="text/javascript">
    function mostraCampo(obj) {
      var select=document.getElementById('Sexo')
      var txt = document.getElementById("Texto")
      txt.style.visibility = (select.value == 'outros') 
      ? "visible"
      : "hidden"; 
    }
  </script>
  <?php
      $a=@$_POST['cor'];
      $b="#ffffff";
    ?>
    <style> 
      body{ 
      background-color: <?php switch ($a) {case "": echo $b;break; default: echo $a;
      break;}?>;
      } 
    </style>
</head>
<body>
<form method="post" action="cadastro.php">
  <input type="color" name="cor"/>
  <button type="submit" name="mudaCor" id="cmuda" value="Mudar cor">muda cor</button>
</form>
<div id="inicio">
  <form id="Login">
    <div>
      <label for="cNome">Nome:</label>
      <input type="text" name="tNome" id="cNome">
    </div>

    <div>
      <label for="cEmail">E-mail:</label>
      <input type="email" name="tEmail" id="cEmail" />
    </div>

    <div>
      <label for="cSenha">Senha:</label>
      <input type="password" name="tSenha" id="cSenha" />
    </div>

    <div>
      <label for="cCidade">Cidade:</label>
      <input type="text" name="tCidade" id="cCidade">
    </div>

    <div>
      <label for="cBairro">Bairro:</label>
      <input type="text" name="tBairro" id="cBairro">
    </div>

    <div>
      <label for="cCurso">Curso:</label>
      <input type="text" name="tCurso" id="cCurso" />
    </div>

    <div>
      <label for="cDate">Data de Nascimento:</label>
      <input type="date" name="TData" id="cData">
    </div>

    <div>
      <label for="cTele">Telefone:</label>
      <input type="tel" name="tTele" id="cTele">
    </div>

    <div class="form-group">
      <label for="gene">Gênero Biologico:
      <select class="form-group" name="Sexo" id="Sexo"onchange="mostraCampo(this);">
        <option value="" selected="selected"></option>
        <option value="macho">Macho</option>
        <option value="femea">Fêmea</option>
        <option value="inter">Intersexual</option>
        <option value="outros">Outros</option>
      </select> 
      <input type="text" class="form-control" name="Texto" id="Texto" style="visibility: hidden;">
      </label>
    </div>

    <div>
      <label for="cNomeS">Nome Social</label>
      <input type="text" name="tNomeS" id="cNomeS">
    </div>

    <div class="button">
      <a href="cadastro.php"> <button type="button">Cadastrar</button> </a>
    </div>

    <div class="button1">
      <button type="reset">Restaurar</button>
    </div>
<!-- 
    <div class="contas">
    <div class="col-lg-6 col-xs-12 col-md-6">
      <a class="btn btn-block btn-social btn-google" href=""> <span class="fa fa-google"></span> Cadastrar com o Google</a>
    </div>

    <div class="col-lg-6 col-xs-12 col-md-6"> 
    <a class="btn btn-block btn-social btn-facebook" href=""> <span class="fa fa-facebook"></span> Cadastrar com o Facebook</a>
    </div>
    </div> -->
  </div>
</body>
</script>
</html>