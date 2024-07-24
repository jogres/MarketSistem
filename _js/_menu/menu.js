document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.nav-links'); // Corrigido para a classe correta

  menuToggle.addEventListener('click', function() {
    navLinks.classList.toggle('active');
  });
});