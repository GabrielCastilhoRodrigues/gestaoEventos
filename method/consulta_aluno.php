<?php
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');
    require_once('../backend/conn.php');
    require_once('../method/consulta_evento.php');
    function consulta_aluno_evento($eventoid){
        $sql = "SELECT
                    aluno.nome,
                    aluno.ra,
                    aluno.alunoseventoid,
                    evento.eventoid,
                    evento.concluido
                FROM 
                    evento
                JOIN alunosevento aluno
                    ON aluno.codigoevento = evento.codigoevento
                WHERE
                    evento.eventoid = :eventoid";

        $query = $GLOBALS['conn']->prepare($sql);
        $query->bindParam('eventoid', $eventoid);
        $query->execute();
        $retorno = $query->fetchAll();
    
        return $retorno;
    }