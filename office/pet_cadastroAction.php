<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

// Recebendo os dados do formulário
$cliente_id = $_POST['id_cliente'];
$veterinario_id = $_POST['id_veterinario'];
$nome = $_POST['txtNome'];
$sexo = $_POST['txtSexo'];
$especie = $_POST['txtEspecie'];
$raca = $_POST['txtRaca'];
$cor = $_POST['txtCor'];
$idade = $_POST['txtIdade'];
$porte = $_POST['txtPorte'];
$rga = $_POST['txtRga'];

// Inserir dados no banco sem a foto (inicialmente)
$sql = "INSERT INTO pet (cliente_id, veterinario_id, nome, sexo, especie, raca, cor, idade, porte, rga)
        VALUES ('$cliente_id', '$veterinario_id', '$nome', '$sexo', '$especie', '$raca', '$cor', '$idade', '$porte', '$rga')";

if ($conexao->query($sql) === TRUE) {
    // Recupera o ID gerado pelo banco de dados
    $pet_id = $conexao->insert_id;

    // Verifica se uma foto foi enviada
    if (isset($_FILES['foto_pet']) && $_FILES['foto_pet']['error'] == 0) {
        $target_dir = "uploads/";
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
                    echo json_encode([
                        'status' => 'success',
                        'message' => 'Novo pet cadastrado com sucesso e foto atualizada!'
                    ]);
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Erro ao atualizar a foto no banco de dados: ' . $conexao->error
                    ]);
                }
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Erro ao mover o arquivo para o diretório de uploads.'
                ]);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Arquivo enviado não é uma imagem válida.'
            ]);
        }
    } else {
        // Caso nenhum arquivo de foto seja enviado
        echo json_encode([
            'status' => 'success',
            'message' => 'Novo pet cadastrado com sucesso!'
        ]);
    }
} else {
    // Resposta de erro no banco de dados
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao cadastrar o pet: ' . $conexao->error
    ]);
}

$conexao->close();
?>
