<?php
//Arquivo somente para testes. inutil.
include "conexao.php";
echo $_COOKIE['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/style.css">
    <script src="./src/script.js"></script>
</head>

<body>

    <?php
    $result = array();
    if (isset($_COOKIE['user'])) {
        $result = busca($_COOKIE['user']);
    }
    ?>
    <br />
    <label>nome:<?php echo $result[0]['nome'] ?></label>
    <br />
    <label>Nome da companheira: <?php echo $result[0]['nome_companheiro'] ?></label>
    <br />
    <label>data_nasc : <?php echo $result[0]['data_nascimento'] ?></label>
    <br />
    <label>Foto de perfil:
        <?php
        if (isset($result[0]['foto_do_usuario'])) {
            $imageData = base64_encode($result[0]['foto_do_usuario']);
            echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Foto de perfil">';
        }
        ?></label>

    <br />
    <a href="destroiLogin.php">
        <input type="button" value="deslogar">
    </a>

    <?php
    require_once("modal_cadastro_evento.php")
    ?>

</body>

</html>