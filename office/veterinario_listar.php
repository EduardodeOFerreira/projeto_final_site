<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
    <title>Listagem de Veterinários</title>
</head>
<body>

<?php
// Conexão ao banco de dados
include 'conexaoAction.php';

echo ' 
<section>
    <div class="container mt-5">
        <div class="form-container shadow-lg p-4 rounded">
            <h1 class="text-center mb-4 display-4">Listagem de Veterinários</h1>
            <table class="table table-sm table-striped table-hover table-bordered border-primary rounded">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody class="text-center">';

$sql = "SELECT * FROM veterinario";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['nome'] . '</td>';
        echo '<td>' . $linha['telefone'] . '</td>';
        echo '<td>' . $linha['email'] . '</td>';

        echo '<td>
                <a href="veterinario_excluir.php?id=' . $linha['id'] .
                     '&nome=' . $linha['nome'] .
                     '&telefone=' . $linha['telefone'] .
                     '&email=' . $linha['email'] .
                     '&endereco=' . $linha['endereco'] .
                     '&numero=' . $linha['numero'] .
                     '&complemento=' . $linha['complemento'] .
                     '&bairro=' . $linha['bairro'] .
                     '&cep=' . $linha['cep'] .
                     '&cidade=' . $linha['cidade'] .
                     '&estado=' . $linha['estado'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="veterinario_atualizar.php?id=' . $linha['id'] .
                     '&nome=' . $linha['nome'] .
                     '&telefone=' . $linha['telefone'] .
                     '&email=' . $linha['email'] .
                     '&endereco=' . $linha['endereco'] .
                     '&numero=' . $linha['numero'] .
                     '&complemento=' . $linha['complemento'] .
                     '&bairro=' . $linha['bairro'] .
                     '&cep=' . $linha['cep'] .
                     '&cidade=' . $linha['cidade'] .
                     '&estado=' . $linha['estado'] . '">
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
