<html>
<!-- Modal de Agendamento -->
<div id="agendarModal" class="modal" style="display:none;">
    <div class="modal-content"></div>
    <form method="post" action="/projeto_final/office/agendar.php" enctype="multipart/form-data">
        <h2>Agendar Serviço</h2>
        <label for="data">Data:</label>
        <input type="text" id="data" name="data" readonly>

        <label for="hora_inicio">Hora de Início:</label>
        <input type="time" name="hora_inicio" required>

        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" required>
            <!-- Aqui você puxa os clientes do banco de dados -->
            <?php
            // Exemplo: obtenção de clientes do banco
            $clientes = mysqli_query($conexao, "SELECT id, nome FROM clientes");
            while ($cliente = mysqli_fetch_assoc($clientes)) {
                echo "<option value='".$cliente['id']."'>".$cliente['nome']."</option>";
            }
            ?>
        </select>

        <label for="pet_id">Pet:</label>
        <select name="pet_id" required>
            <!-- Aqui você puxa os pets cadastrados -->
            <?php
            // Exemplo: obtenção de pets do banco
            $pets = mysqli_query($conexao, "SELECT id, nome FROM pets");
            while ($pet = mysqli_fetch_assoc($pets)) {
                echo "<option value='".$pet['id']."'>".$pet['nome']."</option>";
            }
            ?>
        </select>

        <label for="foto_pet">Foto do Pet:</label>
        <input type="file" name="foto_pet" accept="image/*">

        <input type="submit" value="Agendar">
    </form>
</div>
</html>