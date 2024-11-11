<?php
session_start();

header('Content-Type: application/json');

if (isset($_SESSION['usuario_id'])) {
    // Se o usuário estiver logado, busca o nome do usuário no banco
    require 'config.php'; // Inclua a configuração para acesso ao banco de dados

    $stmt = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $_SESSION['usuario_id']);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        'status' => 'logged_in',
        'username' => $usuario['nome'] // Retorna o nome do usuário
    ]);
} else {
    echo json_encode(['status' => 'logged_out']);
}
?>
