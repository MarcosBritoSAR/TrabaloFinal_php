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
        <h1 style="text-align: center">Eventos que ja passaram</h1>]

        <div class="event-gallery">
        <?php
        function buscarEventosPassados(){
            
        }
        $proximosEventos = buscarEventosPassados();
        
        if (!empty($proximosEventos)) {
            foreach ($proximosEventos as $evento) {
                ?>
                <div class="event">
                    <h3><?php echo $evento['nome']; ?></h3>
                    <p><?php echo $evento['data_lembrete']; ?></p>
                    <p><?php echo $evento['mensagem']; ?></p>
                    <!--<img src="<?php //echo $evento['caminho_imagem']; ?>" alt="Imagem do Evento">-->
                    
                    
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