<?php
include 'conexaoAction.php'; // Inclua sua conexão com o banco de dados
 
// Prepara a consulta SQL para atualizar o cliente
$stmt = $conexao->prepare("UPDATE cliente SET nome = ?, cpf = ?, telefone = ?, email = ?, endereco = ?, numero = ?, complemento = ?, bairro = ?, cep = ?, cidade = ?, estado = ? WHERE id = ?");

// Obtém os valores do formulário
$nome = $_POST['txtNome'];
$cpf = $_POST['txtCpf'];
$telefone = $_POST['txtTelefone'];
$email = $_POST['txtEmail'];
$endereco = $_POST['txtEndereco'];
$numero = $_POST['txtNumero'];
$complemento = $_POST['txtComplemento'];
$bairro = $_POST['txtBairro'];
$cep = $_POST['txtCep'];
$cidade = $_POST['txtCidade'];
$estado = $_POST['txtEstado'];
$id = $_POST['txtID']; // Supondo que você está passando o ID do cliente

// Associa os parâmetros à consulta
$stmt->bind_param("sssssssssssi", $nome, $cpf, $telefone, $email, $endereco, $numero, $complemento, $bairro, $cep, $cidade, $estado, $id);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cliente atualizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
