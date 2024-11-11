<?php
include 'login_activity.php';
include 'office_header.php';
?>

<head>
        <title>Listagem de Pets</title>
    </head>
    <body>
    <?php
// Conexão ao banco de dados
include 'conexaoAction.php';

echo ' 


<section>
    <div class="container mt-5">
        <div class="form-container shadow-lg p-4 rounded">
            <h1 class="text-center mb-4 display-4">Listagem de Pets</h1>
            <table class="table table-sm table-striped table-hover table-bordered border-primary rounded">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Código</th>
                        <th>Nome Pet</th>
                        <th>RGA</th>
                        <th>Sexo</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Cor</th>
                        <th>Idade</th>
                        <th>Porte</th>
                        <th>Excluir</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody class="text-center">
     ';

$sql = "SELECT * FROM pet";
$resultado = $conexao->query($sql);
if ($resultado != null) {
    foreach ($resultado as $linha) {
        echo '<tr>';
        echo '<td>' . $linha['id'] . '</td>';
        echo '<td>' . $linha['nome'] . '</td>';
        echo '<td>' . $linha['rga'] . '</td>';
        echo '<td>' . $linha['sexo'] . '</td>';
        echo '<td>' . $linha['especie'] . '</td>';
        echo '<td>' . $linha['raca'] . '</td>';
        echo '<td>' . $linha['cor'] . '</td>';
        echo '<td>' . $linha['idade'] . '</td>';
        echo '<td>' . $linha['porte'] . '</td>';
        
        echo '<td>
                <a href="pet_excluir.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&rga=' . $linha['rga'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '">
                    <i class="fa fa-user-times"></i>
                </a>
              </td>';
        
        echo '<td>
                <a href="pet_atualizar.php?id=' . $linha['id'] . '&nome=' . $linha['nome'] . '&rga=' . $linha['rga'] . '&sexo=' . $linha['sexo'] . '&especie=' . $linha['especie'] . '&raca=' . $linha['raca'] . '&cor=' . $linha['cor'] . '&idade=' . $linha['idade'] . '&porte=' . $linha['porte'] . '">
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

    </body>
    <div style="height: 6vh;"></div>
    <?php
include 'footer.php';
?>
    </html>