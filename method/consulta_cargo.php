<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('function.php');
    require_once('rotas.php');

    if (!esta_logado()){
        alert('Necessário estar logado para acessar este cadastro', $t_main);
        exit;
    }
    function consulta_cargos(){
        $sql = 'SELECT 
                    cargoid,
                    nome,
                    descricao,
                    case 
                        WHEN nivel = 1 then "Diretor"
                        WHEN nivel = 2 then "Coordenador"
                    END as nivel
                FROM
                    cargo';

        $query = $GLOBALS['conn']->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function consulta_cargo($id){
        $sql = 'SELECT 
                    cargoid,
                    nome,
                    descricao,
                    nivel
                FROM
                    cargo
                WHERE
                    cargoid = :id';

        $query = $GLOBALS['conn']->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    }