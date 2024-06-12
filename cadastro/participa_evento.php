<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../components/head.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');
    require_once('../components/head.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        head('Cadastro de Funcionário');
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
    ?>

    
    <form method="post" action="../method/registra_aluno.php" class="m-5 p-5 border shadow-lg rounded">
        <div class="mb-4">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control border-dark" required>
        </div>
        <div class="mb-4">
            <label class="form-label">RA</label>
            <input type="text" name="ra" id="ra" class="form-control border-dark" required>
        </div>
        <div class="mb-4">
            <label class="form-label">Código do evento</label>
            <input type="text" name="codigoEvento" id="codigoEvento" class="form-control border-dark" required>
        </div class="mb-4">
        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
        </div>
    </form>

    <?php
        require_once('../components/scripts.html');
    ?>
</body>
</html>