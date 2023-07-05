<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" action="uploadCadastro.php" enctype="multipart/form-data"> <!--o enctype Permite que eu envie arquivos-->

        <fieldset>
            <legend>CADASTRO DE USUÁRIO</legend>
            <label>Nome:</label>
            <input type="text" name="nome">
            <br />
            <br />
            <label>Data de nascimento:</label>
            <input type="date" name="data_nasc">
            <br />
            <br />
            <label>Endereço:</label>
            <input type="text" name="endereco">
            <br />
            <br />
            <label>Telefone:</label>
            <input type="text" name="telefone">
            <br />
            <br />
            <label>Email:</label>
            <input type="text" name="email">
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
            <input type="text" name="nome_usuario">
            <br />
            <br />
            <label>Senha:</label>
            <input type="password" name="senha">
            <br />
            <br />
            <label>Nome do/a parceiro (a):</label>
            <input type="text" name="nome_parceiro">
            <br />
            <br />
            <label>Insira uma foto de perfil:</label>
            <input type="file" name="foto_perfil">
            <br />
            <br />
            <input type="submit" value="Enviar">
        </fieldset>
    </form>

    <style>
        body{
            background-image:url("img/2.png");
        }
        fieldset {
            border: none;
            padding: 20px;
            background-color:mediumpurple;
            border-radius: 10px;
            margin: 0 auto;
            width: 500px;
        }

        legend {
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 10px;
            font-family: Arial, Helvetica, sans-serif;
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