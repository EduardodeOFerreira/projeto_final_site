<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Prepara a consulta SQL para inserir o veterinário
$stmt = $conexao->prepare("INSERT INTO veterinario (nome, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 
// Obtém os valores do formulário
$nome = $_POST['txtNome'];
$telefone = $_POST['txtTelefone'];
$email = $_POST['txtEmail'];
$endereco = $_POST['txtEndereco'];
$numero = $_POST['txtNumero'];
$complemento = $_POST['txtComplemento'];
$bairro = $_POST['txtBairro'];
$cep = $_POST['txtCep'];
$cidade = $_POST['txtCidade'];
$estado = $_POST['txtEstado'];

// Associa os parâmetros à consulta
$stmt->bind_param("ssssisssss", $nome, $telefone, $email, $endereco, $numero, $complemento, $bairro, $cep, $cidade, $estado);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cadastro de Veterinário realizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
