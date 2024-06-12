<?php
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');
    require_once('../backend/conn.php');

function consulta_todos_eventos(){
    $sql = 
        'SELECT
            eventoid,
            descricao,
            localEvento,
            dataEvento,
            horaInicio,
            concluido
        FROM
            evento';
    
    $query = $GLOBALS['conn']->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function consulta_evento_nao_registrado(){
    $sql = "SELECT
                eventoid,
                descricao,
                localEvento,
                dataEvento
            FROM
                evento
            WHERE
                codigoevento is NULL
                or codigoevento = ''
            ";
    
    $query = $GLOBALS['conn']->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function consulta_evento_registrado(){
    $sql = "SELECT
                eventoid,
                descricao,
                localEvento,
                dataEvento,
                codigoEvento,
                concluido
            FROM
                evento
            WHERE
                codigoevento is not NULL
            ";
    
    $query = $GLOBALS['conn']->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function confere_evento_existente($codigoEvento){
    $sql = "SELECT
                1 as existe
            FROM
                evento
            WHERE
                codigoevento = :codigoEvento
            ";

    $query = $GLOBALS["conn"]->prepare($sql);
    $query->bindParam('codigoEvento', $codigoEvento);
    $query->execute();
    $retorno = $query->fetchAll();

    return $retorno;
}