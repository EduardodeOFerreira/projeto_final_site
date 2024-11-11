<?php
// Conexão ao banco de dados
include 'conexaoAction.php';
 
// Coletar dados do Veterinário
$nome = $_POST['veterinarioNome'];
$telefone = $_POST['veterinarioTelefone'];
$email = $_POST['veterinarioEmail'];
$endereco = $_POST['veterinarioEndereco'];
$numero = $_POST['veterinarioNumero'];
$complemento = $_POST['veterinarioComplemento'];
$bairro = $_POST['veterinarioBairro'];
$cep = $_POST['veterinarioCep'];
$cidade = $_POST['veterinarioCidade'];
$estado = $_POST['veterinarioEstado'];

// Inserir o novo cliente no banco de dados
$sql = "INSERT INTO veterinario (nome, telefone, email, endereco, numero, complemento, bairro, cep, cidade, estado)
        VALUES ('$nome', '$telefone', '$email', '$endereco', '$numero', '$complemento', '$bairro', '$cep', '$cidade', '$estado')";

if ($conexao->query($sql) === TRUE) {
    $novoClienteId = $conexao->insert_id;
    $response = ['id_veterinario' => $novoClienteId, 'nome' => $nome];
    echo json_encode($response);
} else {
    echo json_encode(['error' => 'Erro ao cadastrar veterinário: ' . $conexao->error]);
}

// Fecha a conexão
$conexao->close();
?>