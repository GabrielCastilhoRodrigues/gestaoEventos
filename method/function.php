<?php

function alert($msg, $tela){
    echo   
        "<script type='text/javascript'>
            alert('$msg');
            window.location.replace('$tela');
        </script>";
}

function alert_error($msg){
    echo   
        "<script type='text/javascript'>
            alert('$msg');
        </script>";
}

function data_valida($date){
    return $date > date('Y-m-d');
}

function horario_valido($horaInicio, $horaFim){
    return $horaInicio < $horaFim;
}

/**
 * Para praticidade, esta função realiza as principais conversões de campos para a parte do Front.
 * Assim, evita a repetição de boa parte do código.
 * 
 * Sumário:
 *  0 -> Ajusta campos datas para o padrão dia/mes/Ano.
 *  1 -> Ajusta campos tempo para apresentar somente Hora:Minuto.
 */
function ajusta_campo($campo, $opcao){
    $retorno = '';

    switch($opcao){
        case 0:
            $retorno = date('d/m/Y', strtotime($campo));
            break;
        case 1:
            $retorno = date('H:i', strtotime($campo));
            break;
        case 2:
            $retorno = date('d/m/Y H:i', strtotime($campo));
            break;
    }

    return $retorno;
}