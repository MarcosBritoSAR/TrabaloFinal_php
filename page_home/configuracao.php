<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>configuração</title>

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

    <section id="botao">
        <a href="utilitarios/editUser.php"><input type="button" value="Editar informações"></a>
        <a href="utilitarios/excluir/option.php"> <input type="button" value="Excluir Perfil"></a>
    </section>

    <style>
        body {
            background-image: url("../img/5.jpg");
            background-size:cover;
           
        }

        #botao {

            position: absolute;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 10%;
            right: 38%;
        }

        #botao input[type="button"]:hover {
            border-radius: 40px;
            width: 400px;
            height: 150px;
            margin: 20px;
            font-size: 30px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: rgb(255, 16, 240, 0.4);
        }

        #botao input[type="button"] {
            border-radius: 40px;
            width: 400px;
            height: 150px;
            margin: 20px;
            font-size: 30px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: rgb(256, 256, 256, 0.8);

        }
    </style>
</body>

</html>