<?php
include 'login_activity.php';
include 'office_header.php';
include 'conexaoAction.php';

// Consultas para obter as avaliações pendentes, aprovadas e recusadas
$query_solicitadas = "SELECT * FROM avaliacao_solicitadas";
$result_solicitadas = mysqli_query($conexao, $query_solicitadas);

$query_aprovadas = "SELECT * FROM avaliacao_aprovadas";
$result_aprovadas = mysqli_query($conexao, $query_aprovadas);

$query_recusadas = "SELECT * FROM avaliacao_recusadas";
$result_recusadas = mysqli_query($conexao, $query_recusadas);
?>

<head>
    <title>Avaliações</title>
</head>
<body>
<div class="container-centered">
<div class="form-container">
<div class="container mt-5">
    <h1 class="text-center mb-4 display-4">Gerenciar Avaliações</h1>

    <!-- Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="solicitadas-tab" data-bs-toggle="tab" data-bs-target="#solicitadas" type="button" role="tab" aria-controls="solicitadas" aria-selected="true">Solicitadas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="aprovadas-tab" data-bs-toggle="tab" data-bs-target="#aprovadas" type="button" role="tab" aria-controls="aprovadas" aria-selected="false">Aprovadas</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="recusadas-tab" data-bs-toggle="tab" data-bs-target="#recusadas" type="button" role="tab" aria-controls="recusadas" aria-selected="false">Recusadas</button>
        </li>
    </ul>

    <div class="tab-content mt-3" id="myTabContent">
        <!-- Tab Solicitadas -->
        <div class="tab-pane fade show active" id="solicitadas" role="tabpanel" aria-labelledby="solicitadas-tab">
            <table class="table table-striped ">
                <thead class="table-primary">
                    <tr>
                        <th>Nome Avaliador</th>
                        <th>Estrelas</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result_solicitadas) > 0) {
                    while ($row = mysqli_fetch_assoc($result_solicitadas)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome_avaliador'] . "</td>";
                        echo "<td>" . $row['estrelas'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>
                                <form action='avaliacaoAction.php' method='post' style='display:inline-block'>
                                    <input type='hidden' name='avaliacao_id' value='" . $row['id'] . "'>
                                    <button type='submit' name='action' value='aprovar' class='btn btn-success btn-sm'>
                                        <i class='fa fa-check'></i> Aprovar
                                    </button>
                                </form>
                                <form action='avaliacaoAction.php' method='post' style='display:inline-block'>
                                    <input type='hidden' name='avaliacao_id' value='" . $row['id'] . "'>
                                    <button type='submit' name='action' value='recusar' class='btn btn-danger btn-sm'>
                                        <i class='fa fa-times'></i> Recusar
                                    </button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Nenhuma avaliação pendente</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tab Aprovadas -->
        <div class="tab-pane fade" id="aprovadas" role="tabpanel" aria-labelledby="aprovadas-tab">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Nome Avaliador</th>
                        <th>Estrelas</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result_aprovadas) > 0) {
                    while ($row = mysqli_fetch_assoc($result_aprovadas)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome_avaliador'] . "</td>";
                        echo "<td>" . $row['estrelas'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>
                                <form action='avaliacao_excluirAction.php' method='post' style='display:inline-block'>
                                    <input type='hidden' name='avaliacao_id' value='" . $row['id'] . "'>
                                    <button type='submit' name='action' value='excluir_aprovada' class='btn btn-danger btn-sm'>
                                        <i class='fa fa-trash'></i> Excluir
                                    </button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Nenhuma avaliação aprovada</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Tab Recusadas -->
        <div class="tab-pane fade" id="recusadas" role="tabpanel" aria-labelledby="recusadas-tab">
            <table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Nome Avaliador</th>
                        <th>Estrelas</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if (mysqli_num_rows($result_recusadas) > 0) {
                    while ($row = mysqli_fetch_assoc($result_recusadas)) {
                        echo "<tr>";
                        echo "<td>" . $row['nome_avaliador'] . "</td>";
                        echo "<td>" . $row['estrelas'] . "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>
                                <form action='excluiravaliacaoAction.php' method='post' style='display:inline-block'>
                                    <input type='hidden' name='avaliacao_id' value='" . $row['id'] . "'>
                                    <button type='submit' name='action' value='excluir_recusada' class='btn btn-danger btn-sm'>
                                        <i class='fa fa-trash'></i> Excluir
                                    </button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Nenhuma avaliação recusada</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        </div>
        </div>




</body>
<?php
include 'footer.php';
?>
</html>
