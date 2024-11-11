<?php
session_start();
require 'config.php'; // Certifique-se de que o arquivo de configuração está no diretório correto

header('Content-Type: application/json'); // Define o retorno como JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Busca o usuário no banco de dados pelo e-mail
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o usuário existe e a senha está correta
    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        // Redireciona para a página inicial após o login bem-sucedido
        echo json_encode([
            'status' => 'success', 
            'message' => 'Login realizado com sucesso!',
            'redirect' => '../PaginaInicial/index.HTML' // Redireciona para a página inicial
        ]);
    } else {
        // Se as credenciais estiverem erradas
        echo json_encode(['status' => 'error', 'message' => 'Email ou senha incorretos.']);
    }
    exit();
}
