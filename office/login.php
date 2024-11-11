<?php
session_start();

$erro = '';

if (isset($_SESSION['usuario'])) {
    header("Location: main.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_tiodupetservice";

    $conexao = new mysqli($servername, $username, $password, $dbname);

    if ($conexao->connect_error) {
        die("Falha na conexão: " . $conexao->connect_error);
    }

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
     
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['funcao'] = $row['funcao'];
            header("Location: main.php");
            exit();
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }

    $stmt->close();
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="officestyle.css">
    <title>Tio Du Pets - Login</title>
    <style>
        body {
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            font-family: sans-serif;
            margin: 0;
            font-size: 1rem;
        }

        nav {
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f001;
            height: 12vh;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .logo img {
            width: 12vh;
            height: auto;
            border-radius: 50pt;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .container-centered {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            font-size: 2rem;
            color: #113647;
            text-align: center;
        }

        .btn-primary {
            background-color: #148fdd;
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #116293;
        }

        .back-button {
            margin-top: 1rem;
            background-color: #d1d1d1;
            color: #333;
        }

        .back-button:hover {
            background-color: #bbb;
            color: #000;
        }

        .alert-danger {
            font-size: 0.9rem;
            padding: 0.75rem;
            border-radius: 5px;
            text-align: center;
        }

        .footer {
            letter-spacing: 4px;
            font-size: 20px;
            background-color: #f0f001;
            padding: 10px;
            text-align: center;
            width: 100%;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
    <nav>
        <a class="logo" href="#"><img src="../assets/images/LogoTioDu.svg" alt="Logo Tio Du Pets"></a>
    </nav>

    <div class="container-centered">
        <div class="form-container">
            <h1 class="mb-4">Login</h1>
            <?php if ($erro): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $erro; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label"><b>Usuário</b></label>
                    <input class="form-control" type="text" id="usuario" name="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label"><b>Senha</b></label>
                    <input class="form-control" type="password" id="senha" name="senha" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-sign-in"></i> Entrar
                    </button>
                </div>
            </form>
            <div class="d-grid mt-4">
                <button class="btn back-button" onclick="window.location.href='../index.php';">
                    <i class="fa fa-arrow-left"></i> Voltar
                </button>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; M.F.F Consultoria. 2024 | Orgulhosamente criado com AMOR.</p>
    </footer>
</body>
</html>
