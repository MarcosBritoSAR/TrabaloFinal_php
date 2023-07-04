<?php

//$id_usuario = intval($_POST["id_usuario"]);

$name = $_POST["name"];
$dataInicio = $_POST["data-inicio"];
$dias = intval($_POST["dias"]);
$meses = intval($_POST["meses"]);
$anos = intval($_POST["anos"]);
$mensagem = $_POST["mensagem"];

$diasTotais = $dias + $meses * 30 + $anos * 12 * 30;

require_once("../conexao.php");
$result = busca($_COOKIE['user']);
$id_usuario = $result[0]['id'];

$UnixStampDataLembrete = strtotime($dataInicio . "+$diasTotais days");
$dataLembrete = date('Y/m/d', $UnixStampDataLembrete);

$query = "INSERT INTO evento (data_registro, data_lembrete, nome, id_usuario, mensagem)
          VALUES ('$dataInicio', '$dataLembrete', '$name', '$id_usuario', '$mensagem')";

try {
    if($_FILES['arquivo']['name'][0]!= NULL){

        mysqli_query($conexao, $query);
        
    $totalArquivos = count($_FILES['arquivo']['name']);

    $query = "SELECT id FROM evento WHERE id_usuario='$id_usuario' ORDER BY id DESC";
    $resultado = mysqli_query($conexao, $query);
    $id_evento = mysqli_fetch_row($resultado)[0];

    for ($i = 0; $i < $totalArquivos; $i++) {
        $caminho = $_FILES['arquivo']['tmp_name'][$i];
        $arquivo = file_get_contents($caminho);

        $extensao = pathinfo($_FILES['arquivo']['name'][$i], PATHINFO_EXTENSION);
        if (!in_array($extensao, ['pdf', 'jpg', 'png'])) {
            echo "Tipo de arquivo inválido.";
            continue; // Ignorar arquivo inválido e prosseguir para o próximo
        }

        $nomeArquivo = uniqid() . '.' . $extensao;
        $caminhoDestino = "caminho/para/o/diretorio/" . $nomeArquivo;
        move_uploaded_file($caminho, $caminhoDestino);
        
        $query = "INSERT INTO arquivo (arquivo, id_evento) VALUES ('$caminhoDestino', '$id_evento')";
        
        if (mysqli_query($conexao, $query)) {
            if ($i === $totalArquivos - 1) {
                header('Location: home.php');
                exit(); // Encerrar o script após redirecionamento
            }
        } else {
            echo mysqli_error($conexao);
            echo "<a href='home.php'>Houve um erro ao salvar os arquivos :(</a>";
        }
        
    }

}else{
    echo "<a href='home.php'>Houve um erro ao salvar os arquivos :(</a>";
}
} catch (mysqli_sql_exception $e) {
    header("Location: utilitarios/ERROR.php");
   exit();
}
