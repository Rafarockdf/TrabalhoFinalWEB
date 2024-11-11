javascript

Copiar
// cadastro.js

document.addEventListener("DOMContentLoaded", function () {
    const cadastroForm = document.getElementById("cadastroForm");

    cadastroForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Impede o envio padrão do formulário
        // Aqui você pode adicionar a lógica para tratar o cadastro
        console.log("Formulário enviado!");
    });
});