<?php 
$dbServer = "127.0.0.1";
$dbUser = "root";
$dbPassword = "";
$dbTableUser = "dataBase";

$conexao = mysqli_connect($dbServer,$dbUser,$dbPassword,$dbTableUser);

if(mysqli_connect_errno($conexao)){
echo "o programa apresenta erro";
}else{
    echo "tudo tranquilo";
}
