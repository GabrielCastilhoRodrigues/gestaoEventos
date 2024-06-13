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

$evento_id = $_GET['eventoid'];
$codigo_evento = substr(uniqid(rand()), 0, 7);

$sql = '
    UPDATE
        evento
    SET
        codigoevento = :codigoevento
    where
        eventoid = :eventoid
';

$query = $conn->prepare($sql);
$query->bindParam(':codigoevento', $codigo_evento);
$query->bindParam(':eventoid', $evento_id);

if($query->execute()){
    alert('Evento registrado com sucesso!', $t_registra_evento);
}