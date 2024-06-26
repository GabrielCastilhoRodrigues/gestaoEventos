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
    $sql = "UPDATE
                evento
            SET
                encerrado = TRUE,
                dataencerrado = now()
            WHERE
                eventoid = :id
            ";

    $query = $conn->prepare($sql);
    $query->bindParam('id', $eventoid);
    $query->execute();    

    if($query->rowCount() > 0){
        alert('Evento encerrado com sucesso!', $t_registra_evento);
    }
    else {
        alert('Não foi possível realizar o encerramento do evento', $t_registra_evento);
    }    