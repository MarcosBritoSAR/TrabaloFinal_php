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

            <li class="item-menu">
                <a href="configuracao.php">
                    <span class="icon"><i class="bi bi-gear-fill"></i></span>
                    <span class="txt-link">configuração</span>
                </a>
            </li>

        </ul>

    </nav>

    <h1 style="text-align: center">adicionar</h1>

    <div class="cadastro">
        <form class="formulario-cadastro" action="cadastrar_evento.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_usuario" value="<?php echo $result[0]['id']; ?>">

            <span>
                <label for="nome">Ocasião</label>
                <input type="text" name="name" required>
            </span>

            <span>
                <label for="data-inicio">Data de inicio</label>
                <input type="date" name="data-inicio" required>
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
                <textarea  cols="50" rows="10" name="mensagem" id="mensagem"></textarea>
            </span>
            <span class="upload">
                <label for="arquivo">Deseja salvar algum arquivo para essa data?
                    <h1>
                        <i class="bi bi-upload botao-upload "></i>
                        <input type="file" name="arquivo[]" id="arquivo" multiple="multiple">
                    </h1>
                </label>
                    
            </span>

            <span class="bts-cadastro">
                <button class="bt-cadastro" type="submit">Cadastrar</button>
                <button class="bt-limpar" type="reset">Limpar</button>
            </span>

        </form>

        <button class="acoes" onclick="gerarMensagem()">Gerar mensagem!</button>
    </div>

    <style>
        body {
            background-image: url("../img/3.png");

        }
        .cadastro {
            width: 500px;
            margin: 0 auto;
            background: linear-gradient(to bottom, rgba(255, 192, 203, 0.8), rgba(255, 192, 203, 0.5));
            border-radius: 10px;
            padding: 20px;
        }
        
        .upload,
        .formulario-cadastro {
            display: flex;
            flex-direction: column;
        }

        .upload{
            text-align:center;
        }

        .upload h1{
            padding-top: 10px;
        }
        .formulario-cadastro span {
            margin-bottom: 10px;
        }

        .formulario-cadastro label {
            display: block;
            font-weight: bold;
        }

        .formulario-cadastro input[type="text"],
        .formulario-cadastro input[type="date"],
        .formulario-cadastro input[type="number"],
        .formulario-cadastro input[type="file"],
        .formulario-cadastro textarea {
            width: 100%;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .formulario-cadastro input[type="file"]{
            display:none ;
        }
        
        
        .container-mensagem {
            margin-top: 10px;
        }

        .bts-cadastro {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }
        .botao-upload{
            height: 30px;
            width: 30px;
            padding: 10px;
        }

        .bt-cadastro,
        .bt-limpar {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .bt-cadastro {
            background-color: #007bff;
            margin-right: 10px;
        }

        .bt-limpar {
            background-color: #dc3545;      
            margin-right: 23%;
        }

        .acoes {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
        }
    </style>

    <script defer src="./src/script.js"></script>
    
</body>

</html>