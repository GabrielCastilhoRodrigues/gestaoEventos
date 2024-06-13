<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../components/head.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');

    $logado = esta_logado();

    if (!$logado){
        alert('Necessário estar logado para acessar este cadastro', $t_main);
    }
    else if ($_SESSION['nivel'] != 1){
        alert('Seu usuário não tem permissão de realizar este tipo de operação', $t_main);
    }
    else{
        require_once('../components/head.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        head('Cadastro de Cargo')
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
    ?>

    <div class="container">
        <form method="post" action="../method/cadastro_cargo.php" class="m-5 p-5 border shadow-lg">
            <div class="mb-4">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control border-black" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Descricao</label>
                <input type="text" name="descricao" id="descricao" class="form-control border-black" required>
                </div>
            <div class="mb-4">
                <label class="form-label">Nível</label>
                <select name="nivel" id="nivel" class="form-select border-black" required>
                    <option value="1">Diretor</option>
                    <option value="2">Coordenador</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <?php
        require_once('../components/scripts.html');
    ?>
</body>
</html>