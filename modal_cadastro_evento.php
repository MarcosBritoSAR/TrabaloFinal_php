<button id="bt-cadastro" onclick="exibirCadastroEvento()">Cadastrar Evento</button>

<div class="cadastro oculto">
    <form action="cadastrar_evento.php" method="post">
        <input type="hidden" name="id_usuario" value="<?php echo $result[0]['id']; ?>">
        <label for="nome">Ocasião</label>
        <input type="text" name="name">
        <br>

        <label for="data-registro">Data de inicio</label>
        <input type="date" name="data-inicio">
        <br>

        <p>Informe em quanto tempo deseja ser lembrado</p>
        <label for="dias">Dias: </label>
        <input type="number" name="dias">
        <br>
        <label for="meses">Meses: </label>
        <input type="number" name="meses">
        <br>

        <label for="anos">Anos: </label>
        <input type="number" name="anos">
        <br>
        <label for="mensagem">Deixe uma mensagem!(Máximo de 500 caracteres)</label>
        <br>
        <textarea cols="50" rows="10" name="mensagem" id="mensagem"></textarea>

        <button type="submit">Cadastrar</button>

    </form>
    <button onclick="gerarMensagem()">Gerar mensagem!</button>
    <button onclick="cancelarCadastroEvento()" id="cancelar-cadastro">Cancelar</button>
</div>