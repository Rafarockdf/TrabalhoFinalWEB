<?php
session_start(); // Inicia a sessão

// Destrói a sessão do usuário
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destroi a sessão atual

// Redireciona para a página de login
header("Location: ../Login/login.html");
exit;
?>
