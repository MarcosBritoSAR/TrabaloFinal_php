<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .event-gallery {
            display: flex;
            justify-content: center;
            margin: 30px;
        }
        .event {
            display: block;
            justify-content: center;
            align-items: center;
            background: #ff7ad5;
            width: 250px;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
        }
        .event h3{
            margin-bottom: 5px;
        }
        .event p {
            margin-bottom: 5px;
        }
    </style>
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
        <style>
            body{
               
            background-image: url("../img/1.png");
            background-size: cover;
            }
            h1{
                color:rgb(250,250,250);
                
            }
       
        
        </style>
[
        <h1 style="text-align: center; color: white;">Eventos passados</h1>]

        <div class="event-gallery">
        <?php
        include "../conexao.php";
        include "utilitarios/funcoes.php";

        function buscarEventosPassados(){
            global $conexao;
            $currentDate = date('Y-m-d');
            
            $result = array();
            if (isset($_COOKIE['user'])) {
                //Acessando o banco de dados
                $result = busca($_COOKIE['user']);
            }

            $id_usuario = $result[0]['id'];

            $sqlBuscar = "
                    SELECT data_lembrete, nome, mensagem FROM evento
                    where data_lembrete < '$currentDate' AND id_usuario = '$id_usuario'";
            $resultado = mysqli_query($conexao, $sqlBuscar);
            return $resultado;
        }

        $eventosPassados = buscarEventosPassados();
        
        if (!empty($eventosPassados)) {
            
             foreach ($eventosPassados as $evento) {
                ?>
                <div class="event">
                    <h3><?php echo $evento['nome']; ?></h3>
                    <p><?php echo $evento['data_lembrete']; ?></p>
                    <?php
                    if (!empty($evento['mensagem'])){
                        ?>
                        <p><?php echo $evento['mensagem']; ?></p>
                        <?php
                    } else {
                        ?>
                        <p>Nenhuma mensagem gravada</p>
                        <?php
                    }
                    ?>
                </div>
                <br/>
                <?php
            }
        } else {
            echo "<p>Nenhum evento próximo encontrado.</p>";
        }
        ?>
    </div>
</body>

</html>