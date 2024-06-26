<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../components/head.php');
    require_once('../method/function.php');
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
        head('Eventos');
    ?>
</head>

<body>
    <?php
        require_once('../components/navbar.php');
        require_once('../method/consulta_evento.php');
    ?>

        <div class="table-responsive m-5">
            <table class="table align-middle text-center table-bordered border-dark">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data Evento</th>
                        <th>Local Evento</th>
                        <th>Hora Inicio</th>
                        <th>Concluído</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $eventos = consulta_todos_eventos();
                        foreach($eventos as $evento){
                    ?>
                        <tr>
                            <td><?php echo $evento['descricao'] ?></td>
                            <td><?php echo ajusta_campo($evento['dataEvento'], 0) ?></td>
                            <td><?php echo $evento['localEvento'] ?></td>
                            <td><?php echo ajusta_campo($evento['horaInicio'], 1) ?></td>
                            <td>
                                <?php 
                                    echo ($evento['concluido']) ? 'SIM':  'NÃO'
                                ?>
                            </td>
                            <td>
                                <?php                                    
                                    if ($evento['concluido']){
                                ?>
                                        <a class="consultaAlunoEvento" href="../consulta/alunos_registrados.php?eventoid=<?php echo $evento['eventoid'] ?>">
                                            Consultar Certificado
                                        </a>
                                <?php
                                    }
                                    else {
                                ?>
                                    <a class="inscrever" href="../cadastro/participa_evento.php?eventoid=<?php echo $evento['eventoid'] ?>">
                                        PARTICIPAR
                                    </a>
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