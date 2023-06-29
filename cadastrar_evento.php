<?php
$id_usuario = intval($_POST["id_usuario"]);

$name = $_POST["name"];
$dataInicio = $_POST["data-inicio"];
$dias = intval($_POST["dias"]);
$meses = intval($_POST["meses"]);
$anos = intval($_POST["anos"]);
$mensagem = $_POST["mensagem"];

$diasTotais = $dias + $meses * 30 + $anos * 12 * 30;
require_once("conexao.php");

//converter a string dataInicio em data usando UnixTimeStamp e somando os dias que devem ser lembrados
$UnixStampDataLembrete = strtotime($dataInicio . "+$diasTotais days");

$dataLembrete = date('Y/m/d', $UnixStampDataLembrete);

$query = "INSERT INTO evento (data_registro, data_lembrete, nome, id_usuario)
        VALUES ('$dataInicio', '$dataLembrete', '$name', '$id_usuario')";

if (mysqli_query($conexao, $query)) {
    session_start();
    $_SESSION['sucessoCadastro'] = true;
    header("Location: index.php");
} else {
    session_start();
    $_SESSION['sucessoCadastro'] = false;
    header("Location: index.php");

}

?>