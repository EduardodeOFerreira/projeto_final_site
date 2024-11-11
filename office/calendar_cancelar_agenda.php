<?php
require_once("conexaoAction.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Deletar o agendamento
    $sql = "DELETE FROM agendamento WHERE id = '$id'";

    if ($conexao->query($sql) === TRUE) {
        echo "Agendamento cancelado com sucesso!";
        header("Location: consulta_agenda.php"); // Redirecionar de volta à consulta
        exit;
    } else {
        echo "Erro ao cancelar agendamento: " . $conexao->error;
    }
}
?>