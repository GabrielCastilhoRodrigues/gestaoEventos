<?php
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');
    require_once('../backend/conn.php');
    require_once('../method/consulta_evento.php');

$nome = $_POST['nome'];
$ra = $_POST['ra'];
$codigo_evento = $_POST['codigoEvento'];

$consulta_evento = confere_evento_existente($codigo_evento);

if (!empty($consulta_evento)){
    $sql = "
        INSERT INTO alunosevento (
            nome,
            ra,
            codigoevento
        )
        VALUES (
            :nome,
            :ra,
            :evento
        )
    ";

    $query = $conn->prepare($sql);
    $query->bindParam('nome', $nome);
    $query->bindParam('ra', $ra);
    $query->bindParam('evento', $codigo_evento);

    if($query->execute()){
        alert('Registrado com sucesso!', $t_main);
    }
}
else{
    alert('Evento não localizado!', $t_main);
}