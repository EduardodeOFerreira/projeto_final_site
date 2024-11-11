<?php
include 'header.php';

// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "u386416527_tiodupet";
$password = "M30%paramore";
$dbname = "u386416527_tiodupet";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém e escapa os dados do formulário para evitar injeção de SQL
    $servico = $conn->real_escape_string($_POST['servico']);
    $nome = $conn->real_escape_string($_POST['nome']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $email = $conn->real_escape_string($_POST['email']);
    $contato_prefere = $conn->real_escape_string($_POST['contato_prefere']);
    $horario_prefere = $conn->real_escape_string($_POST['horario_prefere']);
    $receber_novidades = isset($_POST['receber_novidades']) ? 1 : 0;
    $consentimento_dados = isset($_POST['consentimento_dados']) ? 1 : 0;
    $politica_privacidade = isset($_POST['politica_privacidade']) ? 'Sim' : 'Não';

    // Define a data e hora do consentimento
    $data_consentimento = date('Y-m-d H:i:s');

    // Validação dos termos obrigatórios
    if ($consentimento_dados && $politica_privacidade === 'Sim') {
        // Consulta SQL para inserir os dados
        $sql = "INSERT INTO `lead` (servico, data_lead, nome, telefone, email, contato_prefere, horario_prefere, receber_novidades, consentimento_dados, data_consentimento, politica_privacidade)
                VALUES ('$servico', NOW(), '$nome', '$telefone', '$email', '$contato_prefere', '$horario_prefere', '$receber_novidades', '$consentimento_dados', '$data_consentimento', '$politica_privacidade')";

        // Executa a consulta e verifica o sucesso
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Solicitação feita com sucesso, entraremos em contato!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar lead: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>É necessário aceitar os Termos de Uso e a Política de Privacidade.</div>";
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
