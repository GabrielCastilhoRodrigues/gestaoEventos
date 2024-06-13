<?php
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');

    if(!esta_logado()){
        alert('Necessário estar logado para realizar a operação!', $t_main);
        exit;
    }

    require_once('../backend/conn.php');
    require_once('../method/consulta_evento.php');

    $evento = consulta_evento($_POST['eventoid']);

    if (!empty($evento)){
        $descricao = $_POST['descricao'];
        $dataevento = $_POST['dataEvento'];
        $localevento = $_POST['localEvento'];
        $horainicio = $_POST['horaInicio'];
        $horafim = $_POST['horaFim'];
        $eventoid = $_POST['eventoid'];

        $sql = 'UPDATE 
                    evento
                SET
                    descricao = :descricao,
                    dataevento = :dataevento,
                    localevento = :localevento,
                    horainicio = :horainicio,
                    horafim = :horafim
                WHERE
                    eventoid = :eventoid';
        $query = $conn->prepare($sql);
        $query->bindParam(':descricao', $descricao);
        $query->bindParam(':dataevento', $dataevento);
        $query->bindParam(':localevento', $localevento);
        $query->bindParam(':horainicio', $horainicio);
        $query->bindParam(':horafim', $horafim);
        $query->bindParam(':eventoid', $eventoid);

        if($query->execute()){
            alert('Evento editado com sucesso!', $t_registra_evento);
        }
        else{
            alert('Não foi possível realizar a edição do evento', $t_registra_evento);
        }
    }
    else{
        alert('Evento não localizado', $t_registra_evento);
    }