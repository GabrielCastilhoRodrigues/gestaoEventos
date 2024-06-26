<?php

require_once('../backend/conn.php');
require_once('../backend/verifica_login.php');
require_once('../method/function.php');
require_once('../method/rotas.php');

if (!esta_logado()) {
    alert('Necessário estar logado para realizar a operação', $t_main);
    exit;
}
if (empty($_POST['cargoid'])) {
    alert('Não foi informado o cargo para busca', $t_consulta_cargo);
}

$cargoid = $_POST['cargoid'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$nivel = $_POST['nivel'];

$sql = '
        UPDATE
            cargo
        SET
            nome = :nome,
            descricao = :descricao,
            nivel = :nivel
        WHERE
            cargoid = :cargoid
    ';
$query = $conn->prepare($sql);
$query->bindParam(':nome', $nome);
$query->bindParam(':descricao', $descricao);
$query->bindParam(':nivel', $nivel);
$query->bindParam(':cargoid', $cargoid);

if ($query->execute()) {
    alert('Cargo editado com sucesso!', $t_consulta_cargo);
} else {
    alert('Não foi possível realizar a edição do cargo', $t_consulta_cargo);
}
