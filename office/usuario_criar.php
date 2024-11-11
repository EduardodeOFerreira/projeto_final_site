<?php
// Dados de conexão ao banco de dados
$servername = "localhost";
$username = "root"; // seu usuário do BD
$password = ""; // sua senha do BD
$dbname = "db_tiodupetservice"; // nome do seu banco de dados

// Criando a conexão
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Dados do usuário de teste
$nome = "Teste Usuário";
$usuario = "master";
$senha = password_hash("master", PASSWORD_DEFAULT); // Criptografa a senha
$funcao = "admin";


$sql = "INSERT INTO usuarios (nome, usuario, senha, funcao) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $nome, $usuario, $senha, $funcao);

if ($stmt->execute()) {
    echo "Usuário criado com sucesso!";
} else {
    echo "Erro ao criar usuário: " . $stmt->error;
}

$stmt->close();
$conexao->close();
?>
