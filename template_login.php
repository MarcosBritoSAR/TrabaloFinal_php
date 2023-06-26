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
        <br/>
        <br/>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br/>
        <br/>
        <input type="submit" value="Entrar">
        <a href="cadastrar_usuario.php">
            <button type="button">Cadastrar</button>
        </a>

    </form>

    <?php 
    
        if(isset($_GET["usuario"]) && isset($_GET["senha"])){
            if(isset($_SESSION["user"]) && isset($_SESSION["password"])){
                if(($_SESSION["user"] == $_GET["usuario"]) && ($_SESSION["password"] == $_GET["senha"])){
                    include "template_home.php";
                }else{
                    echo "Usuário e Senha Inválidos" . "<br/>";
                }
            }else{
                $_SESSION["user"] = "usuario1";
                $_SESSION["password"] = "1234";
            }
        }
    
    
    
    
    ?>

</body>
</html>