<?php
$servername = "127.0.0.1";  // Endereço do servidor de banco de dados (localhost neste caso)
$username = "root";         // Nome de usuário para acessar o banco de dados (root é o padrão para MySQL local)
$password = "";             // Senha para o banco de dados (aqui está vazio porque geralmente não há senha no ambiente local)
$db_name = "crud";          // Nome do banco de dados que será utilizado (neste caso, 'crud')
$port = "3308";             // Porta de conexão do MySQL (alterada para 3308, pois o MySQL pode estar rodando em    uma porta diferente da padrão 3306)

$connect = mysqli_connect($servername, $username, $password, $db_name, $port); // Estabelece a conexão com o banco de dados usando os parâmetros definidos
mysqli_set_charset($connect,"utf8"); // Define o conjunto de caracteres da conexão para UTF-8, garantindo que acentos e caracteres especiais sejam tratados corretamente

// Verifica se a conexão foi bem-sucedida
if (!$connect): 
    // Caso a conexão falhe, exibe uma mensagem de erro e encerra a execução do script
    die("Erro na conexão: " . mysqli_connect_error());
endif;

?>
