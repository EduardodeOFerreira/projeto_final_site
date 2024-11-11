<?php
include 'login_activity.php';
include 'office_header.php';

// Conexão ao banco de dados
include 'conexaoAction.php';

// Verifica se o ID foi passado corretamente
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<div class='container'><p class='text-danger text-center'>ID do pet não foi passado corretamente.</p></div>";
    exit;
}

// Pega o ID do pet e escapa para evitar SQL Injection
$pet_id = intval($_GET['id']); // usa intval para converter para número inteiro

// Busca os dados do pet com inner join para obter o nome do cliente e do veterinário
$sql = "
    SELECT pet.*, cliente.nome AS nome_cliente, veterinario.nome AS nome_veterinario
    FROM pet
    INNER JOIN cliente ON pet.cliente_id = cliente.id
    INNER JOIN veterinario ON pet.veterinario_id = veterinario.id
    WHERE pet.id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param('i', $pet_id); // 'i' significa integer
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Pega os dados do pet
    $row = $resultado->fetch_assoc();
} else {
    echo "<div class='container'><p class='text-danger text-center'>Pet não encontrado.</p></div>";
    exit;
}



$stmt->close();

// Consultas adicionais
$sql_clientes = "SELECT id, nome FROM cliente";
$clientes_result = $conexao->query($sql_clientes);

$sql_veterinarios = "SELECT id, nome FROM veterinario";
$veterinarios_result = $conexao->query($sql_veterinarios);

?>


<head>
    <title>Atualizar Pet</title>
</head>
<body>

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Atualizar Pet - ID: <?php echo $pet_id; ?></h1>

        <!-- Exibe a imagem do pet -->
        <div class="text-center mb-3">
            <?php if (!empty($row['foto_pet'])): ?>
                <img src="uploads/<?php echo $row['foto_pet']; ?>" alt="Foto do Pet" class="img-fluid rounded w-50">
            <?php else: ?>
                <p class="text-muted">Sem foto disponível.</p>
            <?php endif; ?>
        </div>

        <form id="atualizarpetForm">
            <!-- Campo oculto ID -->
            <input name="txtID" type="hidden" value="<?php echo $pet_id; ?>">

            <!-- Nome e RGA -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Pet</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" value="<?php echo htmlspecialchars($row['nome']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="txtRga" class="form-label">RGA</label>
                    <input name="txtRga" id="txtRga" type="text" class="form-control" value="<?php echo htmlspecialchars($row['rga']); ?>">
                </div>
            </div>

            <!-- Sexo e Espécie -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtSexo" class="form-label">Sexo</label>
                    <input name="txtSexo" id="txtSexo" type="text" class="form-control" value="<?php echo htmlspecialchars($row['sexo']); ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtEspecie" class="form-label">Espécie</label>
                    <input name="txtEspecie" id="txtEspecie" type="text" class="form-control" value="<?php echo htmlspecialchars($row['especie']); ?>">
                </div>
            </div>

            <!-- Raça e Cor -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtRaca" class="form-label">Raça</label>
                    <input name="txtRaca" id="txtRaca" type="text" class="form-control" value="<?php echo htmlspecialchars($row['raca']); ?>">
                </div>
                <div class="col-md-6">
                    <label for="txtCor" class="form-label">Cor</label>
                    <input name="txtCor" id="txtCor" type="text" class="form-control" value="<?php echo htmlspecialchars($row['cor']); ?>">
                </div>
            </div>

            <!-- Idade e Porte -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input name="txtIdade" id="txtIdade" type="number" class="form-control" value="<?php echo htmlspecialchars($row['idade']); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="txtPorte" class="form-label">Porte</label>
                    <input name="txtPorte" id="txtPorte" type="text" class="form-control" value="<?php echo htmlspecialchars($row['porte']); ?>">
                </div>
            </div>

            <!-- Filtro de cliente -->
            <div class="row mb-1">
                <div class="col">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <select name="id_cliente" id="id_cliente" class="form-control">
                        <option value="" disabled <?php echo empty($row['cliente_id']) ? 'selected' : ''; ?>>Selecione um cliente</option>
                        <?php while ($cliente = $clientes_result->fetch_assoc()): ?>
                            <option value="<?php echo $cliente['id']; ?>" <?php echo ($cliente['id'] == $row['cliente_id']) ? 'selected' : ''; ?>>
                                <?php echo $cliente['nome']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Filtro de veterinário -->
                <div class="col">
                    <label for="id_veterinario" class="form-label">Veterinário</label>
                    <select name="id_veterinario" id="id_veterinario" class="form-control">
                        <option value="" disabled <?php echo empty($row['veterinario_id']) ? 'selected' : ''; ?>>Selecione um veterinário</option>
                        <?php while ($veterinario = $veterinarios_result->fetch_assoc()): ?>
                            <option value="<?php echo $veterinario['id']; ?>" <?php echo ($veterinario['id'] == $row['veterinario_id']) ? 'selected' : ''; ?>>
                                <?php echo $veterinario['nome']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <!-- Campo para atualizar a foto do pet -->
            <div class="mb-3">
                <label for="foto_pet" class="form-label">Atualizar Foto do Pet</label>
                <input type="file" name="foto_pet" id="foto_pet" class="form-control" accept="image/*">
            </div>


            <!-- Botões -->
            <div class="text-center">
                <a href="pet_listar.php" class="btn btn-warning w-100 mb-2">
                    <i class="fa fa-ban"></i> Cancelar Atualização
                </a>
                <button type="submit" name="btnAtualizar" class="btn btn-primary w-100">
                    <i class="fa fa-paw"></i> Atualizar
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
            <h5 class="modal-title" id="modalTitle">Atualizar Pet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Atualização do Pet realizada com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
          document.getElementById('atualizarpetForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('pet_atualizarAction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
                matriculaModal.show();
            })
            .catch(error => console.error('Erro:', error));
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