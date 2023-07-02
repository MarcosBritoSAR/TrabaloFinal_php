<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>
    <h1>Bem Vindo à Special Dates!</h1>

    <form method="get">
        <label>Usuário:</label>
        <input type="text" name="usuario">

        <label>Senha:</label>
        <input type="password" name="senha">

        <div class="botoes">
            <input type="submit" value="Entrar">
            <a href="cadastrar_usuario.php" class="button-link">Cadastrar</a>
        </div>
    </form>

    <style>
        body {
            background-color: rgb(255, 16, 240,0.3);
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            color: #ff4d4d;
            margin-top: 50px;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 16px;
            color: #ff4d4d;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ff4d4d;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .botoes {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        input[type="submit"] {
            font-family: 'Courier New', Courier, monospace;
            font-size: 15px;
            padding: 10px 35px;
            border: none;
            border-radius: 4px;
            background-color: crimson;
            color: #fff;
            cursor: pointer;
        }

        a.button-link {
            font-family: 'Courier New', Courier, monospace;
            padding: 10px 20px;
            font-size: 15px;
            border: none;
            border-radius: 4px;
            background-color:crimson;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }
        h2{
            text-align: center;
        }
    </style>

    <?php
    try {
        if (isset($_COOKIE['user'])) {
            header("Location: page_home/home.php");
            exit();
        } else {
            if (isset($_GET["usuario"]) && isset($_GET["senha"]) && $_GET["usuario"] != '') {
                include "conexao.php";
                $dados = consultarUser($_GET["usuario"]);
                $user = $dados[0]["login"];
                $senha = $dados[0]["senha"];
                if (($user == $_GET['usuario']) && ($senha == $_GET['senha'])) {
                    setcookie('user', $user, time() + (3600*24));
                    header("Location: page_home/home.php");
                    exit();
                } else {
                    echo "<h2>Usuário e Senha Inválidos</h2>";
                }
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo "Ocorreu um erro com a comunicação do banco de dados";
    }
    ?>
</body>

</html>