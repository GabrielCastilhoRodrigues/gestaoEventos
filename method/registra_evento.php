<?php
require_once('../backend/conn.php');
require_once('../backend/verifica_login.php');
require_once('../method/function.php');
require_once('../method/rotas.php');

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