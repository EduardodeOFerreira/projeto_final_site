<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Prepara a consulta SQL para inserir o novo serviço
$stmt = $conexao->prepare("INSERT INTO servico (servico, tipo, preco) VALUES (?, ?, ?)");

// Obtém os valores do formulário
$servico = $_POST['txtServico'];
$tipo = $_POST['txtTipo'];
$preco = (float)$_POST['txtPreco']; // Converte o preço para float
 
// Verifica se os dados foram recebidos corretamente
if (empty($servico) || empty($tipo) || empty($preco)) {
    echo json_encode(['status' => 'error', 'message' => 'Todos os campos são obrigatórios!']);
    exit;
}

// Associa os parâmetros à consulta
$stmt->bind_param("ssd", $servico, $tipo, $preco); // "ssd" indica: string, string, double

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Cadastro de Serviço realizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao inserir dados: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
