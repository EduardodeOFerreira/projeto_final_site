<?php
include 'login_activity.php';
include 'office_header.php';
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Conexão ao banco de dados
include 'conexaoAction.php';

    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $funcao = $_POST['funcao'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Nome de usuário já existe!</div>";
    } else {
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuarios (nome, usuario, senha, funcao) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssss", $nome, $usuario, $senha_criptografada, $funcao);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Usuário cadastrado com sucesso!</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar usuário: " . $stmt->error . "</div>";
        }
    }

    $stmt->close();
    $conexao->close();
}
?>

<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Usuário</h1>
        <form action="cadastro.php" method="POST">
            <!-- Campo oculto ID -->
            <input name="txtID" id="txtID" type="text" hidden>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" id="usuario" name="usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="funcao" class="form-label">Função</label>
                <select id="funcao" name="funcao" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="usuario">Usuário</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
</div>

</body>

<?php
include 'footer.php';
?>
</html>
