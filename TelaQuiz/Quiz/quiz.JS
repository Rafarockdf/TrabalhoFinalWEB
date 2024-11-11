let questions;
let quizId;
let questionsCorrect = 0;

// Função para buscar perguntas do banco de dados
async function fetchQuestions(quizId) {
  const response = await fetch(`get_questions.php?quiz_id=${quizId}`);
  questions = await response.json();
  startQuiz();
}

// Função para salvar o resultado do quiz
async function saveResult() {
  const response = await fetch('save_result.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
      quiz_id: quizId,
      pontuacao: questionsCorrect
    })
  });
  const result = await response.json();
  if (result.status === 'success') {
    console.log('Resultado salvo com sucesso');
  }
}

// Modifique chooseQuiz para definir o quizId e buscar perguntas
function chooseQuiz(selectedQuizId) {
  quizId = selectedQuizId; // Define o ID do quiz selecionado
  fetchQuestions(quizId);
}

// Modifique finish para chamar saveResult
function finish() {
  textFinish.innerHTML = `Você acertou ${questionsCorrect} de ${questions.length}`;
  content.style.display = "none";
  contentFinish.style.display = "flex";
  saveResult();
}
