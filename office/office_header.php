<?php
function base_url($path = '') {
    return 'http://localhost/projeto_final/' . $path;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="office_style.css">
    
    <title>Tio Du Pets</title>
    <style>
        body {
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0;
            font-family: sans-serif;
            font-size: 1rem;
        }
        .logo img {
            width: 12vh;
            height: 12vh;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        nav {
            background-color: #f0f001;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            position:fixed;
        }
        .dropdown-content {
            background-color: #f0f001;
        }
        .dropdown-content li a {
            color: black;
        }
        .mobile-menu {
            display: none;
        }
        @media (max-width: 768px) {
            .mobile-menu {
                display: block;
                cursor: pointer;
            }
            .nav-list {
                display: none;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="<?php echo base_url('index.php'); ?>"><img src="../assets/images/LogoTioDu.svg" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Dropdown de Agendamento -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('office/main.php'); ?>" id="agendamentoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-calendar-alt"></i> Agendamento
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="agendamentoDropdown">
                            <li><a class="dropdown-item" href="calendar_agendar.php">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="agendamento_listar.php">Consultar</a></li>
                        </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url('office/main.php'); ?>" id="cadastroDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-plus"></i> Cadastro
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="cadastroDropdown">
                                <li><a class="dropdown-item" href="pet_cadastro.php">Pet</a></li>
                                <li><a class="dropdown-item" href="cliente_cadastro.php">Cliente</a></li>
                                <li><a class="dropdown-item" href="veterinario_cadastro.php">Veterinário</a></li>
                            </ul>
                        </li>
                    <!-- Dropdown de Consulta -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('office/main.php'); ?>" id="consultaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-search"></i> Consulta
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="consultaDropdown">
                            <li><a class="dropdown-item" href="pet_listar.php">Listagem Pet</a></li>
                            <li><a class="dropdown-item" href="cliente_listar.php">Listagem Cliente</a></li>
                            <li><a class="dropdown-item" href="veterinario_listar.php">Listagem Veterinário</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Leads -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('office/main.php'); ?>" id="leadsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bullhorn"></i> Leads
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="leadsDropdown">
                            <li><a class="dropdown-item" href="lead_listar.php">Agendamento Lead</a></li>
                            <li><a class="dropdown-item" href="avaliacao_listar.php">Consultar Avaliação</a></li>
                            <li><a class="dropdown-item" href="dashboard_financeiro.php">Consulta Financeira</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown de Configurações -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo base_url('office/main.php'); ?>" id="configDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i> Configurações
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="configDropdown">
                            <li><a class="dropdown-item" href="servico_cadastro.php">Cadastro de Serviço</a></li>
                            <li><a class="dropdown-item" href="servico_listar.php">Listagem Serviço</a></li>
                            <li><a class="dropdown-item" href="usuario_cadastro.php">Cadastro de Usuário</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<script src="bootstrap.bundle.min.js"></script>

</body>
</html>
