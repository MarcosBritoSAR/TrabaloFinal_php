<?php

function calculaIdade($date)
{
    $data1 = new DateTime($date);
    $data2 = new DateTime(Date("Y/m/d"));

    $diferenca = $data1->diff($data2);

    return $diferenca->format('%r%y');
}

function subtraiDate($data)
{
    $datAtual  = new DateTime(date("Y/m/d"));
    $data = new DateTime($data);

    $diferenca = $datAtual->diff($data);
    return $diferenca->format('%a dias');
}

function verificaCronograma($date)
{
    $date1 = new DateTime(date("Y/m/d"));
    $date2 = new DateTime($date);

    if ($date1 < $date2) {
        return true;
    } else {
        return false;
    }
}
