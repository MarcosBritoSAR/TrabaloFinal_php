<?php include "../conexao.php";
include "utilitarios/funcoes.php";
$resultuser = busca($_COOKIE['user']);
$resultEvent = buscaEvento($resultuser[0]['id']);
$resultMidia = buscaMidia($resultEvent[0]['id']);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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


    <fieldset id="bemvindo">
        <h1>Bem Vindo <?php echo $_COOKIE['user'] ?></h1>
    </fieldset>
    <div class="perfilPhoto" id="foto">
    </div>
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


    <section id="sectionTable">
        <title>eventos</title>

        <table border="1px" style="text-align: center;">
            <tr>
                <th style="text-align: center;">Titulo</th>
                <th style="text-align: center;">Data do evento</th>
            </tr>
            <?php
            $linha = 0;


            //primeiro laço de repetição
            do {
                if (!isset($resultEvent[$linha]['id'])) {
                    break;
                }
            ?>

                <tr onclick="showDetails('<?php echo $linha; ?>')">
                    <td id="title-<?php echo $linha; ?>"><?php echo $resultEvent[$linha]['nome']; ?></td>
                    <td id="date-<?php echo $linha; ?>"><?php echo $resultEvent[$linha]['data_lembrete'] ?></td>
                </tr>
            <?php
                $linha++;
            } while (true);
            ?>


        </table>
    </section>

    <?php
    $linha = 0;
    do {

        if (!isset($resultEvent[$linha]['id'])) {
            break;
        }
    ?>
        <div id="details-<?php echo $linha ?>" class="details">
            <!--botoes compartilhar-->

            <div id="modulo1">
                <h2 style="font-family: Arial;">Título: <?php echo $resultEvent[$linha]['nome']; ?></h2>
                <h2 style="font-family: Arial;">Data: <?php echo $resultEvent[$linha]['data_lembrete'] ?></h2>

                <div id="modulo2">
                    <h2 style="font-family: Arial;">MENSAGEM:" <?php echo $resultEvent[$linha]['mensagem']; ?>"</h2>

                    <?php if (verificaCronograma($resultEvent[$linha]['data_lembrete'])) { ?>
                        <h2 style='font-family: Arial'> faltam " <?php echo subtraiDate($resultEvent[$linha]['data_lembrete']);?> " para o dia do evento</h2>

                    <?php } else { ?>
                        <h2 style='font-family: Arial'> Ja se passaram " <?php echo subtraiDate($resultEvent[$linha]['data_lembrete']);?> " que este evento occoreu</h2>
                    <?php
                    } ?>
                </div>
            </div>


            <!--Compartilhar-->
            <!-- Compartilhar no Twitter -->
            <div id="modulo3">
                <form action="utilitarios/compartilhar/twitter.php" method="POST">
                    <input type="hidden" value="<?php echo $resultEvent[$linha]['mensagem']; ?>" name="compartilha">
                    <input type="submit" value="Compartilhar mensagem no Twitter">
                </form>
                <!-- Compartilhar no WhatsApp -->
                <form action="utilitarios/compartilhar/whatsapp.php" method="POST">
                    <input type="hidden" value="<?php echo $resultEvent[$linha]['mensagem']; ?>" name="compartilha">
                    <input type="submit" value="Compartilhar mensagem no WhatsApp">
                </form>
            </div>

            <!--botoes editar e excluir-->
            <div id="modulo4">
                <a href=""><button type="button">Excluir evento</button></a>
                <a href=""><button type="button">Editar evento</button></a>
            </div>

        </div>
    <?php
        $linha++;
    } while (true);
    ?>


    <style>
        #bemvindo h1 {
            position: fixed;
            left: 40%;
            top: 15%;
            padding: 1%;
            background-color: rgb(171, 78, 219, 0.4);
            border-radius: 10px;
            font-family: Arial;

        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            font-family: Arial;
        }


        /* linha par tabela */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* linha impar tabela */
        tr:nth-child(odd) {
            background-color: #fff;
        }

        .details {
            display: none;
            margin-top: 20px;
            text-align: center;
            background-color: rgb(171, 78, 219, 0.4);
        }

        .details #modulo1 {
            font-family: Arial;
            text-align: center;
            position: fixed;
            left: 25%;
            padding: 0.5%;
            border-radius: 10px;
            background-color: rgb(171, 78, 219, 0.5);
            font-size: 16px;
        }

        .details #modulo2 {
            font-size: 16px;
            font-family: Arial;
            position: fixed;
            left: 10%;
            max-width: 50%;
            padding: 0.5%;
            border-radius: 10px;
            background-color: rgb(171, 78, 219, 0.5);
            ;

        }

        .details #modulo3 {
            font-family: Arial;
            position: fixed;
            left: 63%;
            padding: 0.5%;
            border-radius: 10px;
            background-color: rgb(171, 78, 219, 0.5);

        }

        .details #modulo4 {
            font-family: Arial;
            position: fixed;
            left: 64%;
            margin-top: 130px;
            padding: 0.5%;
            border-radius: 10px;
            background-color: rgb(171, 78, 219, 0.5);
        }


        /* botao de compartilhar */
        form {
            margin-top: 10px;
        }

        input[type="submit"] {

            background-color: #3f51b5;
            color: #fff;
            width: 90%;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            font-family: arial;
        }

        /* botao excluir e editar */
        button[type="button"] {
            background-color: #3f51b5;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-family: Arial;
        }


        #sectionTable {
            align-items: center;
            text-align: center;
            margin-left: 180px;
        }



        table {
            text-align: center;
            align-items: center;
            border-collapse: collapse;
            width: 90%;
            margin-top: 240px;
            font-size: 18px;
            font-family: Arial;

        }

        td,
        th {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            width: 50%;

        }

        tr:hover {
            background-color: #f5f5f5;
        }


        #foto {
            position: fixed;
            margin-top: 50px;
            left: 60%;
            width: 150px;
            height: 150px;
            background-image: url('<?php echo 'data:image/jpeg;base64,' . $imageData; ?>');
            border-radius: 100px;
            /*Faz com que a imagem se adapte ao molde*/

            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
        }

        body {
            background-image: url("../img/2.png");
            background-color: mediumorchid;
            background-size: cover;
            font-family: Arial;
        }

        body h1 {
            background-color: mediumorchid;
            background-size: cover;
            position: absolute;
            left: 5%;
        }
    </style>
    <script>
        function showDetails(row) {
            var details = document.getElementsByClassName('details');
            //fechando todos os detalhes
            for (var i = 0; i < details.length; i++) {
                details[i].style.display = 'none';
            }
            //abrindo o que foi selecionado
            var detailRow = document.getElementById('details-' + row);
            detailRow.style.display = 'flex';
        }
    </script>


</body>

</html>