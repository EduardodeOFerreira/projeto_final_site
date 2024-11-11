<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
	<title>Cadastro Cliente</title>
</head>

<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Cadastro de Cliente</h1>
        <form id="cadastroclienteForm">

            <!-- Campo oculto ID -->
            <input name="txtID" id="txtID" type="text" hidden>

            <!-- Nome e CPF -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtNome" class="form-label">Nome do Cliente</label>
                    <input name="txtNome" id="txtNome" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtCpf" class="form-label">CPF</label>
                    <input name="txtCpf" id="txtCpf" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Telefone e Email -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtTelefone" class="form-label">Telefone</label>
                    <input name="txtTelefone" id="txtTelefone" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input name="txtEmail" id="txtEmail" type="email" class="form-control" required>
                </div>
            </div>

            <!-- Endereço, Número e Complemento -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtEndereco" class="form-label">Endereço</label>
                    <input name="txtEndereco" id="txtEndereco" type="text" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="txtNumero" class="form-label">Número</label>
                    <input name="txtNumero" id="txtNumero" type="number" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="txtComplemento" class="form-label">Complemento</label>
                    <input name="txtComplemento" id="txtComplemento" type="text" class="form-control">
                </div>
            </div>

            <!-- Bairro e CEP -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtBairro" class="form-label">Bairro</label>
                    <input name="txtBairro" id="txtBairro" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtCep" class="form-label">CEP</label>
                    <input name="txtCep" id="txtCep" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Cidade e Estado -->
            <div class="row mb-1">
                <div class="col-md-6">
                    <label for="txtCidade" class="form-label">Cidade</label>
                    <input name="txtCidade" id="txtCidade" type="text" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="txtEstado" class="form-label">Estado</label>
                    <input name="txtEstado" id="txtEstado" type="text" class="form-control" required>
                </div>
            </div>

            <!-- Botão de Enviar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fa fa-user-plus"></i> Adicionar
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
            <h5 class="modal-title" id="modalTitle">Cadastro Cliente</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p id="modalMessage">Cadastro de Cliente realizado com sucesso!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script>
          document.getElementById('cadastroclienteForm').onsubmit = function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch('cliente_cadastroAction.php', {
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
            .catch(error => console.error('Erro:', error));
        };
    </script>

</body>

<?php
include 'footer.php';
?>