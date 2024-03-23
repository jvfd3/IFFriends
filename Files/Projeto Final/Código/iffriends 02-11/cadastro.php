<?php
      error_reporting(0);
      ini_set(“display_errors”, 0 );
      include('conexao.php');

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

      $teste = "INSERT INTO `usuario` (nome, email, senha, rsenha, cidade, bairro, curso, data_de_nascimento, telefone, genero, nome_social)VALUES ";
      $teste .= "('$nome', '$email', '$senha', '$rsenha', '$cidade', '$bairro', '$curso', '$data', '$tele', '$sexo', '$nomes')";

      if (mysqli_query($conexao, $teste)) {
               echo "cadastro com sucesso!<br>";
               echo "<a href='index.php'>Clique aqui para fazer login</a>";
            } else {
               echo "Error: " . $teste . "" . mysqli_error($conexao);
            }
      mysqli_close($conexao);
    }}
    ?>