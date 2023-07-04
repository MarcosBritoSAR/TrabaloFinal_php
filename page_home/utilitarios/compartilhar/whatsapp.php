<?php


$texto = $_POST['compartilha'];


$baseURL = "https://api.whatsapp.com/send/";


$textoCodificado = urlencode($texto);



$linkTwitter = "{$baseURL}?text={$textoCodificado}&url={$urlCodificada}";

header("Location: {$linkTwitter}' target='_blank'>Compartilhar no Whatsapp");
