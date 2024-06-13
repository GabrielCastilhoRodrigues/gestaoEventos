<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');

    $logado = esta_logado();

    if (!$logado){
        alert('Necessário estar logado para acessar este cadastro', $t_main);
        exit;
    }

    $descricao = $_POST['descricao'];
    $localEvento = $_POST['localEvento'];
    $dataEvento = strtotime($_POST['dataEvento']);
    $horaInicio = $_POST['horaInicio'];
    $horaFim = $_POST['horaFim'];
    $usuario = $_SESSION['id'];

    $dataEvento = date('Y-m-d', $dataEvento);

    if(data_valida($dataEvento)
        && horario_valido($horaInicio, $horaFim)){
        $sql = 
            'INSERT INTO evento(
                descricao,
                dataevento,
                localevento,
                horainicio,
                horafim,
                funcionarioid
            )
            VALUES (
                :descricao,
                :dataevento,
                :localevento,
                :horainicio,
                :horafim,
                :funcionarioid
            )';

        $query = $conn->prepare($sql);
        $query->bindParam('descricao', $descricao);
        $query->bindParam('dataevento', $dataEvento);
        $query->bindParam('localevento', $localEvento);
        $query->bindParam('horainicio', $horaInicio);
        $query->bindParam('horafim', $horaFim);
        $query->bindParam('funcionarioid', $usuario);

        if($query->execute()){
            alert('Cadastro realizado com sucesso!', $t_main);
        }
        else{
            alert_error('Não foi possível realizar o cadastro');
        }
    }
    else{
        alert_error('Necessário que a data do evento seja maior que a data atual!');
    }