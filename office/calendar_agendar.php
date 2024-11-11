<?php
include 'login_activity.php';
include 'office_header.php';

// Conexão ao banco de dados
include 'conexaoAction.php';

// Buscar os serviços disponíveis
$servico_result = $conexao->query("SELECT id, servico FROM servico");

// Buscar os pets com chaves estrangeiras para cliente e veterinário
$pet_result = $conexao->query("SELECT id, nome, cliente_id, veterinario_id, foto_pet FROM pet");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Agendar Evento</title>
</head>
<body>
<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">
        <h1 class="text-center mb-4 display-4">Agendar Novo Evento</h1>
        
        <form action="processar_agendamento.php" method="POST">

            <!-- Campo para seleção do serviço -->
            <div class="mb-3">
                <label for="servico" class="form-label">Serviço</label>
                <select class="form-select" id="servico" name="servico_id" required onchange="toggleHorario(this)">
                    <option selected disabled>Escolha o serviço</option>
                    <?php while ($servico = $servico_result->fetch_assoc()): ?>
                        <option value="<?= $servico['id'] ?>"><?= $servico['servico'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

             <!-- Campos para data e hora de início e término -->
             <div class="row mb-3" id="horarioCampos">
                <div class="col-md-6">
                    <label for="data_inicio" class="form-label">Data e Hora de Início</label>
                    <input type="datetime-local" class="form-control" id="data_inicio" name="data_inicio">
                </div>
                <div class="col-md-6">
                    <label for="data_fim" class="form-label">Data e Hora de Término</label>
                    <input type="datetime-local" class="form-control" id="data_fim" name="data_fim">
                </div>
            </div>




            <div class="container d-flex justify-content-center align-items-center mt-4">
    <!-- Coluna para os dados do pet, cliente e veterinário -->
    <div class="col-md-6">
        <!-- Seleção do pet -->
        <label for="pet" class="form-label">Pet</label>
        <select class="form-select" id="pet" name="pet_id" required onchange="fetchPetDetails(this.value)">
            <option selected disabled>Escolha o pet</option>
            <?php while ($pet = $pet_result->fetch_assoc()): ?>
                <option value="<?= $pet['id'] ?>"><?= $pet['nome'] ?></option>
            <?php endwhile; ?>
        </select>

        <!-- Campos automáticos para cliente e veterinário -->
        <div class="mt-3">
            <label for="cliente" class="form-label">Cliente</label>
            <input type="text" id="cliente" class="form-control" disabled>
        </div>
        <div class="mt-3">
            <label for="veterinario" class="form-label">Veterinário</label>
            <input type="text" id="veterinario" class="form-control" disabled>
        </div>
    </div>

    <!-- Coluna para exibir a imagem do pet centralizada -->
    <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100%;">
        <div id="petFotoContainer" class="text-center">
            <p class="text-muted">Sem foto disponível.</p>
        </div>
    </div>
</div>

            <!-- Campo para título -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título do Evento</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

           
            <!-- Campo para descrição -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <!-- Checkbox para dia completo, configurado automaticamente para hospedagem e creche -->
            <div class="form-check mb-3" id="diaCompletoCheckbox">
                <input type="checkbox" class="form-check-input" id="dia_completo" name="dia_completo">
                <label for="dia_completo" class="form-check-label">Evento de Dia Inteiro</label>
            </div>

            <!-- Botão de submissão -->
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-calendar-check"></i> Agendar Evento
            </button>
        </form>
    </div>

    <!-- Script para alternar a visibilidade dos campos de horário -->
    <script>

        function fetchPetDetails(petId) {
                    if (!petId) return;

                    fetch(`calendar_get_pets.php?pet_id=${petId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('cliente').value = data.nome_cliente;
                            document.getElementById('veterinario').value = data.nome_veterinario;

                            const petFotoContainer = document.getElementById('petFotoContainer');
                            if (data.foto_pet) {
                                petFotoContainer.innerHTML = `<img src="uploads/${data.foto_pet}" alt="Foto do Pet" class="img-fluid rounded w-50">`;
                            } else {
                                petFotoContainer.innerHTML = '<p class="text-muted">Sem foto disponível.</p>';
                            }
                        })
                        .catch(error => console.error('Erro ao buscar detalhes do pet:', error));
                }

                function toggleHorario(select) {
                    const horarioCampos = document.getElementById('horarioCampos');
                    const diaCompletoCheckbox = document.getElementById('diaCompletoCheckbox');
                    const diaCompleto = document.getElementById('dia_completo');
                    const dataInicio = document.getElementById('data_inicio');
                    const dataFim = document.getElementById('data_fim');

                    const servicoSelecionado = select.options[select.selectedIndex].text;

                    if (servicoSelecionado === 'Hospedagem' || servicoSelecionado === 'Creche') {
                        horarioCampos.style.display = 'flex';
                        dataInicio.type = 'date'; // Apenas data
                        dataFim.type = 'date';     // Apenas data
                        diaCompleto.checked = true;
                        diaCompleto.disabled = true;
                    } else if (servicoSelecionado === 'Pet Sitter') {
                        horarioCampos.style.display = 'flex';
                        dataInicio.type = 'datetime-local'; // Data e hora
                        dataFim.type = 'datetime-local';     // Data e hora
                        diaCompleto.checked = false;
                        diaCompleto.disabled = true;

                                // Atualiza automaticamente o horário de término quando o início é alterado
                                dataInicio.addEventListener('change', () => {
                                    const inicio = dataInicio.value;
                                    if (inicio) {
                                        const [hour, minute] = inicio.split(':').map(Number);
                                        const fim = new Date();
                                        fim.setHours(hour + 1, minute); // Adiciona 1 hora
                                        dataFim.value = fim.toTimeString().slice(0, 5); // Formata para "HH:MM"
                                        dataFim.disabled = true; // Impede edição manual
                                    }
                                });
                    }
                }







    </script>

</body>

</html>


