<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>

</head>

<body>


    <h1>REALMENTE DESEJA EXCLUIR ESTE PERFIL?</h1>
    
    <a href="excluirUser.php">
        <button type="button" onclick="apagar()" id ="excluir">Excluir</button>
    </a>
    <a href="voltarMenu.php">
        <button type="button" onclick="VoltarHome()" id = "voltar_menu">Voltar Home</button>
    </a>

    <style>
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 24px;
        }

        button {
            font-size: 36px;
            padding: 20px 40px;
            display: inline-block;
            margin: 10px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }

        #excluir {
            background-color: black;
        }

        #voltar_menu {
            background-color: black;
        }

        #excluir:hover {
            background-color: rgb(256, 0, 0,0.8);
        }

        #voltar_menu:hover {
            background-color: rgb(0, 250, 0,0.8);
        }
    </style>
</body>

</html>