<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');
    
    $eventoid = $_GET['eventoid'];

    if(!esta_logado()){
        alert('Necessário estar logado para realizar a operação', $t_main);
    }

    $sql = 'UPDATE
                evento
            SET
                concluido = true
            WHERE
                eventoid = :eventoid';
    $query = $conn -> prepare($sql);
    $query->bindParam('eventoid', $eventoid);
    
    if($query->execute()){
        alert('Evento concluído com sucesso', $t_registra_evento);
    }