<?php
$texto = $_POST['compartilha'];

$baseURL = "https://twitter.com/intent/tweet";


$textoCodificado = urlencode($texto);

$linkTwitter = "{$baseURL}?text={$textoCodificado}&url={$urlCodificada}";

header("Location: {$linkTwitter}' target='_blank'>Compartilhar no Twitter");
