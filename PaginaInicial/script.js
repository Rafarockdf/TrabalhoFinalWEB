document.addEventListener("DOMContentLoaded", function() {
    // Inicializa a navbar
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarNav = document.getElementById('navbarNav');

    
    navbarToggler.addEventListener('click', function() {
        navbarNav.classList.toggle('collapse');
    });

    // Opção de redimensionamento da navbar na carga inicial
    if (window.innerWidth < 992) {
        navbarNav.classList.add('collapse');
    }
});