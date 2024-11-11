console.log('Arquivo mobile-data.js carregado.');
document.addEventListener('DOMContentLoaded', function() {
    // Função para abrir o modal ao clicar em uma data
    document.querySelectorAll('.open-modal').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();  // Evita o comportamento padrão do link
            const date = item.getAttribute('data-date');  // Pega a data clicada
            document.getElementById('data').value = date;  // Coloca a data no campo do formulário
            document.getElementById('agendarModal').style.display = 'block';  // Exibe o modal
        });
    });

    // Função para fechar o modal ao clicar fora dele
    window.onclick = function(event) {
        const modal = document.getElementById('agendarModal');
        if (event.target == modal) {
            modal.style.display = 'none';  // Esconde o modal
        }
    };
});