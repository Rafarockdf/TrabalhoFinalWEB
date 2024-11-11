<?php
session_start();
require '../../ScriptsPHP/config.php';

// Verifica se o usuário está logado e obtém o ID do usuário da sessão
if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuário não logado']);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Recebe o JSON com os dados do quiz
$data = json_decode(file_get_contents("php://input"), true);

$pontuacao = $data['pontuacao'];
$quiz_id = $data['quiz_id'];

// Salva o resultado do usuário na tabela `resultados_usuario`
$sql = "INSERT INTO resultados_usuario (data_completado, pontuacao, quiz_id, usuario_id) VALUES (NOW(), ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param('iii', $pontuacao, $quiz_id, $usuario_id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Resultado salvo com sucesso']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar o resultado']);
}
?>
