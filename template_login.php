<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>

<body>


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
            background-image: url(img/silhouetted-couple-sit-bench-autumn-tree-generative-ai.jpg);
            background-size: cover;
            margin: -auto;
            
        }

        /* h1 {
            
        } */

        form {
            position: fixed;
            top: 8%;
            left: 40%;
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: pink;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
           
        }

        /* h1{
            position: fixed;
            bottom:20%;
            /* left: 25%; */
            /* text-align: center;
            font-size: 28px;
            color:aliceblue;
            margin-top: 50px;
            font-size: 70px;
            font-family:'Times New Roman', Times, serif;
            background-color: ;
            right: 30%;
        } */ 

        label {
            display: block;
            font-size: 16px;
            color: #ff4d4d;
            margin-bottom: 5px;
            font-family:Arial, Helvetica, sans-serif;
            color:deeppink;
            font-weight: bold;

        }

        input[type="text"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ff4d4d;
            border-radius: 4px;
            margin-bottom: 15px;
            background-color: aliceblue;
          
        }

        .botoes {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        

        }

        /*esse é o botao de entrar*/
        input[type="submit"] {
            font-family:Arial, Helvetica, sans-serif;
            font-size: 15px;
            padding: 10px 35px;
            border: none;
            border-radius: 4px;
            background-color:pink;
            color:deeppink;
            cursor: pointer;
            font-weight: bold;
            
        }

        /*esse é o botao de cadastrar*/
        a.button-link {
            font-family:Arial, Helvetica, sans-serif;
            padding: 10px 20px;
            font-size: 15px;
            border: none;
            border-radius: 4px;
            background-color:pink;
            color:deeppink;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        h2{
            text-align: center;
            color: deeppink;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
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
                    setcookie('user', $user, time() + (3600 * 24));
                    header("Location: page_home/home.php");
                    exit();
                } else {
                    echo "<h2 style = 'color:red'>Usuário e Senha Inválidos</h2>";
                }
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo "Ocorreu um erro com a comunicação do banco de dados";
    }
    ?>
</body>

</html>