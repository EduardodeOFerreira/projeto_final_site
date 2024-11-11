<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Prepara a consulta SQL para atualizar o lead
$stmt = $conexao->prepare("UPDATE lead SET 
                                lead_contatado = ? 
                            WHERE id = ?");

$lead_contatado = isset($_POST['lead_contatado']) ? 'Sim' : 'Não'; // checkbox: "Sim" para marcado, "Não" para desmarcado
$id = (int)$_POST['txtID']; // Obtém o ID do lead a ser atualizado

// Associa os parâmetros à consulta
$stmt->bind_param("si", 
    $lead_contatado, 
    $id
);

// Verifica se a consulta foi bem-sucedida
if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Lead atualizado com sucesso!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar lead: ' . $stmt->error]);
}

// Fecha a declaração e a conexão
$stmt->close();
$conexao->close();
?>
