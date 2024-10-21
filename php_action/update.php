<?php
session_start(); // Inicia a sessão para permitir o uso de variáveis de sessão
require_once 'db_connect.php'; // Inclui o arquivo de conexão ao banco de dados

// Verifica se o botão 'btn-editar' foi pressionado (submissão do formulário de edição)
if (isset($_POST['btn-editar'])): 
    
    // Escapa as variáveis de entrada para prevenir injeção de SQL
    $nome = mysqli_real_escape_string($connect, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($connect, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $idade = mysqli_real_escape_string($connect, $_POST['idade']);
    $id = mysqli_real_escape_string($connect, $_POST['id']); // ID do cliente a ser atualizado

    // Cria a query SQL para atualizar os dados do cliente com o ID correspondente
    $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id' ";

    // Tenta executar a query de atualização
    if (mysqli_query($connect, $sql)):
        // Se a atualização for bem-sucedida, armazena uma mensagem de sucesso na sessão
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    else:
        // Se houver um erro na atualização, armazena uma mensagem de erro na sessão
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    endif;
endif;
?>
