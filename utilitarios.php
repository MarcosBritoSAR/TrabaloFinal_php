<?php 

function calculaIdade($date){
    $data1 = new DateTime($date);
    $data2 = new DateTime(Date("Y/m/d"));

$diferenca = $data1 -> diff($data2);

return $diferenca -> format('%r%y');
}
