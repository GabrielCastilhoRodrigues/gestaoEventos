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
                (codigoevento is NULL
                or codigoevento = '')
                and encerrado = FALSE
            ";
    
    $query = $GLOBALS['conn']->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function consulta_evento($id){
    $sql = "SELECT
                descricao,
                dataevento,
                localevento,
                horainicio,
                horafim
            FROM
                evento
            WHERE
                eventoid = :eventoid
                and concluido = FALSE
            ";
    
    $query = $GLOBALS['conn']->prepare($sql);
    $query->bindParam(':eventoid', $id);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
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
                AND encerrado = FALSE
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

function consulta_evento_encerrado(){
    $sql = "SELECT
                eventoid,
                descricao,
                localEvento,
                dataEvento,
                codigoEvento,
                dataEncerrado
            FROM
                evento
            WHERE
                encerrado = TRUE
            ";
    
    $query = $GLOBALS['conn']->query($sql);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}