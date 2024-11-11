<head>
    <style>
        /* Configuração de altura e layout da página para o footer fixo */
        body, html {
            height: 100%;
            display: flex;
            flex-direction: column;
            margin: 0;
        }
        /* Container principal para conteúdo e footer */
        .content-wrap {
            flex: 1;
        }

        /* Estilo do footer */
        .footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            letter-spacing: 2px;
            font-size: 16px;
            background-color: #f0f001;
            padding:15px 20px;
            color: #333;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
        }

        .footer-text {
            margin: 0;
        }

        /* Botão de login/logout alinhado à direita */
        .login-btn {
            font-size: 14px;
            color: white;
            background-color: #dc3545;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <!-- Conteúdo principal da página -->
    <div class="content-wrap">
        <!-- Seu conteúdo aqui -->
        <div style="height: 12vh;"></div>
    </div>

    <!-- Footer fixado no final da página -->
    <footer class="footer">
        <p class="footer-text">© Tio Du Pet Service - 2024 | Todos os Direitos reservados. <br>
        Orgulhosamente desenvolvido com AMOR por © M.F.F Consultoria.</p>
        
        <a href="logout.php" class="login-btn">
            <i class="fas fa-sign-in-alt"></i> Logout
        </a>
    </footer>

    <!-- Script do Bootstrap e Font Awesome (opcional) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
