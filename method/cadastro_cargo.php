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

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $nivel = $_POST['nivel'];

    $sql = 'INSERT INTO cargo(
                nome,
                descricao,
                nivel
            )
            values (
                :nome,
                :descricao,
                :nivel
            )';

    $query = $conn->prepare($sql);
    $query->bindParam('nome', $nome);
    $query->bindParam('descricao', $descricao);
    $query->bindParam('nivel', $nivel);

    if($query->execute()){
        alert('Cadastro realizado com sucesso!', $t_cadastro_cargo);
    }
    else {
        alert('Não foi possível realizar o cadastro', $t_cadastro_cargo);
    }