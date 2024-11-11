<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Obtém o ID do lead a ser excluído de forma segura
$id = (int)$_POST['txtID'];

// Prepara a consulta SQL para excluir o lead
$sql = "DELETE FROM lead WHERE id = ?";

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
    echo json_encode(['status' => 'success', 'message' => 'Lead excluído com sucesso!']);
} else {
    // Mensagem de erro mais específica sobre dependências
    if ($conexao->errno == 1451) { // Código de erro específico para violação de chave estrangeira
        echo json_encode([
            'status' => 'error', 
            'message' => 'Erro ao excluir Lead. Este Lead está associado a outros registros. Por favor, remova as associações antes de excluir.'
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao excluir Lead: ' . $stmt->error]);
    }
}

// Fecha a consulta e a conexão
$stmt->close();
$conexao->close();
?>
