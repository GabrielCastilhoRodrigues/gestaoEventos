<?php
    require_once("function.php");
    require_once("rotas.php");

    if (!isset($_SESSION))
    {
        session_start();
    }

    session_destroy();

    alert('Encerrado sessão', $t_main);