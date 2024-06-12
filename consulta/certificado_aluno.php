<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');
    require_once('../TCPDF/tcpdf.php');

    $eventoid = $_GET['eventoid'];
    $alunoseventoid = $_GET['alunoid'];

    $sql = 'SELECT
                aluno.nome,
                aluno.ra,
                evento.descricao,
                evento.dataevento,
                timediff(evento.horafim, evento.horainicio) AS duracao
            FROM alunosevento aluno
            JOIN evento
                ON evento.codigoevento = aluno.codigoevento
            WHERE aluno.alunoseventoid = :alunoid
              AND evento.eventoid = :eventoid';

    $query = $conn->prepare($sql);
    $query->bindParam('alunoid', $alunoseventoid);
    $query->bindParam('eventoid', $eventoid);
    $query->execute();

    $dados = $query->fetch(PDO::FETCH_ASSOC);

    if (!empty($dados)) {
        $nome = $dados['nome'];
        $ra = $dados['ra'];
        $nomeEvento = $dados['descricao'];
        $dataEvento = date('d/m/Y', strtotime($dados['dataevento']));
        $duracaoEvento = date('H:i', strtotime($dados['duracao']));

        $pdf = new TCPDF();

        $html = '
            <h2>O Aluno '.$nome.' portador do RA '.$ra.' participou na data de '.$dataEvento.', do evento '.$nomeEvento.' que durou '.$duracaoEvento.'</h2>
        ';

        $pdf->SetFont('times', 'BI', 20);
        $pdf->AddPage();

        //Preenche o PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        $pdf->Output('certificado.pdf', 'D');
    }
    else{
        alert('Não foi possível localizar os dados', $t_main);
    }