<?php
$id_usuario = intval($_POST["id_usuario"]);

$name = $_POST["name"];
$dataInicio = $_POST["data-inicio"];
$dias = intval($_POST["dias"]);
$meses = intval($_POST["meses"]);
$anos = intval($_POST["anos"]);
$mensagem = $_POST["mensagem"];

$diasTotais = $dias + $meses * 30 + $anos * 12 * 30;
require_once("../conexao.php");

//converter a string dataInicio em data usando UnixTimeStamp e somando os dias que devem ser lembrados
$UnixStampDataLembrete = strtotime($dataInicio . "+$diasTotais days");

$dataLembrete = date('Y/m/d', $UnixStampDataLembrete);

$query = "INSERT INTO evento (data_registro, data_lembrete, nome, id_usuario, mensagem)
        VALUES ('$dataInicio', '$dataLembrete', '$name', '$id_usuario', '$mensagem')";

if (mysqli_query($conexao, $query)) {

    $totalArquivos = count($_FILES['arquivo']['name']);

    $query = "SELECT id FROM evento WHERE id_usuario='$id_usuario' ORDER BY id DESC";
    $resultado = mysqli_query($conexao, $query);
    $id_evento = mysqli_fetch_row($resultado);
    for ($i=0; $i <$totalArquivos ; $i++) { 

        $caminho = $_FILES['arquivo']['tmp_name'][$i];
        $arquivo = file_get_contents($caminho);
        $arquivo = addslashes($arquivo);

        $query= "INSERT INTO arquivo (arquivo, id_evento) VALUES ('$arquivo', '$id_evento[0]')" ;

        if(mysqli_query($conexao, $query)){
            header('Location: home.php');
        }else{
            echo mysqli_error($conexao);
            echo "<a href='home.php' >Houve erro ao salvar os arquivos :(</a>";
        }
    }

} else {
    echo "Houve erro no Cadastro :(!";
}

?>