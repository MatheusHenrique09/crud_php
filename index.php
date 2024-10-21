<link rel="stylesheet" href="style.css"> <!-- Link para o CSS -->

<?php
include_once 'php_action/db_connect.php'; // Inclui o arquivo de conexão ao banco de dados
include_once 'includes/header.php'; // Inclui o cabeçalho da página
include_once 'includes/message.php'; // Inclui mensagens de feedback
?>

<div class="row">
    <div class="col s12 m6 push-m3"> <!-- Coluna centralizada na página -->
        <h3 class="light">Clientes</h3> <!-- Título da seção -->
        <table class="striped"> <!-- Tabela com estilo listrado -->
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>Email:</th>
                    <th>Idade:</th>
                    <th>Ações</th> <!-- Cabeçalho para ações -->
                </tr>
            </thead>

            <tbody>
                <?php
                // Consulta para selecionar todos os clientes
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql); // Executa a consulta
                while ($dados = mysqli_fetch_array($resultado)): // Laço para percorrer os dados
                ?>
                <tr> 
                    <td><?php echo $dados['nome']; ?></td> <!-- Nome do cliente -->
                    <td><?php echo $dados['sobrenome']; ?></td> <!-- Sobrenome do cliente -->
                    <td><?php echo $dados['email']; ?></td> <!-- Email do cliente -->
                    <td><?php echo $dados['idade']; ?></td> <!-- Idade do cliente -->
                    <td>
                        <a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"> <!-- Link para editar -->
                            <i class="material-icons">edit</i> <!-- Ícone de edição -->
                        </a>
                    </td>
                    <td>
                        <a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"> <!-- Link para abrir modal de exclusão -->
                            <i class="material-icons">delete</i> <!-- Ícone de exclusão -->
                        </a>
                    </td>

                    <!-- Estrutura do Modal -->
                    <div id="modal<?php echo $dados['id']; ?>" class="modal"> <!-- Modal específico para cada cliente -->
                        <div class="modal-content">
                            <h4>Opa!</h4> <!-- Título do modal -->
                            <p>Tem certeza que deseja excluir esse cliente?</p> <!-- Mensagem de confirmação -->
                        </div>
                        <div class="modal-footer">
                            <form action="php_action/delete.php" method="POST"> <!-- Formulário para deletar o cliente -->
                                <input type="hidden" name="id" value="<?php echo $dados['id']; ?>"> <!-- Campo oculto com ID do cliente -->
                                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button> <!-- Botão de confirmação -->
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat blue">Cancelar</a> <!-- Botão de cancelamento -->
                            </form>
                        </div>
                    </div>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="adiciona.php" class="btn">Adiciona cliente</a> <!-- Link para adicionar um novo cliente -->
    </div>
</div>

<?php
include_once 'includes/footer.php'; // Inclui o rodapé da página
?>

<!-- JavaScript no final do corpo para otimizar o carregamento -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  M.AutoInit(); // Inicializa todos os componentes do Materialize
</script>
</body>
</html>
