<?php
    require_once("function.php");
    require_once("rotas.php");

    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    if (empty($login)
        && empty($senha)) {
        alert('Deve ser preenchido todos os dados para acesso', $t_login);
        exit;
    }
    else{
        require_once('../backend/conn.php');
        
        // Inicia sessões
        session_start();
    }

    $sql = 
            "SELECT 
                nome_login,
                cargoid,
                funcionarioid
            FROM 
                funcionario
            WHERE
                nome_login = :login
                and senha = :senha";
    $query = $conn->prepare($sql);
    $query->bindParam(':login', $login);
    $query->bindParam(':senha', $senha);
    $query->execute();

    if ($query->rowCount() > 0) {
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user'] = $usuario['nome_login'];
        $_SESSION['cargo'] = $usuario['cargoid'];
        $_SESSION['id'] = $usuario['funcionarioid'];
        alert('Acesso realizado com sucesso', $t_main);
    }
    else{
        echo $query;
        //alert('Usuário não encontrado!', $t_login);
    }