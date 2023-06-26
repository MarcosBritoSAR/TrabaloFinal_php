<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Bem Vindo à special dates!</h1>

    <form method="GET">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br />
        <br />
        <label>Senha:</label>
        <input type="password" name="senha">
        <br />
        <br />
        <input type="submit" value="Entrar">

        <a href="cadastrar_usuario.php">
            <button type="button">Cadastrar</button>
        </a>

    </form>

    <?php

    if (isset($_GET["usuario"]) && isset($_GET["senha"]) && $_GET["usuario"] != "") {

        include "conexao.php";

        $dados = consultarUser($_GET["usuario"]);
        $_SESSION["user"] = $dados[0]["login"];
        $_SESSION["password"] = $dados[0]["senha"];

        if (($_SESSION["user"] == $_GET["usuario"]) && ($_SESSION["password"] == $_GET["senha"])) {
            echo "user logado";
            header("Location: template_home.php");
            exit();
        } else {
            echo "Usuário e Senha Inválidos" . "<br/>";
        }
    }




    ?>

</body>

</html>