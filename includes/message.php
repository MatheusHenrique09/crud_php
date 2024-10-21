<?php
session_start(); // Inicia a sessão para permitir o uso de variáveis de sessão

// Verifica se existe uma mensagem armazenada na sessão
if(isset($_SESSION['mensagem'])): ?>
    <script>
        // Aguarda o carregamento completo da página para exibir o toast
        window.onload = function(){
            // Exibe um toast (notificação flutuante) com o conteúdo da mensagem da sessão
            M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
        };
    </script>
<?php
endif;

// Limpa todas as variáveis da sessão para garantir que a mensagem não seja exibida repetidamente
session_unset(); 
?>
