<?php
    require_once('../backend/verifica_login.php');

    $logado = esta_logado();
?>

<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="../principais/main.php">Eventos Faculdade</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="../cadastro/funcionario.php">Funcionário</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../cadastro/cargo.php">Cargo</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="../cadastro/evento.php">Evento</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../cadastro/codigo_evento.php">Registrar Evento</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-light dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Consulta
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item" href="../consulta/cargo.php">Consulta Cargo</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../consulta/eventos_encerrados.php">Eventos Encerrados</a>
                        </li>
                    </ul>
                </li>
                <?php
                   if ($logado){
                ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#"><?php echo $_SESSION['user']?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../method/logout.php">Logout</a>
                        </li>
                <?php
                   }
                   else {
                ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="../principais/login.php">Login</a>
                        </li>
                <?php
                   }
                ?>
            </ul>
        </div>
    </div>
</nav>