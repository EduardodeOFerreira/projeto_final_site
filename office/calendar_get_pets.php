<?php
include 'conexaoAction.php';
$pet_id = $_GET['pet_id'];
$stmt = $conexao->prepare("SELECT pet.foto_pet, cliente.nome AS nome_cliente, veterinario.nome AS nome_veterinario FROM pet 
                           JOIN cliente ON pet.cliente_id = cliente.id 
                           JOIN veterinario ON pet.veterinario_id = veterinario.id 
                           WHERE pet.id = ?");
$stmt->bind_param('i', $pet_id);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
echo json_encode($result);
?>
