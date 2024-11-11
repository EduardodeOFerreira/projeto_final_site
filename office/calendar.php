<?php
include 'login_activity.php';
include 'office_header.php';
require_once("calendar_functions.php");

$monthTime = getMonthTime();
?>

<head>
<style>


/* calendar_style.css */
header h1 {
    font-size: 1.5rem;
}

table td {
    height: auto;
    vertical-align: middle;
    text-align: center;
    font-size: 2em;
    font-weight: bold;
}

/* Efeito hover nos links de agendamento */
/* Estilos para botões de dias no calendário */
table td a {
    display: block;
    color: #000; /* Cor do texto padrão */
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

table td a:hover {
    color: #fff; /* Cor do texto ao passar o mouse */
    background-color: #007bff; /* Cor de fundo ao passar o mouse */

}



.bg-light td.bg-white:hover {
    background-color: #e9ecef;
}

.other-month a {
    color: #adb5bd;
}

</style>
    <title>Calendário de Agendamentos</title>

    <link rel="stylesheet" href="calendar_style.css">
</head>
<body class="bg-light">

<div class="container-centered container d-flex justify-content-center align-items-center">
    <div class="form-container col-md-8 bg-light p-4 rounded shadow">

    <!-- Cabeçalho do calendário -->
    <header class="d-flex justify-content-between align-items-center mb-4">
        <a class="btn btn-outline-primary" href="?month=<?= prevMonth($monthTime); ?>">
            <i class="fas fa-chevron-left"></i> Anterior
        </a>
        <h1 class="text-center"><?= date('F Y', $monthTime); ?></h1>
        <a class="btn btn-outline-primary" href="?month=<?= nextMonth($monthTime); ?>">
            Próximo <i class="fas fa-chevron-right"></i>
        </a>
    </header>

    <!-- Tabela do Calendário -->
    <table class="table table-bordered text-center">
        <thead>
            <tr class="bg-primary text-white">
                <th>DOM</th>
                <th>SEG</th>
                <th>TER</th>
                <th>QUA</th>
                <th>QUI</th>
                <th>SEX</th>
                <th>SAB</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $startDate = strtotime("last sunday", $monthTime);
            for ($row = 0; $row < 6; $row++) {
                echo "<tr>";
                for ($column = 0; $column < 7; $column++) {
                    $currentDate = date('Y-m-d', $startDate);
                    $cellClass = date('Y-m', $startDate) !== date('Y-m', $monthTime) ? 'bg-light' : 'bg-white';

                    echo "<td class='$cellClass' data-date='$currentDate'>";
                    echo "<a href='calendar_agendar.php?data=$currentDate' class='text-decoration-none text-dark'>" . date('j', $startDate) . "</a>";
                    echo "</td>";

                    $startDate = strtotime("+1 day", $startDate);
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div></div>

<?php include 'footer.php'; ?>

<script src="calendar_mobile-data.js"></script>
</body>
</html>
