<?php
include 'login_activity.php';
include 'office_header.php';
?>


<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Buscar clientes
$clientes_result = $conexao->query("SELECT id, nome FROM cliente");

// Buscar veterinários
$veterinarios_result = $conexao->query("SELECT id, nome FROM veterinario");
?>

<head>
    <title>Cadastro de Pet</title>
</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Pet</h1>
        <form id="cadastropetForm">

            <!-- Campo oculto ID -->
            <input name="txtID" id="txtID" type="text" hidden>

            <div class="row mb-3">
                <div class="col">
                    <label for="txtNome" class="form-label">Nome do Pet</label>
                    <input type="text" class="form-control" id="txtNome" name="txtNome" required>
                </div>
                <div class="col">
                    <label for="txtSexo" class="form-label">Sexo</label>
                    <select class="form-control" id="txtSexo" name="txtSexo" required>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="txtEspecie" class="form-label">Espécie</label>
                    <input type="text" class="form-control" id="txtEspecie" name="txtEspecie" required>
                </div>
                <div class="col">
                    <label for="txtRaca" class="form-label">Raça</label>
                    <input type="text" class="form-control" id="txtRaca" name="txtRaca" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="txtCor" class="form-label">Cor</label>
                    <input type="text" class="form-control" id="txtCor" name="txtCor" required>
                </div>
                <div class="col">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input type="number" class="form-control" id="txtIdade" name="txtIdade" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="txtPorte" class="form-label">Porte</label>
                    <select class="form-control" id="txtPorte" name="txtPorte" required>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>
                <div class="col">
                    <label for="txtRga" class="form-label">RGA</label>
                    <input type="text" class="form-control" id="txtRga" name="txtRga">
                </div>
            </div>

            <!-- Filtro de cliente com autocomplete -->
            <div class="row mb-3">
                <div class="col">
                    <label for="id_cliente" class="form-label">Cliente</label>
                    <select class="form-control" id="id_cliente" name="id_cliente" required>
                        <option value="">Selecione o Cliente</option>
                        <?php while($cliente = $clientes_result->fetch_assoc()): ?>
                            <option value="<?= $cliente['id']; ?>"><?= $cliente['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCliente">
                        Adicionar Cliente
                    </button>
                </div>
            </div>

            <!-- Filtro de veterinário com autocomplete -->
            <div class="row mb-3">
                <div class="col">
                    <label for="id_veterinario" class="form-label">Veterinário</label>
                    <select class="form-control" id="id_veterinario" name="id_veterinario" required>
                        <option value="">Selecione o Veterinário</option>
                        <?php while($veterinario = $veterinarios_result->fetch_assoc()): ?>
                            <option value="<?= $veterinario['id']; ?>"><?= $veterinario['nome']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalVeterinario">
                        Adicionar Veterinário
                    </button>
                </div>
            </div>

            
            <div class="mb-3">
                <label for="foto_pet" class="form-label">Foto do Pet</label>
                <input type="file" class="form-control" id="foto_pet" name="foto_pet" required>
            </div>

            

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-paw"></i> Adicionar
                </button>
            </div>
        </form>
    </div>
</div>

 <!-- Modal para adicionar Cliente -->
<div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalClienteLabel">Adicionar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="cadastroclienteForm" action="pet_adicionarClienteAction.php" method="POST">
                <div class="modal-body">
                    <!-- Campo oculto ID -->
                    <input name="clienteID" id="clienteID" type="text" hidden>

                    <!-- Nome e CPF -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="clienteNome" class="form-label">Nome do Cliente</label>
                            <input name="clienteNome" id="clienteNome" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="clienteCpf" class="form-label">CPF</label>
                            <input name="clienteCpf" id="clienteCpf" type="text" class="form-control" required>
                        </div>
                    </div>

                    <!-- Telefone e Email -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="clienteTelefone" class="form-label">Telefone</label>
                            <input name="clienteTelefone" id="clienteTelefone" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="clienteEmail" class="form-label">Email</label>
                            <input name="clienteEmail" id="clienteEmail" type="email" class="form-control" required>
                        </div>
                    </div>

                    <!-- Endereço, Número e Complemento -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="clienteEndereco" class="form-label">Endereço</label>
                            <input name="clienteEndereco" id="clienteEndereco" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="clienteNumero" class="form-label">Número</label>
                            <input name="clienteNumero" id="clienteNumero" type="number" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="clienteComplemento" class="form-label">Complemento</label>
                            <input name="clienteComplemento" id="clienteComplemento" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Bairro e CEP -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="clienteBairro" class="form-label">Bairro</label>
                            <input name="clienteBairro" id="clienteBairro" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="clienteCep" class="form-label">CEP</label>
                            <input name="clienteCep" id="clienteCep" type="text" class="form-control" required>
                        </div>
                    </div>

                    <!-- Cidade e Estado -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="clienteCidade" class="form-label">Cidade</label>
                            <input name="clienteCidade" id="clienteCidade" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="clienteEstado" class="form-label">Estado</label>
                            <input name="clienteEstado" id="clienteEstado" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Modal para adicionar Veterinário -->
 <div class="modal fade" id="modalVeterinario" tabindex="-1" aria-labelledby="modalVeterinarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVeterinarioLabel">Adicionar Veterinário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="cadastroveterinarioForm" action="pet_adicionarVeterinarioAction.php" method="POST">
                <div class="modal-body">
                    <!-- Campo oculto ID -->
                    <input name="veterinarioID" id="veterinarioID" type="text" hidden>

                    <!-- Nome -->
                    <div class="row mb-1">
                        <div class="col-md-15">
                            <label for="veterinarioNome" class="form-label">Nome do Veterinário</label>
                            <input name="veterinarioNome" id="veterinarioNome" type="text" class="form-control" required>
                        </div>
                    </div>

                    <!-- Telefone e Email -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="veterinarioTelefone" class="form-label">Telefone</label>
                            <input name="veterinarioTelefone" id="veterinarioTelefone" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="veterinarioEmail" class="form-label">Email</label>
                            <input name="veterinarioEmail" id="veterinarioEmail" type="email" class="form-control" required>
                        </div>
                    </div>

                    <!-- Endereço, Número e Complemento -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="veterinarioEndereco" class="form-label">Endereço</label>
                            <input name="veterinarioEndereco" id="veterinarioEndereco" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="veterinarioNumero" class="form-label">Número</label>
                            <input name="veterinarioNumero" id="veterinarioNumero" type="number" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="veterinarioComplemento" class="form-label">Complemento</label>
                            <input name="veterinarioComplemento" id="veterinarioComplemento" type="text" class="form-control">
                        </div>
                    </div>

                    <!-- Bairro e CEP -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="veterinarioBairro" class="form-label">Bairro</label>
                            <input name="veterinarioBairro" id="veterinarioBairro" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="veterinarioCep" class="form-label">CEP</label>
                            <input name="veterinarioCep" id="veterinarioCep" type="text" class="form-control" required>
                        </div>
                    </div>

                    <!-- Cidade e Estado -->
                    <div class="row mb-1">
                        <div class="col-md-6">
                            <label for="veterinarioCidade" class="form-label">Cidade</label>
                            <input name="veterinarioCidade" id="veterinarioCidade" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="veterinarioEstado" class="form-label">Estado</label>
                            <input name="veterinarioEstado" id="veterinarioEstado" type="text" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Alerta -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Cadastro Pet</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Cadastro de Pet realizado com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>



    <script>
    document.getElementById('cadastroclienteForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Previne o envio tradicional do formulário

        var formData = new FormData(this);

        fetch('pet_adicionarClienteAction.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.id_cliente) {
                // Adicionar o novo cliente à lista de cliente
                var selectCliente = document.getElementById('id_cliente');
                var newOption = document.createElement('option');
                newOption.value = data.id_cliente;
                newOption.text = data.nome;
                newOption.selected = true; // Seleciona automaticamente o novo cliente
                selectCliente.appendChild(newOption);

                // Fechar o modal corretamente
                var modalCliente = bootstrap.Modal.getInstance(document.getElementById('modalCliente'));
                modalCliente.hide();

            } else {
                alert(data.error || 'Erro JS 1 ao cadastrar cliente.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro, CPF já cadastrado.');
        });
    });
</script>


<script>
    document.getElementById('cadastroveterinarioForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Previne o envio tradicional do formulário

        var formData = new FormData(this);

        fetch('pet_adicionarVeterinarioAction.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.id_veterinario) {
                // Adicionar o novo cliente à lista de veterinário
                var selectVeterinario = document.getElementById('id_veterinario');
                var newOption = document.createElement('option');
                newOption.value = data.id_veterinario;
                newOption.text = data.nome;
                newOption.selected = true; // Seleciona automaticamente o novo veterinário
                selectVeterinario.appendChild(newOption);

                // Fechar o modal corretamente
                var modalCliente = bootstrap.Modal.getInstance(document.getElementById('modalVeterinario'));
                modalCliente.hide();

            } else {
                alert(data.error || 'Erro JS 1 ao cadastrar veterinário.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Ocorreu um erro JS2 ao cadastrar o veterinário.');
        });
    });
</script>

<script>
          document.getElementById('cadastropetForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('pet_cadastroAction.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modalTitle').innerText = data.status === 'success' ? 'Sucesso' : 'Erro';
                document.getElementById('modalMessage').innerText = data.message;

                 // Limpa os campos do formulário após o envio
                if (data.status === 'success') {
                    this.reset(); // Reseta todos os campos do formulário
                }

                var matriculaModal = new bootstrap.Modal(document.getElementById('successModal'));
                matriculaModal.show();
            })
            .catch(error => console.error('Erro: JS cadastropetForm', error));
        };
    </script>

</body>
</html>

<?php
// Fechar a conexão
$conexao->close();
?>

<?php
include 'footer.php';
?>