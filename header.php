<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tio Du Pets</title>

    <style>
        /* Estilizando o nav */
        header nav {
            position: fixed;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f0f001; /* Fundo amarelo */
            color: #000;
            width: 100%;
            z-index: 1000;
        }

        .nav-list {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .nav-list li {
            margin: 0;
        }

        .nav-list a {
            color: #000; /* Texto preto para contraste no fundo amarelo */
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            padding: 8px 15px;
            border: 2px solid transparent;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        /* Hover nos botões */
        .nav-list a:hover {
            background-color: #ffffff; /* Cor de destaque */
            color: #fe6c6c;
            border-color: #ffa8a8;
        }

        /* Estilo da logo */
        .logo img {
            width: 13vh;
            height: 13vh;
            border-radius: 50pt;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Botão "Solicite seu agendamento" */
        .agendamento-btn {
            background-color: #fe6c6c;
            color: #ffffff;
            padding: 8px 20px;
            border-radius: 25px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .agendamento-btn:hover {
            background-color: #ffd5d5;
            color: #000;
        }

        /* Menu mobile */
        .mobile-menu {
            display: none;
            cursor: pointer;
            flex-direction: column;
        }

        .mobile-menu div {
            width: 25px;
            height: 3px;
            background-color: #000;
            margin: 5px;
            transition: 0.3s;
        }

        /* Menu responsivo */
        @media (max-width: 768px) {
            .nav-list {
                position: absolute;
                top: 70px;
                right: 0;
                width: 100%;
                height: calc(100vh - 70px);
                background-color: #f0f001;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 30px;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            }

            .nav-list.active {
                transform: translateX(0);
            }

            .mobile-menu {
                display: flex;
            }

            /* Oculta o botão de agendamento no mobile */
            .agendamento-btn {
                display: none;
            }
        }
    </style>
</head>

<body>
<header>
    <nav>
        <a class="logo" href="index.php#"><img src="assets/images/LogoTioDu.png" alt="Logo Tio Du Pets"></a>

        <div class="mobile-menu" onclick="toggleMenu()">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        
        <ul class="nav-list" id="nav-list">
            <li><a href="https://gold-kangaroo-527463.hostingersite.com/#sobre-nos">O Espaço</a></li>
            <li><a href="https://gold-kangaroo-527463.hostingersite.com/#servicos">Serviços e comodidades</a></li>
            <li><a href="https://gold-kangaroo-527463.hostingersite.com/#acomodacoes">Acomodações</a></li>
            <li><a href="https://gold-kangaroo-527463.hostingersite.com/#localizacao">Localização</a></li>
            <li><a href="https://gold-kangaroo-527463.hostingersite.com/#avaliacoes">Avaliações</a></li>
        </ul>

        <!-- Botão "Solicite seu agendamento" -->
        <a href="agendamento.php" class="agendamento-btn">Solicite seu agendamento</a>
    </nav>
</header>

<script>
    function toggleMenu() {
        const navList = document.getElementById('nav-list');
        navList.classList.toggle('active');
    }
</script>

</body>
</html>
