<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";
$username = "u386416527_tiodupet";
$password = "M30%paramore";
$dbname = "u386416527_tiodupet";

// Criar conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error);
}

// Obter dados do formulário
$nome_avaliador = $_POST['nome_avaliador'];
$estrelas = $_POST['estrelas'];
$descricao = $_POST['descricao'];

// Preparar e executar a inserção
$stmt = $conexao->prepare("INSERT INTO avaliacao_solicitadas (nome_avaliador, estrelas, descricao) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $nome_avaliador, $estrelas, $descricao);

if ($stmt->execute()) {
    // Mensagem de sucesso (opcional, se quiser exibir antes do redirecionamento)
    echo "<script>alert('Avaliação enviada com sucesso!');</script>";
    
    // Redireciona para a página index.php
    header("Location: /index.php");
    exit(); // Certifique-se de adicionar o exit() para parar a execução do script
} else {
    // Mensagem de erro
    echo "<script>alert('Erro: " . $stmt->error . "');</script>";
    
    // Redireciona para a página index.php mesmo em caso de erro
    header("Location: /index.php");
    exit(); // Pare a execução
}


// Fechar a conexão
$stmt->close();
$conexao->close();
?>
