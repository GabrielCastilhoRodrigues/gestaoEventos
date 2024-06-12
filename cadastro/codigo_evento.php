<?php
require_once('../backend/conn.php');
require_once('../backend/verifica_login.php');
require_once('../method/function.php');
require_once('../method/rotas.php');

$logado = esta_logado();

if (!$logado) {
    alert('Necessário estar logado para acessar este cadastro', $t_main);
} else {
    require_once('../components/head.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    head('Cadastro de código do evento');
    ?>
</head>

<body>
    <?php
        require_once('../components/navbar.php');
        require_once('../method/consulta_evento.php');
    ?>

    <div class="table-responsive m-5 text-center">
        <h1>Qual evento deseja registrar?</h1>
        <br>
        <table class="table align-middle text-center table-bordered border-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data Evento</th>
                    <th>Local Evento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $eventos = consulta_evento_nao_registrado();

                    foreach ($eventos as $evento) {
                ?>
                    <tr>
                        <td><?php echo $evento['descricao'] ?></td>
                        <td><?php echo $evento['dataEvento'] ?></td>
                        <td><?php echo $evento['localEvento'] ?></td>
                        <td>
                            <a href="../method/registra_evento.php?eventoid=<?php echo $evento['eventoid'] ?>">
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

    <div class="table-responsive m-5 text-center">
        <h1>Eventos registrados</h1>
        <br>
        <table class="table align-middle text-center table-bordered border-dark">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data Evento</th>
                    <th>Local Evento</th>
                    <th>Código Evento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $eventos = consulta_evento_registrado();

                    foreach ($eventos as $evento) {
                ?>
                    <tr>
                        <td><?php echo $evento['descricao'] ?></td>
                        <td><?php echo $evento['dataEvento'] ?></td>
                        <td><?php echo $evento['localEvento'] ?></td>
                        <td><?php echo $evento['codigoEvento'] ?></td>
                        <td>
                            <a href="../consulta/alunos_registrados.php?eventoid=<?php echo $evento['eventoid'] ?>" class="alunos">Alunos registrados</a>
                            <?php
                                if (!$evento['concluido']){
                            ?>
                                <a href="../method/conclui_evento.php?eventoid=<?php echo $evento['eventoid'] ?>" class="concluirEvento">Concluir evento</a>
                            <?php
                                }
                            ?>
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