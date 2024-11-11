<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
 
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }
    </style>
</head>
</html>

<?php
// Conectar ao banco de dados
require_once("conexaoAction.php");

if (isset($_GET['id'])) {
    $agendamento_id = $_GET['id'];

    // Obter os dados do agendamento atual
    $sql = "SELECT * FROM agendamento WHERE id = $agendamento_id";
    $result = $conexao->query($sql);
    $agendamento = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST['data'];
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fim = $_POST['hora_fim'];
        $status = $_POST['status'];

        // Atualizar os dados no banco de dados
        $sql_atualizar = "UPDATE agendamento SET data = '$data', hora_inicio = '$hora_inicio', hora_fim = '$hora_fim', status = '$status' WHERE id = $agendamento_id";
        if ($conexao->query($sql_atualizar) === TRUE) {
            echo "Agendamento atualizado com sucesso!";
            header("Location: /projeto_final/office/consulta_agenda.php");
            exit;
        } else {
            echo "Erro ao atualizar o agendamento: " . $conexao->error;
        }
    }
}
?>
<br></br>
<h2>Atualizar Agendamento</h2>
<form method="post">
    <br></br>
    <label for="data">Data:</label>
    <input type="date" name="data" value="<?= $agendamento['data'] ?>" required>
    <br></br>
    <label for="hora_inicio">Hora de Início:</label>
    <input type="time" name="hora_inicio" value="<?= $agendamento['hora_inicio'] ?>" required>
    <br></br>
    <label for="hora_fim">Hora de Término:</label>
    <input type="time" name="hora_fim" value="<?= $agendamento['hora_fim'] ?>" required>
    <br></br>
    <label for="status">Status:</label>
    <input type="text" name="status" value="<?= $agendamento['status'] ?>" required>
    <br></br>
    <input type="submit" value="Atualizar">
</form>
<br></br>
<?php
include 'footer.php';
?>