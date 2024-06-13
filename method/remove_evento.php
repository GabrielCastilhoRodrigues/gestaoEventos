<?php

    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');

    if (!esta_logado()){
        alert('Necessário estar logado para acessar a página', $t_main);
        exit;
    }

    if ($_SESSION['nivel'] != 1){
        alert('Seu usuário não tem permissão de realizar este tipo de operação', $t_registra_evento);
        exit;
    }

    $eventoid = $_GET['eventoid'];

    $sql = 'DELETE FROM
                evento
            WHERE
                eventoid = :eventoid';
    $query = $conn->prepare($sql);
    $query->bindParam('eventoid', $eventoid);
    

    if($query->execute()){
        alert('Evento removido com sucesso!', $t_registra_evento);
    }
    else {
        alert('Não foi possível realizar a exclusão do evento', $t_registra_evento);
    }