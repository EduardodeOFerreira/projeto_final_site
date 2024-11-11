<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Obtém o ID do veterinário a ser excluído
$id = (int)$_POST['txtID'];

// Prepara a consulta SQL para excluir o veterinário
$sql = "DELETE FROM servico WHERE id = ?";
 
// Prepara a consulta
$stmt = $conexao->prepare($sql);

// Verifica se a preparação foi bem-sucedida
if (!$stmt) {
    die(json_encode(['status' => 'error', 'message' => 'Erro ao preparar a exclusão: ' . $conexao->error]));
}

// Associa o parâmetro ID à consulta
$stmt->bind_param("i", $id);

// Executa a consulta e verifica se foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Serviço excluído com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao excluir o serviço: ' . $stmt->error]);
}

// Fecha a conexão
$conexao->close();
?>
