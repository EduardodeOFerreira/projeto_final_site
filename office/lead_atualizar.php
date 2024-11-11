<?php
include 'login_activity.php';
include 'office_header.php';
include 'conexaoAction.php'; // Arquivo de conexão com o banco de dados

// Inicializar variáveis com valores vazios
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
                
                // Deixar a primeira letra do contato preferido em maiúscula
                $contato_prefere = ucfirst($row['contato_prefere']);
                
                // Se horário preferido for "manha", transformar para "Manhã"
                $horario_prefere = $row['horario_prefere'] == 'manha' ? 'Manhã' : ucfirst($row['horario_prefere']);
                
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
    header("Location: lead_listar.php"); // Redireciona se o ID não for fornecido
    exit();
}
?>

<head>

    <title>Atualizar Lead</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Lead - ID: <?php echo htmlspecialchars($id); ?></h1>

        <form id="atualizarleadForm" method="POST">

            <input name="txtID" type="hidden" value="<?php echo htmlspecialchars($id); ?>">

            <!-- Serviço Solicitado -->

            <div class="row mb-1">
                <div class="col-md-3">
                    <label for="serviceTypeInput" class="form-label">Serviço</label>
                    <input name="serviceTypeInput" id="serviceTypeInput" type="text" class="form-control" value="<?php echo htmlspecialchars($row['servico']); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="data_lead" class="form-label">Data Cadastro:</label>
                    <input name="data_lead" id="data_lead" type="date" class="form-control" value="<?php echo htmlspecialchars($data_lead); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="receber_novidades" class="form-label">Receber novidades:</label>
                    <p id="receber_novidades" class="form-control" readonly>
                        <?php echo $row['receber_novidades'] ? 'Sim' : 'Não'; ?>
                    </p>
                </div>

                <div class="col-md-3">
                    <label for="consentimento_dados" class="form-label">Consentimento:</label>
                    <p id="consentimento_dados" class="form-control" readonly>
                        <?php echo $row['consentimento_dados'] ? 'Sim' : 'Não'; ?>
                    </p>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4">
                    <label for="txtNome" class="form-label">Nome</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo htmlspecialchars($row['nome']); ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="contato" class="form-label">Horário Preferido:</label>
                    <input name="contato" id="contato" type="text" class="form-control" value="<?php echo htmlspecialchars($row['horario_prefere']); ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label for="contato_prefere" class="form-label">Contato Prefere</label>
                    <input name="contato_prefere" id="contato_prefere" type="text" class="form-control" value="<?php echo htmlspecialchars($row['contato_prefere']); ?>" readonly>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input name="telefone" id="telefone" type="text" class="form-control" value="<?php echo htmlspecialchars($row['telefone']); ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" readonly>
                </div>
            </div>

            <div style="height: 2vh;"></div>

            <div class="row mb-1">
                <!-- Política de Privacidade -->
                <div class="col-md-6">
                        <label for="politica_privacidade" class="form-label">Aceitou a Política de Privacidade?:</label>
                        <p id="politica_privacidade" class="form-control" readonly>
                            <?php echo $row['politica_privacidade'] ? 'Sim' : 'Não'; ?>
                        </p>
                    </div>
                <!-- Data do Consentimento -->
                <div class="col-md-6">
                    <label for="data_consentimento" class="form-label">Data do Consentimento</label>
                    <p id="data_consentimento" class="form-control"  type="date" readonly>
                            <?php echo $row['data_consentimento']; ?>
                        </p>
                </div>
            </div>


            <!-- Lead Contatado -->
            <div class="form-content mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="lead_contatado" id="lead_contatado" <?php echo $lead_contatado == 'Sim' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="lead_contatado">Lead Contatado?</label>
            </div>

            <!-- Botões -->
            <div class="text-center">
                <a href="lead_listar.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-user"></i> Atualizar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Atualizar Lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Lead atualizado com sucesso!</p>
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
            document.getElementById('atualizarleadForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('lead_atualizarAction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
            document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';

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

            var errorModal = new bootstrap.Modal(document.getElementById('successModal'));
            errorModal.show();
            });
        };
        </script>

</body>
</html>
<?php
include 'footer.php';
?>