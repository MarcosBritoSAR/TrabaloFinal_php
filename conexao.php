<?php
$dbServer = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$db = "database";

$conexao = mysqli_connect($dbServer, $dbUser, $dbPassword, $db);

if ($conexao->connect_errno) {
    echo "Problemas para se conectar ao banco de dados" . mysqli_connect_error();
}


//-----------------------------------------
function consultarUser($user)
{
    global $conexao;


    $sqlBuscar = "
SELECT login, senha FROM usuario
where login = '$user'
";

    $resultado = mysqli_query($conexao, $sqlBuscar);
    $arrayReturn = array();

    while ($return = mysqli_fetch_assoc($resultado)) {
        $arrayReturn[] = $return;
    }

    if ($arrayReturn != NULL) {
        return $arrayReturn;
    } else {
        $arrayReturn = array(
            array(
                'login' => '',
                'senha' => ''
            )
        );
    }


    return $arrayReturn;
}


function busca($user)
{

    global $conexao;


    $sqlBuscar = "
SELECT * FROM usuario
where login = '$user'
";

    $resultado = mysqli_query($conexao, $sqlBuscar);
    $arrayReturn = array();

    while ($return = mysqli_fetch_assoc($resultado)) {
        $arrayReturn[] = $return;
    }

    return $arrayReturn;
}


function insertUser($name, $nameComp, $login, $password, $email, $dateNasc, $address, $phone, $sex, $jpgUser)
{


    global $conexao;

    $sqlGravar = "
     INSERT INTO usuario 
     (nome,nome_companheiro,login,senha,email,data_nascimento,endereco,telefone,sexo,foto_do_usuario)
     VALUES
    ('$name','$nameComp','$login','$password','$email','$dateNasc','$address','$phone','$sex','$jpgUser')
     ";
    try {

        mysqli_query($conexao, $sqlGravar);
    } catch (mysqli_sql_exception $e) {
        echo "ocorreu um erro. formulário incompleto ou usuario com dados repetidos.";
    }
}

function editUser($id, $name, $nameComp, $login, $password, $email, $dateNasc, $address, $phone, $sex, $jpgUser)
{
    global $conexao;

    $sqlGravar = "
     UPDATE usuario
     SET nome = '$name', nome_companheiro = '$nameComp', login = '$login', senha = '$password', email = '$email', data_nascimento = '$dateNasc', endereco = '$address', telefone = '$phone', sexo = '$sex', foto_do_usuario = '$jpgUser'
     WHERE id = $id";

    try {
        mysqli_query($conexao, $sqlGravar);
    } catch (mysqli_sql_exception $e) {
        echo "Ocorreu um erro. Formulário incompleto ou usuário com dados repetidos. " . $e->getMessage();
    }
}

function excluirUser($id)
{
    
    global $conexao;

    $sqlGravar = "
    DELETE FROM usuario
    WHERE id = $id;";

    try {
        mysqli_query($conexao, $sqlGravar);
    } catch (mysqli_sql_exception $e) {
        echo "Ocorreu um erro. Formulário incompleto ou usuário com dados repetidos. " . $e->getMessage();
    }
}
//---------------------------------
function buscaEvento($id)
{

    global $conexao;


    $sqlBuscar = "
SELECT * FROM evento
where id_usuario = '$id'
";

    $resultado = mysqli_query($conexao, $sqlBuscar);
    $arrayReturn = array();

    while ($return = mysqli_fetch_assoc($resultado)) {
        $arrayReturn[] = $return;
    }

    return $arrayReturn;
}
//--------------------------------------------
function buscaMidia($id)
{

    global $conexao;


    $sqlBuscar = "
SELECT * FROM arquivo
where id_evento = '$id'
";

    $resultado = mysqli_query($conexao, $sqlBuscar);
    $arrayReturn = array();

    while ($return = mysqli_fetch_assoc($resultado)) {
        $arrayReturn[] = $return;
    }

    return $arrayReturn;
}