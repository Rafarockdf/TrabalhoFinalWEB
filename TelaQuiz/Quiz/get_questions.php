<?php
require '../../ScriptsPHP/config.php'

$quiz_id = $_GET['quiz_id'];

// Busque todas as perguntas para o quiz selecionado
$query = "SELECT p.id AS pergunta_id, p.texto AS pergunta_texto, r.id AS resposta_id, r.texto AS resposta_texto, r.correta 
          FROM perguntas p 
          JOIN respostas r ON p.id = r.pergunta_id 
          WHERE p.quiz_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $quiz_id);
$stmt->execute();
$result = $stmt->get_result();

$questions = [];
while ($row = $result->fetch_assoc()) {
    $pergunta_id = $row['pergunta_id'];
    if (!isset($questions[$pergunta_id])) {
        $questions[$pergunta_id] = [
            'question' => $row['pergunta_texto'],
            'answers' => []
        ];
    }
    $questions[$pergunta_id]['answers'][] = [
        'option' => $row['resposta_texto'],
        'correct' => $row['correta'] == 1
    ];
}

echo json_encode(array_values($questions));
?>
