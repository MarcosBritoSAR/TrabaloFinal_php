<?php
require_once('../../../conexao.php');
$id_evento = intval($_GET['id_evento']);

$query = "DELETE FROM evento WHERE id='$id_evento'";

try {
    mysqli_query($conexao, $query);
    header("Location: ../../home.php");
} catch (mysqli_sql_exception $erro) {
    header("Location: ../ERROR.php");
    exit();
}

?>