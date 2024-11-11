<?php
include 'conexaoAction.php'; // Inclua sua conexão com o banco de dados

// Verifica se foi enviada uma ação e o ID da avaliação
if (isset($_POST['action']) && isset($_POST['avaliacao_id'])) {
    $avaliacao_id = $_POST['avaliacao_id'];

    // Verifica se a ação é para excluir de aprovadas ou recusadas
    if ($_POST['action'] == 'excluir_aprovada') {
        // Excluir da tabela `avaliacao_aprovadas`
        $query_excluir = "DELETE FROM avaliacao_aprovadas WHERE id = $avaliacao_id";
        mysqli_query($conexao, $query_excluir);
    } elseif ($_POST['action'] == 'excluir_recusada') {
        // Excluir da tabela `avaliacao_recusadas`
        $query_excluir = "DELETE FROM avaliacao_recusadas WHERE id = $avaliacao_id";
        mysqli_query($conexao, $query_excluir);
    }
}

// Redireciona de volta para a página de avaliações
header('Location: avaliacao_listar.php');
?>
