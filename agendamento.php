<?php
include 'header.php';
?>


<!DOCTYPE html>
<html lang="pt-BR">
    <div style="height: 12vh;"></div>
<head>
    <meta charset="UTF-8">
    <title>Solicite seu agendamento!</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

<div class="container my-5">
    <h1 class="text-center mb-4">Solicite seu agendamento!</h1>
    <form action="processa_lead.php" method="post" class="border p-4 rounded shadow-sm bg-light">
        <!-- Serviço -->
        <div class="mb-3">
            <label for="servico" class="form-label">Serviço:</label>
            <select name="servico" id="servico" class="form-select" required>
                <option value="Hospedagem">Hospedagem</option>
                <option value="Creche">Creche</option>
                <option value="PetSitter">PetSitter</option>
            </select>
        </div>

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control" maxlength="50" required>
        </div>

        <!-- Telefone -->
<div class="mb-3">
    <label for="telefone" class="form-label">Telefone:</label>
    <input type="text" name="telefone" id="telefone" class="form-control" required
           pattern="\(\d{2}\) \d{5}-\d{4}" title="Formato esperado: (XX) XXXXX-XXXX">
</div>

<script>
    // Mascara de telefone
    document.getElementById('telefone').addEventListener('input', function (e) {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,5})(\d{0,4})/);
        e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
    });
</script>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" maxlength="50" required>
        </div>

        <!-- Contato Preferido -->
        <div class="mb-3">
            <label for="contato_prefere" class="form-label">Contato Preferido:</label>
            <select name="contato_prefere" id="contato_prefere" class="form-select" required>
                <option value="email">Email</option>
                <option value="telefone">Telefone</option>
                <option value="whatsapp">WhatsApp</option>
            </select>
        </div>

        <!-- Horário Preferido -->
        <div class="mb-3">
            <label for="horario_prefere" class="form-label">Horário Preferido:</label>
            <select name="horario_prefere" id="horario_prefere" class="form-select" required>
                <option value="manha">Manhã</option>
                <option value="tarde">Tarde</option>
            </select>
        </div>

        <!-- Receber Novidades -->
        <div class="form-check mb-3">
            <input type="checkbox" name="receber_novidades" id="receber_novidades" value="1" class="form-check-input">
            <label for="receber_novidades" class="form-check-label">Receber Novidades</label>
        </div>

        <!-- Consentimento para Dados -->
        <div class="form-check mb-3">
            <input type="checkbox" name="consentimento_dados" id="consentimento_dados" value="1" class="form-check-input" required>
            <label for="consentimento_dados" class="form-check-label">
                Consentimento para o uso dos meus dados conforme os <a href="politica_privacidade.php" target="_blank">Termos de uso</a>
            </label>
        </div>

        <!-- Política de Privacidade (checkbox com link) -->
        <div class="form-check mb-3">
            <input type="checkbox" name="politica_privacidade" id="politica_privacidade" value="1" class="form-check-input" required>
            <label for="politica_privacidade" class="form-check-label">
                Eu li e aceito a <a href="politica_privacidade.php" target="_blank">Política de Privacidade</a>
            </label>
        </div>

        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>

<!-- Rodapé -->
<footer class="text-center py-3 mt-auto" style="background-color: #f0f001 !important;">
    <div class="container">
        <span class="text-dark fw-bold">
            © Tio Du Pet Service - 2024 | Todos os Direitos reservados.<br>
            Orgulhosamente desenvolvido com AMOR por © M.F.F Consultoria.
        </span>
    </div>
</footer>

<style>
    footer {
        background-color: #f0f001 !important;
        box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.2);
    }
    
    body {
        background-color: #ffd5d5; /* Cor de fundo rosa */
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
