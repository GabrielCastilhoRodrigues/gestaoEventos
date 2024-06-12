<?php
    require_once('../backend/conn.php');
    require_once('../backend/verifica_login.php');
    require_once('../components/head.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        head('Eventos');
    ?>
</head>

<body>
    <?php
        require_once('../components/navbar.php');
        require_once('../method/consulta_aluno.php');
    ?>

        <div class="table-responsive m-5">
            <table class="table align-middle text-center table-bordered border-dark">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>RA</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $alunos = consulta_aluno_evento($_GET['eventoid']);
                        foreach($alunos as $aluno){
                    ?>
                        <tr>
                            <td><?php echo $aluno['nome'] ?></td>
                            <td><?php echo $aluno['ra'] ?></td>
                            <td>
                                <?php 
                                    if ($aluno['concluido']){
                                ?>
                                    <a class="consultaCertificado" href="../consulta/certificado_aluno.php?alunoid=<?php echo $aluno['alunoseventoid'] ?>&eventoid=<?php echo $aluno['eventoid'] ?>">Consultar Certificado</a>
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