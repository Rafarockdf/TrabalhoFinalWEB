const question = document.querySelector(".question");
const answers = document.querySelector(".answers");
const spnQtd = document.querySelector(".spnQtd");
const textFinish = document.querySelector(".finish span");
const content = document.querySelector(".content");
const contentFinish = document.querySelector(".finish");
const btnRestart = document.querySelector(".finish button");
const quizSelection = document.querySelector(".quiz-selection"); // Seletor para os botões de seleção
let questions;

import questions1 from "../questions/questions_jogos.js";
import questions2 from "../questions/questions_acontecimentos.js";
import questions3 from "../questions/questions_musicas.js";

// Função para começar o quiz
function startQuiz() {
  quizSelection.style.display = "none"; // Esconde os botões de seleção
  content.style.display = "flex";       // Mostra o conteúdo do quiz
  loadQuestion();                       // Carrega a primeira pergunta
}

// Função para escolher o quiz com base no botão clicado
function chooseQuiz(quizType) {
  if (quizType === "jogos") {
    questions = questions1;
  } else if (quizType === "acontecimentos") {
    questions = questions2;
  } else if (quizType === "musicas") {
    questions = questions3;
  }
}

// Adiciona evento de clique para os botões de seleção
document.querySelectorAll(".custom-button").forEach(option => {
  option.addEventListener("click", (e) => {
    const quizType = e.target.getAttribute("data-quiz-type");
    chooseQuiz(quizType);
    startQuiz();
  });
});

let currentIndex = 0;
let questionsCorrect = 0;

btnRestart.onclick = () => {
  content.style.display = "flex";
  contentFinish.style.display = "none";

  currentIndex = 0;
  questionsCorrect = 0;
  loadQuestion();
};

// Função para passar para a próxima pergunta
function nextQuestion(e) {
  if (e.target.getAttribute("data-correct") === "true") {
    questionsCorrect++;
  }

  if (currentIndex < questions.length - 1) {
    currentIndex++;
    loadQuestion();
  } else {
    finish();
  }
}

// Função de finalização do quiz
function finish() {
  textFinish.innerHTML = `Você acertou ${questionsCorrect} de ${questions.length}`;
  content.style.display = "none";
  contentFinish.style.display = "flex";
}

// Função para carregar a pergunta
function loadQuestion() {
  spnQtd.innerHTML = `${currentIndex + 1}/${questions.length}`;
  const item = questions[currentIndex];
  answers.innerHTML = "";
  question.innerHTML = item.question;

  item.answers.forEach((answer) => {
    const div = document.createElement("div");

    div.innerHTML = `
    <button class="answer" data-correct="${answer.correct}">
      ${answer.option}
    </button>
    `;

    answers.appendChild(div);
  });

  document.querySelectorAll(".answer").forEach((item) => {
    item.addEventListener("click", nextQuestion);
  });
}
// Função para voltar para a pergunta anterior
function previousQuestion() {
  if (currentIndex > 0) {
    currentIndex--;
    loadQuestion();
  }
}

// Inicia o quiz carregando a primeira pergunta
loadQuestion();
