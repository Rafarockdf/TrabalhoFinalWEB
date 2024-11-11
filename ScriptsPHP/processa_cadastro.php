<?php
require 'config.php';

$erro = ""; // Variável para armazenar mensagens de erro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['Nome_Completo'];
    $email = $_POST['Email'];
    $senha = password_hash($_POST['Senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        if ($stmt->execute()) {
            header("Location: ../Login/login.HTML");
            exit;
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Código de erro para duplicação de entrada
            $erro = "Este e-mail já está cadastrado. Tente usar outro e-mail.";
        } else {
            $erro = "Erro ao cadastrar usuário. Por favor, tente novamente mais tarde.";
        }
    }
}
?>
