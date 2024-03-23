<?php
      session_start();
      include('conexao.php');
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
      $ano = date ("Y-m-d");
      $idade = $ano - $data;
      if ($nome != "") {
      if($senha != $rsenha){
         $_SESSION['nao_autorizado'] = true;
         header('Location: cadastro.php');
         exit();
      }
      elseif($idade < 14 || ""){
         $_SESSION['nao_autorizado1'] = true;
         header('Location: cadastro.php');
         exit();
      }
      else{
      if($sexo === "outros"){
      $sexo = $_POST["Texto"];
      }

      $teste = "INSERT INTO `usuario` (nome, email, senha, rsenha, cidade, bairro, curso, data_de_nascimento, telefone, genero, nome_social, data_criacao, situacao) VALUES ";
      $teste .= "('$nome', '$email', '$senha', '$rsenha', '$cidade', '$bairro', '$curso', '$data', '$tele', '$sexo', '$nomes', '$ano''$ano', 1)";

      if (mysqli_query($conexao, $teste)) {
               $_SESSION['autorizado'] = true;
               header('Location: cadastro.php');
               exit();
            } else {
               $_SESSION['nao_autorizado2'] = true;
               header('Location: cadastro.php');
               exit();
            }
      mysqli_close($conexao);
    }
    }
    mysqli_close($conexao);
    header('Location: cadastro.php');
    exit();
    ?>