<meta charset="utf-8">
<?php
   include('verifica-login.php');
   include('conexao.php');
   error_reporting(0);
   ini_set(“display_errors”, 0 );
   
   $id=$_SESSION['id'];

   $nome = isset($_POST["tNome"])?$_POST["tNome"]:"";
   if ($nome == "") {
      $nome=$_SESSION['nome'];
   }
   $email = isset($_POST["tEmail"])?$_POST["tEmail"]:$_SESSION["email"];
   if ($email == "") {
      $email=$_SESSION['email'];
   }
   $senha = isset($_POST["tSenha"])?$_POST["tSenha"]:$_SESSION['senha'];
   if ($senha == "") {
      $senha=$_SESSION['senha'];
   }
   $rsenha = isset($_POST["tRSenha"])?$_POST["tRSenha"]:$_SESSION['resenha'];
   if ($rsenha == "") {
      $rsenha=$_SESSION['rsenha'];
   }
   $cidade = isset($_POST["tCidade"])?$_POST["tCidade"]:$_SESSION['cidade'];
   if ($cidade == "") {
      $cidade=$_SESSION['cidade'];
   }
   $bairro = isset($_POST["tBairro"])?$_POST["tBairro"]:$_SESSION['bairro'];
   if ($bairro == "") {
      $bairro=$_SESSION['bairro'];
   }
   $curso = isset($_POST["tCurso"])?$_POST["tCurso"]:$_SESSION['curso'];
   if ($curso == "") {
      $curso=$_SESSION['curso'];
   }
   $data = isset($_POST["tData"])?$_POST["tData"]:$_SESSION['data'];
   if ($data == "") {
      $data=$_SESSION['data'];
   }
   $tele = isset($_POST["tTele"])?$_POST["tTele"]:$_SESSION['telefone'];
   if ($tele == "") {
      $tele=$_SESSION['telefone'];
   }
   $sexo = isset($_POST["Sexo"])?$_POST["Sexo"]:$_SESSION['genero'];
   if ($sexo === "outros") {
      $sexo = $_POST["Texto"];
   }elseif($sexo == ""){
      $sexo=$_SESSION['genero'];
   }
   $nomes = isset($_POST["tNomeS"])?$_POST["tNomeS"]:$_SESSION['nome_social'];
   if ($nomes == ""){
      $nomes=$_SESSION['nome_social'];
    }
   $situacao = isset($_POST["apagar"])?$_POST["apagar"]:1;
   $ano = date ("Y-m-d");
   if ($situacao == 1) {
      if($senha != $rsenha){
      $_SESSION['nao_autorizado'] = true;
      header('Location: editperf.php');
      exit();
    }
    elseif($data < 14 || ""){
      $_SESSION['nao_autorizado1'] = true;
      header('Location: editperf.php');
      exit();
    }
    include ('gurda-foto.php');
      $teste = "update `usuario` set nome='$nome', email='$email', senha='$senha', rsenha='$rsenha', cidade='$cidade', bairro='$bairro', curso='$curso', data_de_nascimento='$data', telefone='$tele', genero='$sexo', nome_social='$nomes', situacao='$situacao' where idusuario='$id'";
      $update = mysqli_query($conexao, $teste) or die ('error');
      header('Location: perfil.php');
      exit();  
   }
   elseif($situacao == 0){
      $delete = "DELETE FROM `usuario` WHERE `idusuario`='$id'";
      $delete1 = "DELETE FROM `postagem` WHERE `usuario_idusuario`='$id'";
      $delete2 = "DELETE FROM `albuns` WHERE `idusuario`='$id'";
      $del = mysqli_query($conexao, $delete) or die (mysqli_error($conexao)); 
      $del1 = mysqli_query($conexao, $delete1) or die (mysqli_error($conexao));
      mysqli_close($conexao);
      header('Location: logout.php');
      exit();
   }
?>