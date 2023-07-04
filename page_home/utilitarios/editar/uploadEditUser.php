<?php
require_once("../../../conexao.php");
$result = array();
$result = busca($_COOKIE['user']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome']) && isset($_POST['nome_usuario']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['data_nasc'])) {
        //formatando os dados

        $id = $result[0]['id'];
        $name = $_POST['nome'];
        $nameComp = $_POST['nome_parceiro'];
        $login = $_POST['nome_usuario'];
        $password = $_POST['senha'];
        $email =  $_POST['email'];
        $dateNasc = $_POST['data_nasc'];
        $address = $_POST['endereco'];
        $phone = $_POST['telefone'];
        $sex = $_POST['sexo'];

        if ($_FILES['foto_perfil']['tmp_name'] != NULL) {
            $arquivoTemp = $_FILES['foto_perfil']['tmp_name'];
            $jpgUser = file_get_contents($arquivoTemp);
            $jpgUser = addslashes($jpgUser);
        } else {
            $jpgUser = $result[0]["foto_do_usuario"];
        }


        editUser($id, $name, $nameComp, $login, $password, $email, $dateNasc, $address, $phone, $sex, $jpgUser);
        echo "etapa 2 completa";

        header("Location: ../../home.php");
    } else {
        echo "Dados Incompeltos";
    }
} else {
    header("Location:../ERROR.php");
    exit();
}
