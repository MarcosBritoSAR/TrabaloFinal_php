<?php 
require("../../../conexao.php");
$result = busca($_COOKIE['user']);
excluirUser($result[0]['id']);
header("Location: ../../../destroiLogin.php");
?>