<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
    <title>Listagem de Serviços</title>
</head>
<body>

<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

echo ' 
<section>
    <div class="container mt-5">
        <div class="form-container shadow-lg p-4 rounded">
            <h1 class="text-center mb-4 display-4">Listagem de Serviços</h1>
            <table class="table table-sm table-striped table-hover table-bordered border-primary rounded">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Código</th>
                        <th>Serviço</th>
                        <th>Tipo</th>
                        <th>Preço</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody class="text-center">';

$sql = "SELECT * FROM servico";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['servico'] . '</td>';
        echo '<td>' . $linha['tipo'] . '</td>';
        echo '<td>' . number_format($linha['preco'], 2, ',', '.') . '</td>'; // Formatação de preço

        echo '<td>
                <a href="servico_excluir.php?id=' . $linha['id'] .
                     '&servico=' . $linha['servico'] .
                     '&tipo=' . $linha['tipo'] .
                     '&preco=' . $linha['preco'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="servico_atualizar.php?id=' . $linha['id'] .
                     '&servico=' . $linha['servico'] .
                     '&tipo=' . $linha['tipo'] .
                     '&preco=' . $linha['preco'] . '">
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
