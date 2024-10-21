<?php
include_once './includes/header.php'; // Inclui o cabeçalho da página
?>
<div class="row">
    <div class="col s12 m6 push-m3"> <!-- Define a coluna que ocupará 6 das 12 unidades em telas médias -->
        <h3 class="light">Novo Cliente</h3> <!-- Título da página -->
        <form action="php_action/create.php" method="POST"> <!-- Define o formulário e a ação que será executada ao enviar -->
            <div class="input-field col s12 ">
                <input type="text" name="nome" id="nome">  <!-- Campo para o nome do cliente -->
                <label for="nome">Nome</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome">  <!-- Campo para o sobrenome do cliente -->
                <label for="sobrenome">Sobrenome</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="email" name="email" id="email"> <!-- Campo para o e-mail do cliente -->
                <label for="email">Email</label> <!-- Rótulo do campo -->
            </div>

            <div class="input-field col s12">
                <input type="number" name="idade" id="idade"> <!-- Campo para a idade do cliente -->
                <label for="idade">Idade</label> <!-- Rótulo do campo -->
            </div>
            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button> <!-- Botão para cadastrar o cliente -->
            <a href="index.php" class="btn green">Lista de Clientes</a> <!-- Link para a lista de clientes -->
        </form>
    </div>
</div>

<?php
include_once './includes/footer.php'; // Inclui o rodapé da página
?>
