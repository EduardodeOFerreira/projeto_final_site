<?php
// Conexão ao banco de dados
include 'conexaoAction.php';
 
// Prepara a consulta SQL para atualizar o veterinário
$stmt = $conexao->prepare("UPDATE veterinario SET nome = ?, telefone = ?, email = ?, endereco = ?, numero = ?, complemento = ?, bairro = ?, cep = ?, cidade = ?, estado = ? WHERE id = ?");

// Obtém os valores do formulário
$id = (int)$_POST['txtID']; // ID do veterinário a ser atualizado
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
$stmt->bind_param("ssssssssssi", $nome, $telefone, $email, $endereco, $numero, $complemento, $bairro, $cep, $cidade, $estado, $id);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Atualização de Veterinário realizada com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
