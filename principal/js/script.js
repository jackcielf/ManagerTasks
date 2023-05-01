// ABRIR e FECHAR menu de panfleto
let editar = document.querySelector('.abrir');
let menu = document.querySelector('.menu');
let overlay = document.querySelector('.efeito-blur');
let classShow = 'menuMostrar';

editar.addEventListener('click', () => {
    if (menu.classList.contains(classShow)) {
        menu.classList.remove(classShow);overlay
        overlay.classList.remove('overlay');
    } else {
        menu.classList.add(classShow);
        overlay.classList.add('overlay');
    }
});

// COR DA PRIORIDADE
const prioridade = document.querySelector('.prioridade');
const container = document.querySelector('.infors');
if (prioridade.innerHTML == "Baixa") {
    container.classList.add("text-bg-secondary");
} else if (prioridade.innerHTML == "Média") {
    prioridade.classList.add("text-light");
    container.classList.add("bg-black");
} else if (prioridade.innerHTML == "Alta") {
    container.classList.add("text-bg-warning");
}

// MENSAGEM DE BEM VINDO (Não esta logado)
const box_saldacao = document.querySelector('.saldacoes');
function init_saldacao() {
    setTimeout(() => {
        box_saldacao.classList.add('showSaldacoes');
    }, 5000);
    setTimeout(() => {
        box_saldacao.classList.remove('showSaldacoes');
    }, 9000);
}
init_saldacao();
box_saldacao.addEventListener('click', desaparecer_popup);
function desaparecer_popup() {
    box_saldacao.classList.remove('showSaldacoes');
}