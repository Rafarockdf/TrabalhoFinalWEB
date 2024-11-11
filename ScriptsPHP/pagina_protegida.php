<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo "Bem-vindo à página protegida!"
    header("Location: ../Login/login.html");
    
    exit;
}

echo "Bem-vindo à página protegida!";
?>
