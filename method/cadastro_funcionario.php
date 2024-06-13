<?php
    require_once("function.php");
    require_once("rotas.php");

    require_once("../backend/verifica_login.php");

    if (!esta_logado()){
        alert('Necessário estar logado para acessar esta página', $t_main);
        exit;
    }

    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $cargo = $_POST["cargo"];
    $login = $_POST["nome_login"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    if (!empty($nome)
        && !empty($cpf)
        && is_numeric($cargo)
        && !empty($login)
        && !empty($email)
        && !empty($senha)){
        require_once('../backend/conn.php');
    }
    else {
        alert("Todos os dados devem ser preenchidos para realizar o cadastro", $t_cadastro_funcionario);
        exit;
    }

    $sql = "INSERT INTO funcionario (
                nome,
                cpf,
                cargoid,
                senha,
                nome_login,
                email
            )
            VALUES (
                :nome,
                :cpf,
                :cargo,
                :senha,
                :login,
                :email
            )";
    
    $query = $conn -> prepare($sql);
    $query -> bindParam(':nome', $nome);
    $query -> bindParam(':cpf', $cpf);
    $query -> bindParam(':cargo', $cargo);
    $query -> bindParam(':senha', $senha);
    $query -> bindParam(':login', $login);
    $query -> bindParam(':email', $email);

    if($query -> execute()){
        alert("Cadastro realizado com sucesso!", $t_cadastro_funcionario);
    }
    else {
        alert("Não foi possível cadastrar o funcionário", $t_cadastro_funcionario);
    }