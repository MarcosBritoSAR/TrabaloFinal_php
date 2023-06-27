<?php
include "conexao.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['nome']) && isset($_POST['nome_usuario']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['data_nasc'])){
//formatando os dados

$name = $_POST['nome'];
$nameComp = $_POST['nome_parceiro'];
$login = $_POST['nome_usuario'];
$password = $_POST['senha'];
$email =  $_POST['email'];
echo $_POST['data_nasc'];
$dateNasc = $_POST['data_nasc'];
$address = $_POST['endereco'];
$phone = $_POST['telefone'];
$sex = $_POST['sexo'];
$arquivoTemp = $_FILES['foto_perfil']['tmp_name'];
$jpgUser = file_get_contents($arquivoTemp);
$jpgUser = addslashes($jpgUser);

insertUser($name,$nameComp,$login,$password,$email,$dateNasc,$address,$phone,$sex,$jpgUser);

header("Location: template_login.php");
exit();

}else{
    echo "Dados Incompeltos";
}
}else{
    echo "erro upload cadastro";
}
