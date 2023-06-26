<?php
$dbServer = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$db = "dataBase";

$conexao = mysqli_connect($dbServer, $dbUser, $dbPassword, $db);

if ($conexao->connect_errno) {
    echo "Problemas para se conectar ao banco de dados". mysqli_connect_error();
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

    if($arrayReturn != NULL){
        return $arrayReturn;
    }else{
        $arrayReturn = array(
            array(
                'login' => '',
                'senha' => ''
            )
        ); 
    }

    
    return $arrayReturn;
    
}


function insertUser($id,$name,$nameComp,$login,$password,$email,$dateNasc,$address,$phone,$sex,$jpgUser){

    global $conexao;
//Depois vou finalizar
    $sqlGravar = "
    INSERT INTO usuario 
    ()
    ";
}