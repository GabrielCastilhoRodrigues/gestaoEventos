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
<html lang="pt-BR">
<head>
    <?php
        head('Cadastro de Funcionário');
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
    ?>

    <div class="form-funcionario border shadow-lg">
        <form method="post" action="../method/cadastro_funcionario.php" class="p-3">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control border-dark" required>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">CPF</label>
                    <input type="text" name="cpf" id="cpf" oninput="cpfValido()" class="form-control border-dark" required>
                </div>
                <div class="col">
                    <label class="form-label">Cargo</label>
                    <select name="cargo" id="cargo" class="form-select" required>
                        <option value="">Selecione um cargo</option>
                        <?php
                        $sql =   'SELECT
                                        cargoid,
                                        nome
                                    FROM
                                        cargo
                                    ORDER BY 
                                        nome ASC';
                        $query = $conn->query($sql);
                        $cargos = $query->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($cargos as $cargo){
                        ?>
                        
                        <option value="<?php echo $cargo['cargoid'] ?>"><?php echo $cargo['nome'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Login</label>
                    <input type="text" name="nome_login" id="nome_login" class="form-control border-dark mb-2" required>
                </div>
                <div class="col">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" id="email" oninput="validaEmail()" class="form-control border-dark" required>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col">
                    <label class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control border-dark mb-2" required>
                </div>
                <div class="col">
                    <label class="form-label">Confirmar Senha</label>
                    <input type="password" name="confirmaSenha" id="confirmaSenha" oninput="validaSenha()" class="form-control border-dark" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>

    <?php
        require_once('../components/scripts.html');
    ?>
    <script src="../events/valida_funcionario.js"></script>
</body>
</html>