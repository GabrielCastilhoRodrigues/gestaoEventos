<?php
    session_start();

    function esta_logado(){
        // Verifica se existe os dados da sessão de login
        if(!isset($_SESSION["user"]) || !isset($_SESSION["cargo"]))
        {
            return false;
        }

        return true;
    }