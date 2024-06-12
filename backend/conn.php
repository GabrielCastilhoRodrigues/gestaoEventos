<?php
    $host="127.0.0.1";
    $port=3306;
    $socket="";
    $user="root";
    $password="teste1234";
    $dbname="projetoevento";

    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }catch(Exception $e){
        echo $e->getMessage();
        exit;
    }
?>