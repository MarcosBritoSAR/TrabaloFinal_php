<?php include "../conexao.php";
include "utilitarios/funcoes.php";

if (!isset($_COOKIE['user'])) {
    include "../destroiLogin.php";
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

    <section style="text-align: center">
        <?php
        if (isset($_COOKIE['user'])) {
            $result = array();
            $result = busca($_COOKIE['user']);

            $imag = base64_encode($result[0]['foto_do_usuario']);
        }
        ?>


        <section>

            <br />
            <h3 id="foto">
                <div id="subfoto">
                </div>
            </h3>


        </section>

        <section class="perfil" id="perfil">

            <h3>usuario</h3>
            <div class="apresenta"><?php echo $result[0]['login']; ?></div>
            <h3>idade</h3>
            <div class="apresenta"><?php echo calculaIdade($result[0]['data_nascimento']); ?></div>
            <h3>sexo</h3>
            <div class="apresenta"><?php if ($result[0]['sexo'] == "F") {
                                        echo "Feminino";
                                    } else if ($result[0]['sexo'] == "M") {
                                        echo "Masculino";
                                    } else {
                                        echo "Outro";
                                    }; ?></div>
            <h3>parceira</h3>
            <div class="apresenta"><?php echo $result[0]['nome_companheiro']; ?></div>
            <h3>email</h3>
            <div class="apresenta"><?php echo $result[0]['email']; ?></div>
            <h3>telefone</h3>
            <div class="apresenta"><?php echo $result[0]['telefone']; ?></div>

        </section>
    </section>

    <style>

        body {
            background-image: url('../img/2.png');
            background-size: cover;
        }

        #subfoto {
            position: absolute;
            transform: translate(-50%, -50%);
            top: 15%;
            left: 50%;
            width: 200px;
            height: 200px;
            background-image: url('<?php echo 'data:image/jpeg;base64,' . $imag; ?>');
            border-radius: 400px;
            border: 1px solid black;
            background-position:50%;
            /*Faz com que a imagem se adapte ao molde*/
            background-size: cover;
            background-repeat: no-repeat;
        }


        .perfil {
            margin-top: 17%;
            display: flex;
            flex-direction: column;
            text-align: center;
            align-items: center;
        }

        .perfil h3 {
            font-size: 32px;
            margin-bottom: 10px;
            border: 1px solid black;
            padding-left: 5px;
            padding-right: 5px;
            border-radius: 10px;
        }

        .apresenta {
            font-family: Impact, fantasyf;
            font-size: 24px;
            color:aliceblue;
        }

        #perfil {
            position: relative;
            transform: translate(-50%, -50%);
            top: 200px;
            left: 50%;
            text-align: center;
            border-radius: 2px solid black;
            background-color: rgb(255, 000, 127, 0.5);
            border-radius: 70px;
            width: 40%;
        }

    
    </style>
</body>

</html>