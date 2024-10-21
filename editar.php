<?php
include_once 'php_action/db_connect.php'; // Inclui o arquivo de conexão ao banco de dados
include_once './includes/header.php'; // Inclui o cabeçalho da página

// Verifica se a variável GET 'id' está definida
if (isset($_GET['id'])) {
    // Escapa o ID para evitar injeção de SQL
    $id = mysqli_escape_string($connect, $_GET['id']);
    
    // Consulta para selecionar os dados do cliente com o ID fornecido
    $sql = "SELECT * FROM clientes WHERE id = '$id'";  
    $resultado = mysqli_query($connect, $sql); // Executa a consulta
    $dados = mysqli_fetch_array($resultado); // Obtém os dados do cliente
}
?>
<div class="row">
    <div class="col s12 m6 push-m3"> <!-- Coluna que ocupa metade da tela em dispositivos médios e a totalidade em dispositivos pequenos -->
        <h3 class="light">Editar Cliente</h3> <!-- Título da página -->
        <form action="php_action/update.php" method="POST"> <!-- Formulário para atualizar os dados do cliente -->
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> <!-- Campo oculto para enviar o ID do cliente -->

            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">  <!-- Campo para o nome do cliente -->
                <label for="nome">Nome</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="text" value="<?php echo $dados['sobrenome']; ?>" name="sobrenome" id="sobrenome">  <!-- Campo para o sobrenome do cliente -->
                <label for="sobrenome">Sobrenome</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="email" value="<?php echo $dados['email']; ?>" name="email" id="email"> <!-- Campo para o e-mail do cliente -->
                <label for="email">Email</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="number" value="<?php echo $dados['idade']; ?>" name="idade" id="idade"> <!-- Campo para a idade do cliente -->
                <label for="idade">Idade</label> <!-- Rótulo do campo -->
            </div>

            <button type="submit" name="btn-editar" class="btn">Atualizar</button> <!-- Botão para enviar o formulário e atualizar os dados -->
            <a href="index.php" class="btn green">Lista de Clientes</a> <!-- Link para retornar à lista de clientes -->
        </form>
    </div>
</div>

<?php
include_once './includes/footer.php'; // Inclui o rodapé da página
?>
