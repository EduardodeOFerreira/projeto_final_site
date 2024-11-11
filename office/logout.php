<?php
// Inicia a sessão
session_start();

// Verifica se há uma sessão ativa
if (isset($_SESSION['usuario'])) {
    // Remove todas as variáveis de sessão
    $_SESSION = array();
    
    // Destrói a sessão
    session_destroy();
}

// Redireciona para a página de login ou a página inicial
header("Location: login.php"); // ou a página que desejar
exit();
?>
