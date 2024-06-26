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
        head('Consuta eventos encerrados');
    ?>
</head>
<body>
    <?php
        require_once('../components/navbar.php');
        require_once('../method/consulta_evento.php');
    ?>

    <div class="table-responsive m-5 text-center">
        <h1>Eventos encerrados</h1>
        <table class="table align-middle text-center table-bordered border-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data Evento</th>
                    <th>Local Evento</th>
                    <th>Data Encerrado</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $eventos = consulta_evento_encerrado();

                    foreach ($eventos as $evento) {
                ?>
                    <tr>
                        <td><?php echo $evento['descricao'] ?></td>
                        <td><?php echo ajusta_campo($evento['dataEvento'], 0) ?></td>
                        <td><?php echo $evento['localEvento'] ?></td>
                        <td><?php echo ajusta_campo($evento['dataEncerrado'], 2) ?></td>
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