<?php
session_start(); // Inicia a sessão para permitir o uso de variáveis de sessão
require_once 'db_connect.php'; // Conecta ao banco de dados usando o arquivo 'db_connect.php'

// Verifica se o botão 'btn-deletar' foi pressionado (submissão do formulário de deleção)
if (isset($_POST['btn-deletar'])): 
    
    // Escapa a variável 'id' para prevenir injeção de SQL
    $id = mysqli_real_escape_string($connect, $_POST['id']);
    
    // Cria a query SQL para deletar o cliente com o ID correspondente
    $sql = "DELETE FROM clientes WHERE id = '$id'";

    // Tenta executar a query de deleção
    if (mysqli_query($connect, $sql)):
        // Se a deleção for bem-sucedida, armazena uma mensagem de sucesso na sessão
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    else:
        // Se houver um erro na deleção, armazena uma mensagem de erro na sessão
        $_SESSION['mensagem'] = "Erro ao deletar";
        header('Location: ../index.php'); // Redireciona o usuário para a página inicial
    endif;
endif;
?>
