<?php
$dbServer = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$db = "dataBase";

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

//Função somente para testes. inutil
function busca($user){
    
    global $conexao;


    $sqlBuscar = "
SELECT nome,nome_companheiro, data_nascimento, foto_do_usuario FROM usuario
where login = '$user'
";

    $resultado = mysqli_query($conexao, $sqlBuscar);
    $arrayReturn = array();

    while ($return = mysqli_fetch_assoc($resultado)) {
        $arrayReturn[] = $return;
    }

    return $arrayReturn;
}
//------------------------------



function insertUser($name, $nameComp, $login, $password, $email, $dateNasc, $address, $phone, $sex, $jpgUser)
{
    

    global $conexao;

 $sqlGravar = "
     INSERT INTO usuario 
     (nome,nome_companheiro,login,senha,email,data_nascimento,endereco,telefone,sexo,foto_do_usuario)
     VALUES
    ('$name','$nameComp','$login','$password','$email','$dateNasc','$address','$phone','$sex','$jpgUser')
     ";
try{

    mysqli_query($conexao,$sqlGravar);
    

} catch(mysqli_sql_exception $e){
 echo "ocorreu um erro. formulário incompleto ou usuario com dados repetidos.";
}

}
