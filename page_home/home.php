<?php include "../conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="home.css">
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

    <fieldset>
        <h1 style="text-align: center">Bem Vindo
            <?php echo $_COOKIE['user'] ?>
        </h1>
    </fieldset>

    <div class="perfilPhoto" id="foto">
    </div>

<!-- Conteúdo do Home -->
    <section id="lista">
        <div style="text-align: center">
            <h2>Lista de Eventos Especiais</h2>
            <ul id="dateList"></ul>
        </div>
    </section>

    <div class="container" style="text-align: center">
        <h2>Próximo Evento </h2>

        <div class="event-gallery">
            <button class="nav-button" id="previous-button">&#8249; Anterior</button>
            <button class="nav-button" id="next-button">Próximo &#8250;</button>

            <div class="event-carousel">

                <div class="event">
                    
                    <h3>Titulo do Evento </h3>
                    <p>Data do Evento </p>
                    <img src="caminho/para/imagem1.jpg" alt="Imagem do Evento ">

                    <div class="options">
                        <a href="#" class="notification"><i class="fas fa-bell"></i></a>
                        <a href="#" class="share"><i class="fas fa-share-alt"></i></a>
                    </div>

                </div>

            </div>
            <!-- Adicione mais eventos aqui -->
        </div>
    </div>

    <!------------------------------------------------------------------------------------------------>
    <!--Vai receber os valores do banco de dados-->
    <?php $result = array();

    if (isset($_COOKIE['user'])) {
        //Acessando o banco de dados
        $result = busca($_COOKIE['user']);
    }
    ?>
    <?php
    if (isset($result)) {
        //decodificando o arquivo .bin guardados no banco de dados
        $imageData = base64_encode($result[0]['foto_do_usuario']);
    }
    ?>
    <style>
        #foto {
            position: absolute;
            margin-top: 10px;
            right: 30px;
            width: 100px;
            height: 100px;
            background-image: url('<?php echo 'data:image/jpeg;base64,' . $imageData; ?>');
            border-radius: 100px;
            /*Faz com que a imagem se adapte ao molde*/
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
        }

        body {
            background-image: url("../img/fundo_home.jpg");
            /* background-image: url("../img/1.png"); */
            background-size: cover;
        }
    </style>


</body>

</html>