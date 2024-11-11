<?php
include 'login_activity.php';
include 'office_header.php';
include 'conexaoAction.php';

$id = $servico = $data_lead = $nome = $telefone = $email = $contato_prefere = "";
$horario_prefere = $receber_novidades = $consentimento_dados = $data_consentimento = "";
$politica_privacidade = $lead_contatado = "";

// Verificar se o ID do lead foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Preparar a consulta SQL para buscar os dados do lead
    $sql = "SELECT * FROM lead WHERE id = ?";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            // Verificar se foi encontrado um lead com o ID fornecido
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $servico = $row['servico'];
                $data_lead = substr($row['data_lead'], 0, 10);
                $nome = $row['nome'];
                $telefone = $row['telefone'];
                $email = $row['email'];
                $contato_prefere = ucfirst($row['contato_prefere']);
                $horario_prefere = $row['contato_prefere'] == 'manha' ? 'Manhã' : ucfirst($row['horario_prefere']);
                $receber_novidades = $row['receber_novidades'];
                $consentimento_dados = $row['consentimento_dados'];
                $data_consentimento = substr($row['data_consentimento'], 0, 10);
                $politica_privacidade = $row['politica_privacidade'];
                $lead_contatado = $row['lead_contatado'];
            }
        }

        $stmt->close();
    }
} else {
    header("Location: lead_listar.php");
    exit();
}
?>

<head>
    <title>Cancelar Lead</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cancelar Lead - ID: <?php echo $id; ?></h1>

        <form id="excluirLeadForm" method="POST">
            <input name="txtID" type="hidden" value="<?php echo $id; ?>">


                         <!-- Serviço Solicitado -->

            <div class="row mb-1">
                <div class="col-md-3">
                    <label for="serviceTypeInput" class="form-label">Serviço</label>
                    <input name="serviceTypeInput" id="serviceTypeInput" type="text" class="form-control" value="<?php echo htmlspecialchars($row['servico']); ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="data_lead" class="form-label">Data Cadastro:</label>
                    <input name="data_lead" id="data_lead" type="date" class="form-control" value="<?php echo htmlspecialchars($data_lead); ?>" disabled>
                </div>
                <div class="col-md-3">
                    <label for="receber_novidades" class="form-label">Receber novidades:</label>
                    <p id="receber_novidades" class="form-control" disabled>
                        <?php echo $row['receber_novidades'] ? 'Sim' : 'Não'; ?>
                    </p>
                </div>

                <div class="col-md-3">
                    <label for="consentimento_dados" class="form-label">Consentimento:</label>
                    <p id="consentimento_dados" class="form-control" disabled>
                        <?php echo $row['consentimento_dados'] ? 'Sim' : 'Não'; ?>
                    </p>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo htmlspecialchars($row['nome']); ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label for="contato" class="form-label">Horário Preferido:</label>
                    <input name="contato" id="contato" type="text" class="form-control" value="<?php echo htmlspecialchars($row['horario_prefere']); ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label for="contato_prefere" class="form-label">Contato Prefere</label>
                    <input name="contato_prefere" id="contato_prefere" type="text" class="form-control" value="<?php echo htmlspecialchars($row['contato_prefere']); ?>" disabled>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input name="telefone" id="telefone" type="text" class="form-control" value="<?php echo htmlspecialchars($row['telefone']); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" disabled>
                </div>
            </div>

            <div style="height: 2vh;"></div>

            <!-- Confirmar Cancelamento -->
            <div class="text-center">
                <a href="lead_listar.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Voltar
                </a>
                <button type="submit" name="btnExcluir" class="btn btn-danger w-100">
                    <i class="fa fa-trash"></i> Confirmar Exclusão
                </button>
            </div>
        </form>
    </div>
</div>

<?php
// Processar cancelamento do lead
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnCancelar'])) {
    $id = $_POST['txtID'];

    // Deletar o lead do banco de dados
    $sql = "DELETE FROM lead WHERE id = ?";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: lead_listar.php");
            exit();
        }

        $stmt->close();
    }
}

?>



 <!-- Modal -->
 <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Exclusão Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Lead excluído com sucesso!</p>
            </div>
            <div class="modal-footer">
                <button id="closeButton" class="btn btn-primary">
                <i class="fa fa-times"></i> Fechar
                </button>
            </div>
            </div>
        </div>
        </div>


        <script>
            document.getElementById('excluirLeadForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('lead_excluirAction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
            document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
            document.getElementById('modalMessage').innerText = data.message;

            var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
            matriculaModal.show();

            // Após o fechamento do modal, redirecionar para listar_veterinario.php
            document.getElementById('closeButton').addEventListener('click', function() {
                window.location.href = 'lead_listar.php';
            });
            })
            .catch(error => {
            console.error('Erro:', error);

            // Exibir o modal com mensagem de erro
            document.getElementById('modalTitle').innerText = 'Erro';
            document.getElementById('modalMessage').innerText = 'Erro ao excluir o Lead. O lead que você está tentando excluir está associado a eventos existentes. Para excluir, por favor, cancele ou remova os eventos relacionados primeiro.';

            var errorModal = new bootstrap.Modal(document.getElementById('successModal'));
            errorModal.show();
            });
        };
        </script>

</body>

<?php
// Fecha a conexão
if (isset($conexao)) {
    $conexao->close();
}

?>
</html>
<?php
include 'footer.php';
?>