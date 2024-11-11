<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Atualiza os dados do pet no banco de dados
$sql = "UPDATE pet SET 
            cliente_id = '" . $_POST['id_cliente'] . "',
            veterinario_id = '" . $_POST['id_veterinario'] . "',
            nome = '" . $_POST['txtNome'] . "',
            sexo = '" . $_POST['txtSexo'] . "',
            especie = '" . $_POST['txtEspecie'] . "',
            raca = '" . $_POST['txtRaca'] . "',
            cor = '" . $_POST['txtCor'] . "',
            idade = '" . $_POST['txtIdade'] . "',
            porte = '" . $_POST['txtPorte'] . "',
            rga = '" . $_POST['txtRga'] . "' 
        WHERE id = " . $_POST['txtID'] . ";";

if ($conexao->query($sql) === TRUE) {
    // Resposta de sucesso
    $response = ['status' => 'success', 'message' => 'Pet atualizado com sucesso!'];
} else {
    // Resposta de erro ao atualizar pet
    $response = ['status' => 'error', 'message' => 'Erro ao atualizar o pet: ' . $conexao->error];
}

// Verifica se um novo arquivo de imagem foi enviado
if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
    $target_dir = "uploads/";
    $pet_id = $_POST['txtID'];
    $extensao = strtolower(pathinfo($_FILES['foto_pet']['name'], PATHINFO_EXTENSION));
    $novo_nome_foto = "pet_" . $pet_id . "." . $extensao;
    $target_file = $target_dir . $novo_nome_foto;
 
    // Verifica se o arquivo é uma imagem válida
    $check = getimagesize($_FILES["foto_pet"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["foto_pet"]["tmp_name"], $target_file)) {
            // Atualiza o nome do arquivo no banco de dados
            $sql_foto = "UPDATE pet SET foto_pet = '" . $novo_nome_foto . "' WHERE id = " . $pet_id;
            if ($conexao->query($sql_foto) === TRUE) {
                $response['message'] .= ' Foto do pet atualizada com sucesso!';
            } else {
                $response = ['status' => 'error', 'message' => 'Erro ao atualizar a foto no banco de dados: ' . $conexao->error];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'Erro ao mover o arquivo para o diretório de uploads.'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Arquivo enviado não é uma imagem válida.'];
    }
}

echo json_encode($response);
$conexao->close();
?>
