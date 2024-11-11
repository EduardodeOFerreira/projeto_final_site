<?php
include 'conexaoAction.php'; // Inclua sua conexão com o banco de dados

// Verifica se foi enviada uma ação e o ID da avaliação
if (isset($_POST['action']) && isset($_POST['avaliacao_id'])) {
    $avaliacao_id = $_POST['avaliacao_id'];

    // Verifica qual foi a ação: aprovar ou recusar
    if ($_POST['action'] == 'aprovar') {
        // Inserir a avaliação na tabela `avaliacao_aprovadas`
        $query_aprovar = "INSERT INTO avaliacao_aprovadas (id, nome_avaliador, estrelas, descricao)
                          SELECT id, nome_avaliador, estrelas, descricao FROM avaliacao_solicitadas WHERE id = $avaliacao_id";
        if (mysqli_query($conexao, $query_aprovar)) {
            // Remover da tabela `avaliacao_solicitadas`
            $query_remover = "DELETE FROM avaliacao_solicitadas WHERE id = $avaliacao_id";
            mysqli_query($conexao, $query_remover);
        }
    } elseif ($_POST['action'] == 'recusar') {
        // Inserir a avaliação na tabela `avaliacao_recusadas`
        $query_recusar = "INSERT INTO avaliacao_recusadas (id, nome_avaliador, estrelas, descricao)
                          SELECT id, nome_avaliador, estrelas, descricao FROM avaliacao_solicitadas WHERE id = $avaliacao_id";
        if (mysqli_query($conexao, $query_recusar)) {
            // Remover da tabela `avaliacao_solicitadas`
            $query_remover = "DELETE FROM avaliacao_solicitadas WHERE id = $avaliacao_id";
            mysqli_query($conexao, $query_remover);
        }
    }
}

// Redireciona de volta para a página de avaliações pendentes
header('Location: avaliacao_listar.php');
?>
