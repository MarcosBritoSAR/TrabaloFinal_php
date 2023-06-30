<!--Vai receber os valores do banco de dados-->
<?php 
require_once("../conexao.php");
$result = array();
if (isset($_COOKIE['user'])) {
    //Acessando o banco de dados
    $result = busca($_COOKIE['user']);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./src/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <nav class="menu-lateral">

        <a href="../destroiLogin.php">
            <div class="deslogar">
                <i class="bi bi-box-arrow-left"></i>
            </div>
        </a>

        <ul>
            <li class="item-menu">
                <a href="home.php">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="txt-link">Home</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="adicionar.php">
                    <span class="icon"><i class="bi bi-plus-square-fill"></i></span>
                    <span class="txt-link">Adicionar</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="perfil.php">
                    <span class="icon"><i class="bi bi-person-fill"></i></span>
                    <span class="txt-link">perfil</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="proximos.php">
                    <span class="icon"><i class="bi bi-fast-forward"></i></span>
                    <span class="txt-link">Proximos</span>
                </a>
            </li>

            <li class="item-menu">
                <a href="passados.php">
                    <span class="icon"><i class="bi bi-bell-fill"></i></span>
                    <span class="txt-link">Passados</span>
                </a>
            </li>

        </ul>

    </nav>

    <h1 style="text-align: center">adicionar</h1>

    <div class="cadastro">
        <form class="formulario-cadastro" action="cadastrar_evento.php" method="post">
            <input type="hidden" name="id_usuario" value="<?php echo $result[0]['id']; ?>">

            <span>
                <label for="nome">Ocasião</label>
                <input type="text" name="name">
            </span>

            <span>
                <label for="data-inicio">Data de inicio</label>
                <input type="date" name="data-inicio">
            </span>

            <span>

                <p>Informe em quanto tempo deseja ser lembrado</p>
                <label for="dias">Dias: </label>
                <input type="number" name="dias">
                <br>
                <label for="meses">Meses: </label>
                <input type="number" name="meses">
                <br>

                <label for="anos">Anos: </label>
                <input type="number" name="anos">
            </span>

            <span class="container-mensagem">
                <label for="mensagem">Deixe uma mensagem!(Máximo de 500 caracteres)</label>
                <br>
                <textarea cols="50" rows="10" name="mensagem" id="mensagem"></textarea>
            </span>
            <span class="bts-cadastro">
                <button class="bt-cadastro" type="submit">Cadastrar</button>
                <button class="bt-limpar" type="reset">Limpar</button>
            </span>

        </form>

        <button class="acoes" onclick="gerarMensagem()">Gerar mensagem!</button>
    </div>

</body>

</html>