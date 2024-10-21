<?php
session_start(); // Inicia a sessão para possibilitar o uso de variáveis de sessão

require_once 'db_connect.php'; // Conecta ao banco de dados usando o arquivo 'db_connect.php'

if (isset($_POST['btn-cadastrar'])): // Verifica se o botão 'btn-cadastrar' foi acionado (submissão do formulário)
    // Escapa os dados de entrada para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $idade = mysqli_real_escape_string($connect, $_POST['idade']);
    
    // Monta a query SQL para inserir os dados no banco de dados
    $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    // Executa a query e verifica se a inserção foi bem-sucedida
    if (mysqli_query($connect, $sql)): 
        // Se a inserção for bem-sucedida, armazena uma mensagem de sucesso na sessão
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    else:
        // Se ocorrer um erro na inserção, armazena uma mensagem de erro na sessão
        $_SESSION['mensagem'] = "Erro ao cadastrar";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    endif;
endif;
?>
