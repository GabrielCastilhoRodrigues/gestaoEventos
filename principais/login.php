<?php
    require_once('../backend/conn.php');
    require_once('../components/head.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        head('Login');
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
    ?>

    <div class="border shadow-lg p-5 m-5">
        <form method="post" action="../method/login.php">
            <div class="mb-3 px-5">
                <label class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control border-dark" required>
            </div>
            <div class="mb-3 px-5">
                <label class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control border-dark" required>
            </div>
            <div class="mb-3 px-5 text-center">
                <button type="submit" class="btn btn-primary btn-lg text-center">Acessar</button>
            </div>
        </form>
    </div>

    <?php
        require_once('../components/scripts.html');
    ?>
</body>
</html>