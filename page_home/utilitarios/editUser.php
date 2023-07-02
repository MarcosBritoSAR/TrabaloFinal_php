<?php
require("../../conexao.php");

if (isset($_COOKIE['user'])) {
    $result = array();
    $result = busca($_COOKIE['user']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="uploadEditUser.php" enctype="multipart/form-data"> <!--o enctype Permite que eu envie arquivos-->

        <fieldset>
            <legend>Alterar dados do usuario</legend>
            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo $result[0]['nome']; ?>">
            <br />
            <br />
            <label>Data de nascimento:</label>
            <input type="date" name="data_nasc" value="<?php echo $result[0]['data_nascimento']; ?>">
            <br />
            <br />
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?php echo $result[0]['endereco']; ?>">
            <br />
            <br />
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?php echo $result[0]['telefone']; ?>">
            <br />
            <br />
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $result[0]['email']; ?>">
            <br />
            <br />
            <label>Sexo:</label>
            <br />
            <label>Feminino</label>
            <input type="radio" name="sexo" value="F" checked>
            <label>Masculino</label>
            <input type="radio" name="sexo" value="M">
            <label>Prefiro não informar</label>
            <input type="radio" name="sexo" value="O">
            <br />
            <br />
            <label>Nome de usuário:</label>
            <input type="text" name="nome_usuario" value="<?php echo $result[0]['login']; ?>">
            <br />
            <br />
            <label>Senha:</label>
            <input type="password" name="senha" value="<?php echo $result[0]['senha']; ?>">
            <br />
            <br />
            <label>Nome do/a parceiro (a):</label>
            <input type="text" name="nome_parceiro" value="<?php echo $result[0]['nome_companheiro']; ?>">
            <br />
            <br />
            <label>Insira uma foto de perfil:</label>
            <input type="file" name="foto_perfil" />
            <br />
            <br />
            <?php
            $img = base64_encode($result[0]['foto_do_usuario']);?>
            <img src=<?php echo 'data:image/jpeg;base64,' . $img; ?>>

            <input type="submit" value="Enviar" >
        </fieldset>
    </form>

    <style>
        fieldset {
            border: none;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 10px;
            margin: 0 auto;
            width: 500px;
        }

        legend {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
    </style>

</body>

</html>