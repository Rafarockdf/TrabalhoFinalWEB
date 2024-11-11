document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");
    loginForm.onsubmit = function() {
        // Adicione aqui a lógica de autenticação ou manipulação do formulário
        return false; // Impede o envio do formulário para fins de teste
    };
});



