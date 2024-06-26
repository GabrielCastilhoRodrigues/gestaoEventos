<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../method/function.php');
    require_once('../method/rotas.php');

    if (!esta_logado()) {
        alert('Necessário estar logado para acessar este cadastro', $t_main);
    } else {
        require_once('../components/head.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php
        head('Consulta de cargos');
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
        require_once('../method/consulta_cargo.php');
    ?>

<div class="table-responsive m-5 text-center">
        <h1>Cargos Cadastrados</h1>
        <br>
        <table class="table align-middle text-center table-bordered border-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Nível</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $cargos = consulta_cargos();

                    foreach ($cargos as $cargo) {
                ?>
                    <tr>
                        <td><?php echo $cargo['nome'] ?></td>
                        <td><?php echo $cargo['descricao'] ?></td>
                        <td><?php echo $cargo['nivel'] ?></td>
                        <td>
                            <a href="../edit/cargo.php?cargoid=<?php echo $cargo['cargoid'] ?>">
                                <i class="fa-regular fa-square-check fa-shake confirma"></i>
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php
        require_once('../components/scripts.html');
    ?>
</body>
</html>