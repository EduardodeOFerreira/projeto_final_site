<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
    <title>Listagem de Leads</title>
    <style>
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
            justify-content: center;
        }
        .table a {
            text-decoration: none;
        }
        .no-cadastro {
            color: #dc3545; /* Vermelho */
            font-weight: bold;
        }
        .no-cadastro a {
            color: #dc3545;
        }
        .container-centered {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Alinha a tabela ao topo */
            min-height: 100vh;
            padding-top: 50px; /* Adiciona espaço superior */
        }
        .form-container {
            width: 100%;
           
            background-color: #f8f9fa; /* Cor de fundo mais clara */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adiciona sombra suave */
            
        }
        .table {
            margin-bottom: 0; /* Remove margens extras */
        }
    </style>
</head>
<body>

<?php
require_once("conexaoAction.php");

echo ' 
<section>
    <div class="container mt-5">
        <div class="form-container shadow-lg p-4 rounded">
            <h1 class="text-center mb-4 display-4">Listagem de Leads</h1>
            <table class="table table-sm table-striped table-hover table-bordered border-primary rounded">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Código</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Contatado?</th>
                        <th>Já tem cadastro?</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody class="text-center">';

$sql = "SELECT * FROM lead";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        $emailLead = $linha['email'];

        // Verificar se o email já está cadastrado na tabela cliente
        $sqlCliente = "SELECT * FROM cliente WHERE email = '$emailLead'";
        $resultadoCliente = $conexao->query($sqlCliente);
        $temCadastro = $resultadoCliente->num_rows > 0 ? 'Sim' : '<a href="cliente_cadastro.php?email=' . $emailLead . '" class="no-cadastro">Não</a>';

        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['servico'] . '</td>';
        echo '<td>' . $linha['data_lead'] . '</td>';
        echo '<td>' . $linha['nome'] . '</td>';
        echo '<td>' . $linha['telefone'] . '</td>';
        echo '<td>' . $linha['email'] . '</td>';
        echo '<td><strong>' . $linha['lead_contatado'] . '<strong></td>';
        echo '<td>' . $temCadastro . '</td>'; // Exibe link "Não" se não houver cadastro

        echo '<td>
                <a href="lead_excluir.php?id=' . $linha['id'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="lead_atualizar.php?id=' . $linha['id'] . '">
                    <i class="fa fa-refresh"></i>
                </a>
              </td>';
        
        echo '</tr>';
    }
}

echo '          </tbody>
            </table>
        </div>
    </div>
</section>';

$conexao->close();
?>
            <div style="height: 6vh;"></div>
</body>
<?php
include 'footer.php';
?>
</html>
