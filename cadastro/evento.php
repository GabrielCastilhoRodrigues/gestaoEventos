<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');

    $logado = esta_logado();

    if (!$logado){
        alert('Necessário estar logado para acessar este cadastro', $t_main);
    }
    else{
        require_once('../components/head.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        head('Cadastro de Eventos');
    ?>
</head>

<body>
    <?php
        require_once('../components/navbar.php');
    ?>

    <form method="post" action="../method/cadastro_evento.php" class="m-5 p-5 border shadow-lg rounded">
        <div class="mb-4">
            <label class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control border-dark" required>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Local do Evento</label>
                <input type="text" name="localEvento" id="localEvento" class="form-control border-dark" required>
            </div>
            <div class="col">
                <label class="form-label">Data do Evento</label>
                <input type="date" name="dataEvento" id="dataEvento" class="form-control border-dark" required>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <label class="form-label">Hora Inicio</label>
                <input type="time" name="horaInicio" id="horaInicio" class="form-control border-dark" required>
            </div>
            <div class="col">
                <label class="form-label">Hora Encerramento</label>
                <input type="time" name="horaFim" id="horaFim" class="form-control border-dark" required>
            </div>
        </div>
        <div class="text-center">
            <button data-mdb-ripple-init type="submit" class="btn btn-lg btn-primary btn-block">Cadastrar</button>
        </div>
    </form>

    <?php
        require_once('../components/scripts.html');
    ?>

</body>

</html>