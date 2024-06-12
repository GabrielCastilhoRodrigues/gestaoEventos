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