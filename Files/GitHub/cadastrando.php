<?php
  session_start();    
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
  $idade = (date("Y-m-d")) - $data;

 if ($nome != "") { // Não permitir que acessem essa pagina
    if($senha != $rsenha){// Vai verificar se as senhas são iguais 
      $_SESSION['notificacao'] = 0;
    }
    elseif($idade < 14 || ""){// vai verificar a idade
      $_SESSION['notificacao'] = 1;
    }
    elseif($sexo === "outros"){// vai outrar o sexo da pessoa
      $sexo = $_POST["Texto"];
    }

    $teste = "INSERT INTO `usuario` (nome, email, senha, rsenha, cidade, bairro, 
    curso, data_de_nascimento, telefone, genero, nome_social, data_criacao, situacao) VALUES ";
    $teste .= "('$nome', '$email', '$senha', '$rsenha', '$cidade', '$bairro', '$curso', 
    '$data', '$tele', '$sexo', '$nomes', '$ano', 0)";

    if (mysqli_query($conexao, $teste)) {
      $_SESSION['notificacao'] = 3;// notificação de cadastro concluido
      $consulta = "SELECT `idusuario` FROM `usuario` WHERE email = '{$email}'";
      $resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
      $quant = mysqli_num_rows($resultado);
      $rows=$resultado->fetch_assoc();
      $id = $rows['idusuario'];
      mysqli_close($conexao);
      mkdir('fotos/'.$id.'/');// Vai criar as pastas que vão armagenar as fotos
	    mkdir('fotos/'.$id.'/ProfPic/');/**VER se é a melhor forma */
	    mkdir('fotos/'.$id.'/postagem/');
	    mkdir('fotos/'.$id.'/Album/');
      mysqli_close($conexao);
    } else {
      mysqli_close($conexao);
      $_SESSION['notificacao'] = 2;// notificação de e-mail já cadastrado
    }
  }
  header('Location: cadastro.php');//para retorna a pagina cadastro.php
?>