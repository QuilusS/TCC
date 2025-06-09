window.addEventListener('DOMContentLoaded', () => {
    // Ativa o link do menu correspondente à página atual
    const links = document.querySelectorAll('.nav-link');
    const currentFile = window.location.pathname.split('/').pop();

    links.forEach(link => {
        const linkFile = link.getAttribute('href').split('/').pop();
        if (linkFile === currentFile) {
            link.classList.add('active');
        }
        link.addEventListener('click', () => {
            links.forEach(link => link.classList.remove('active'));
            link.classList.add('active');
        });
    });

    document.querySelectorAll('.btnExcluir').forEach(btn => {
        btn.addEventListener('click', function(event) {
            event.stopPropagation();
            event.preventDefault();
            const id = this.getAttribute('data-id');
            removerNoticia(id, event);
        });
    });
});

// Função para remover uma notícia
function removerNoticia(id, event) {
    if (event) {
        event.stopPropagation();
        event.preventDefault();
    }
    console.log('ID recebido para remoção:', id);
    if (confirm('Tem certeza que deseja excluir esta notícia?')) {
        fetch(`../PHP/ProcessoNoticia.php?acao=remover&id=${id}`, {
            method: 'GET'
        })
        .then(response => response.text())
        .then(data => {
            console.log('Resposta do servidor:', data);
            if (data.trim() === 'success') {
                const card = document.querySelector(`.noticia-card[data-id="${id}"]`);
                if (card) {
                    card.remove();
                    alert('Notícia removida com sucesso!');
                    // Verifica se não há mais cards
                    const remainingCards = document.querySelectorAll('.noticia-card');
                    if (remainingCards.length === 0) {
                        const avisoExistente = document.querySelector('.AvisoNoticias');
                        if (avisoExistente) avisoExistente.remove();

                        // Cria e adiciona o aviso fora do .noticias-container
                        const aviso = document.createElement('p');
                        aviso.className = 'AvisoNoticias';
                        aviso.textContent = 'Sem notícias no momento. Volte em breve! ツ';
                        const noticiasContainer = document.querySelector('.noticias-container');
                        noticiasContainer.parentNode.insertBefore(aviso, noticiasContainer.nextSibling);
                    }
                } else {
                    alert('Erro: Card não encontrado para remoção.');
                }
            } else {
                alert('Erro ao remover a notícia: ' + data);
            }
        })
        .catch(error => console.error('Erro na solicitação:', error));
    }
}