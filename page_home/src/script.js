
function exibirCadastroEvento() {
    let formulario = document.getElementsByClassName("cadastro")[0];

    formulario.classList.remove('oculto');
}

function cancelarCadastroEvento() {
    let formulario = document.getElementsByClassName("cadastro")[0];

    formulario.classList.add('oculto');
}

function gerarMensagem() {
    const MENSAGENS = [
        "O amor não se vê com os olhos, mas com o coração.",
        "O amor não se vê com os olhos, mas com o coração.",
        "O amor é o espaço e o tempo tornados sensíveis ao coração.",
        "O amor é o espaço e o tempo tornados sensíveis ao coração.",
        "Cada qual sabe amar a seu modo; o modo, pouco importa; o essencial é que saiba amar.",
        "A distância faz ao amor aquilo que o vento faz ao fogo: apaga o pequeno, inflama o grande.",
        "Se o amor é fantasia, eu me encontro ultimamente em pleno carnaval.",
        "A medida do amor é amar sem medida.",
        "Amar não é olhar um para o outro, é olhar juntos na mesma direção."
    ]
    let mensagem = document.getElementById('mensagem');

    let indiceMensagem = Math.floor(Math.random()*MENSAGENS.length);

    mensagem.value = MENSAGENS[indiceMensagem];
}
