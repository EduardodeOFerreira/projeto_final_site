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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
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

        .table-container {
            display: flex;
            justify-content: center; /* Centraliza horizontalmente */
            margin-top: 20px;
        }

        table {
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
            width: 80%; /* Define a largura da tabela */
        }
    </style>
</head>
</html>

<?php
// Conectar ao banco de dados
require_once("conexaoAction.php");

// Inicializa as variáveis de filtro
$filtro_cliente = isset($_GET['cliente_id']) ? $_GET['cliente_id'] : '';
$filtro_pet = isset($_GET['pet_id']) ? $_GET['pet_id'] : '';
$filtro_data = isset($_GET['data']) ? $_GET['data'] : '';

// Montar a query com possíveis filtros
$sql = "SELECT agendamento.*, cliente.nome AS nome_cliente, pet.nome AS nome_pet, veterinario.nome AS nome_veterinario, servico.tipo AS tipo_servico 
        FROM agendamento
        JOIN cliente ON agendamento.cliente_id = cliente.id
        JOIN pet ON agendamento.pet_id = pet.id
        LEFT JOIN veterinario ON agendamento.veterinario_id = veterinario.id
        JOIN servico ON agendamento.servico_id = servico.id
        WHERE 1=1";

if (!empty($filtro_cliente)) {
    $sql .= " AND cliente.id = $filtro_cliente";
}
if (!empty($filtro_pet)) {
    $sql .= " AND pet.id = $filtro_pet";
}
if (!empty($filtro_data)) {
    $sql .= " AND agendamento.data = '$filtro_data'";
}

// Executar a consulta com os filtros aplicados
$resultado = $conexao->query($sql);

// Obter a lista de clientes e pets para os filtros
$sql_clientes = "SELECT id, nome FROM cliente";
$clientes = $conexao->query($sql_clientes);

$sql_pets = "SELECT id, nome FROM pet";
$pets = $conexao->query($sql_pets);

// Verificar se um agendamento foi cancelado
if (isset($_GET['cancelar_id'])) {
    $cancelar_id = $_GET['cancelar_id'];
    $sql_cancelar = "DELETE FROM agendamento WHERE id = $cancelar_id";
    if ($conexao->query($sql_cancelar) === TRUE) {
        echo "Agendamento cancelado com sucesso!";
    } else {
        echo "Erro ao cancelar o agendamento: " . $conn->error;
    }
}

// Verificar se um agendamento foi atualizado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $data = $_POST['data'];
    $hora_inicio = $_POST['hora_inicio'];
    $hora_fim = $_POST['hora_fim'];
    $status = $_POST['status'];

    $sql_atualizar = "UPDATE agendamento SET data = '$data', hora_inicio = '$hora_inicio', hora_fim = '$hora_fim', status = '$status' WHERE id = $update_id";
    if ($conn->query($sql_atualizar) === TRUE) {
        echo "Agendamento atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o agendamento: " . $conn->error;
    }
}
?>

<head>
    <title>Consulta de Agendamentos</title>
</head>
<body>

<h2>Consulta de Agendamentos</h2>

<!-- Formulário de filtros -->
<form method="GET" action="calendar_consulta_agenda.php">
    <br><label for="cliente_id">Cliente:</label></br>
    <select name="cliente_id">
        <option value="">Todos</option>
        <?php
        while ($cliente = $clientes->fetch_assoc()) {
            $selected = ($cliente['id'] == $filtro_cliente) ? 'selected' : '';
            echo "<option value='".$cliente['id']."' $selected>".$cliente['nome']."</option>";
        }
        ?>
    </select>

    <br><label for="pet_id">Pet:</label></br>
     <select name="pet_id">
        <option value="">Todos</option>
        <?php
        while ($pet = $pets->fetch_assoc()) {
            $selected = ($pet['id'] == $filtro_pet) ? 'selected' : '';
            echo "<option value='".$pet['id']."' $selected>".$pet['nome']."</option>";
        }
        ?>
    </select>
    <br><label for="data">Data:</label></br>
      <input type="date" name="data" value="<?= $filtro_data ?>">
    <br></br>
      <input type="submit" value="Filtrar">
</form>
<br><a href='http://localhost/projeto_final/office/main.php'><button>Voltar para a Página Principal</button></a></br>
<br></br>
<!-- Tabela de agendamentos -->
<div class="container-table">
<table class="table table-bordered table-bg mx-auto text-white">
    <thead>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Hora Início</th>
            <th>Hora Fim</th>
            <th>Cliente</th>
            <th>Pet</th>
            <th>Serviço</th>
            <th>Veterinário</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['data']."</td>";
                echo "<td>".$row['hora_inicio']."</td>";
                echo "<td>".$row['hora_fim']."</td>";
                echo "<td>".$row['nome_cliente']."</td>";
                echo "<td>".$row['nome_pet']."</td>";
                echo "<td>".$row['tipo_servico']."</td>";
                echo "<td>".$row['nome_veterinario']."</td>";
                echo "<td>".$row['status']."</td>";
                echo '<td>
                        <a href="/projeto_final/calendar_cancelar_agenda.php?cancelar_id=' . $row['id'] . '">Cancelar</a>
                        <a href="/projeto_final/calendar_atualizar_agenda.php?id=' . $row['id'] . '">Atualizar</a>
                    </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='10'>Nenhum agendamento encontrado</td></tr>";  
        }  
        ?>
    </tbody>
</table>

</body>
</html>

<br>
<?php
include 'footer.php';
?>